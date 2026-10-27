<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\News\Services\AiNewsFeedService;

class IngestAiNewsFeedsCommand extends Command
{
    protected $signature = 'ai-news:ingest';

    protected $description = 'Collect approved RSS feed items and queue human-review news drafts';

    public function handle(AiNewsFeedService $feedService): int
    {
        if (! config('ai_news.enabled')) {
            $this->warn('AI news ingestion is disabled. Set AI_NEWS_ENABLED=true to enable it.');
            return self::SUCCESS;
        }

        $result = $feedService->collectEnabledSources();
        $this->info("Queued {$result['created']} candidate(s); skipped {$result['skipped']} duplicate(s).");

        foreach ($result['errors'] as $error) {
            $this->error($error);
        }

        return self::SUCCESS;
    }
}
