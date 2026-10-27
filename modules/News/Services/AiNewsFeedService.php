<?php

namespace Modules\News\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Modules\News\Entities\AiNewsCandidate;
use Modules\News\Entities\AiNewsSource;
use Modules\News\Jobs\GenerateAiNewsCandidateJob;
use SimplePie\SimplePie;
use Throwable;

class AiNewsFeedService
{
    public function __construct(private readonly AiNewsHostPolicy $hostPolicy)
    {
    }

    public function collectEnabledSources(): array
    {
        $lock = Cache::lock('ai-news-feed-collection', 1200);
        if (! $lock->get()) {
            return ['created' => 0, 'skipped' => 0, 'errors' => ['A feed collection is already running.']];
        }

        try {
            return $this->collectWhileLocked();
        } finally {
            $lock->release();
        }
    }

    private function collectWhileLocked(): array
    {
        $created = 0;
        $skipped = 0;
        $errors = [];

        foreach (AiNewsSource::query()->where('is_enabled', true)->orderBy('id')->cursor() as $source) {
            if ($this->remainingDailyCapacity() <= 0) {
                break;
            }

            try {
                $items = $this->readFeed($source);
                $source->forceFill([
                    'last_fetched_at' => now(),
                    'last_error' => null,
                ])->save();

                foreach ($items as $item) {
                    if ($this->remainingDailyCapacity() <= 0) {
                        break;
                    }

                    $url = $item['url'];
                    $sourceHash = hash('sha256', $this->canonicalizeUrl($url));
                    if (AiNewsCandidate::where('source_hash', $sourceHash)->exists()) {
                        $skipped++;
                        continue;
                    }

                    $candidate = AiNewsCandidate::create([
                        'source_id' => $source->id,
                        'source_hash' => $sourceHash,
                        'source_guid' => $item['guid'],
                        'source_url' => $url,
                        'source_title' => $item['title'],
                        'source_excerpt' => $item['excerpt'],
                        'source_published_at' => $item['published_at'],
                        'language_id' => $source->language_id,
                        'category_id' => $source->category_id,
                        'status' => AiNewsCandidate::STATUS_PENDING,
                    ]);

                    try {
                        GenerateAiNewsCandidateJob::dispatch($candidate->id)
                            ->onConnection(config('ai_news.queue_connection', 'database'))
                            ->onQueue('ai-news');
                    } catch (Throwable $exception) {
                        $candidate->forceFill([
                            'status' => AiNewsCandidate::STATUS_FAILED,
                            'error_message' => Str::limit('Could not queue draft generation: ' . $exception->getMessage(), 2000),
                        ])->save();

                        throw $exception;
                    }
                    $created++;
                }
            } catch (Throwable $exception) {
                $message = Str::limit($exception->getMessage(), 1000);
                $source->forceFill([
                    'last_fetched_at' => now(),
                    'last_error' => $message,
                ])->save();
                report($exception);
                $errors[] = $source->name . ': ' . $message;
            }
        }

        return compact('created', 'skipped', 'errors');
    }

    private function remainingDailyCapacity(): int
    {
        $used = AiNewsCandidate::query()
            ->whereDate('created_at', today())
            ->count();

        return max(0, (int) config('ai_news.daily_limit', 5) - $used);
    }

    private function readFeed(AiNewsSource $source): array
    {
        $url = $this->hostPolicy->assertAllowed($source->feed_url);
        $response = Http::withOptions(['allow_redirects' => false])
            ->connectTimeout(5)
            ->timeout((int) config('ai_news.feed_timeout', 15))
            ->withHeaders(['User-Agent' => config('app.name', 'Laravel') . ' RSS collector'])
            ->get($url);

        if (! $response->successful()) {
            throw new \RuntimeException('Feed returned HTTP ' . $response->status());
        }

        if (strlen($response->body()) > (int) config('ai_news.max_feed_bytes', 2097152)) {
            throw new \RuntimeException('Feed response exceeds the configured size limit.');
        }

        $feed = new SimplePie();
        $feed->set_raw_data($response->body());
        $feed->enable_cache(false);
        if (! $feed->init()) {
            throw new \RuntimeException('The response is not a readable RSS or Atom feed.');
        }

        $items = [];
        foreach ($feed->get_items(0, (int) config('ai_news.max_feed_items', 20)) ?: [] as $feedItem) {
            $itemUrl = trim((string) $feedItem->get_permalink());
            $parsedUrl = parse_url($itemUrl);
            if (! $parsedUrl || ! in_array(strtolower($parsedUrl['scheme'] ?? ''), ['http', 'https'], true) || empty($parsedUrl['host'])) {
                continue;
            }

            $title = $this->plainText($feedItem->get_title(), 500);
            if ($title === '') {
                continue;
            }

            $items[] = [
                'guid' => Str::limit((string) ($feedItem->get_id() ?: $itemUrl), 500),
                'url' => $itemUrl,
                'title' => $title,
                'excerpt' => $this->plainText($feedItem->get_description(), 3000),
                'published_at' => $feedItem->get_date('Y-m-d H:i:s'),
            ];
        }

        return $items;
    }

    private function plainText(?string $value, int $limit): string
    {
        $text = html_entity_decode(strip_tags((string) $value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return Str::limit(trim(preg_replace('/\s+/u', ' ', $text) ?? ''), $limit, '');
    }

    private function canonicalizeUrl(string $url): string
    {
        $parts = parse_url($url) ?: [];
        $canonical = strtolower((string) ($parts['scheme'] ?? 'https')) . '://'
            . strtolower((string) ($parts['host'] ?? ''))
            . (isset($parts['port']) ? ':' . $parts['port'] : '')
            . rtrim((string) ($parts['path'] ?? ''), '/');

        return $canonical . (isset($parts['query']) ? '?' . $parts['query'] : '');
    }
}
