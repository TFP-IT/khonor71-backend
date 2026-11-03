<?php

namespace App\Jobs;

use App\Models\NewsMst;
use Google\Client as GoogleClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

/**
 * Notifies the Google Indexing API that a published article URL is new or updated.
 * Disabled unless GOOGLE_INDEXING_ENABLED=true and a service account file exists.
 */
class PingGoogleIndexingApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public const ENDPOINT = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

    public int $tries = 3;
    public int $timeout = 60;

    public function __construct(public readonly int $newsMstId)
    {
        $this->afterCommit();
    }

    public function backoff(): array
    {
        return [60, 300];
    }

    public function handle(): void
    {
        if (! config('ai_news.indexing.enabled')) {
            return;
        }

        $news = NewsMst::find($this->newsMstId);
        if (! $news || ! $news->isPublished() || empty($news->encode_title)) {
            return;
        }

        $credentials = base_path((string) config('ai_news.indexing.service_account_json'));
        if (! is_file($credentials)) {
            Log::warning('Google Indexing API skipped: service account file not found.', ['path' => $credentials]);
            return;
        }

        $articleUrl = __url($news->encode_title);

        $client = new GoogleClient();
        $client->setAuthConfig($credentials);
        $client->addScope('https://www.googleapis.com/auth/indexing');

        $response = $client->authorize()->post(self::ENDPOINT, [
            'json' => ['url' => $articleUrl, 'type' => 'URL_UPDATED'],
            'http_errors' => false,
        ]);

        $status = $response->getStatusCode();
        if ($status < 200 || $status >= 300) {
            Log::error('Google Indexing API rejected the request.', [
                'news_id' => $news->id,
                'url' => $articleUrl,
                'status' => $status,
            ]);
            $this->fail(new \RuntimeException('Google Indexing API returned HTTP ' . $status));
            return;
        }

        // Query update on purpose: no model events, no updated_at change.
        NewsMst::whereKey($news->id)->update(['is_indexed' => true, 'indexed_at' => now()]);
        Log::info("Google Indexing API notified for {$articleUrl}", ['status' => $status]);
    }
}
