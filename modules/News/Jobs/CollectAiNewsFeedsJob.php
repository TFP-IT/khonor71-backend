<?php

namespace Modules\News\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Modules\News\Services\AiNewsFeedService;
use Throwable;

class CollectAiNewsFeedsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 1;
    public int $timeout = 120;

    public function handle(AiNewsFeedService $feedService): void
    {
        if (! config('ai_news.enabled')) {
            return;
        }

        $result = $feedService->collectEnabledSources();
        Log::info('AI RSS collection finished.', $result);
    }

    public function failed(?Throwable $exception): void
    {
        Log::error('AI RSS collection job failed.', ['error' => $exception?->getMessage()]);
    }
}
