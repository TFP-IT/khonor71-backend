<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\NewsMst;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Modules\AutoPost\Entities\AutoPostSetting;
use App\Services\AutoSocialPostService;

class PublishScheduledNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish news articles whose scheduled publish_date has arrived';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $now = Carbon::now();

        // Find all articles that are status=1 (approved) but with a publish_date that just became past
        $scheduledNews = NewsMst::where('status', 1)
            ->where('publish_date', '<=', $now)
            ->where('publish_date', '>=', $now->copy()->subMinutes(5))
            ->get();

        if ($scheduledNews->isEmpty()) {
            $this->info('No scheduled articles to publish.');
            return self::SUCCESS;
        }

        $publishedCount = 0;

        foreach ($scheduledNews as $news) {
            // Trigger auto social post if enabled
            if ($news->is_auto_post && !$news->is_posted_to_social) {
                try {
                    $hasActivePlatforms = AutoPostSetting::where('is_active', true)->exists();

                    if ($hasActivePlatforms) {
                        $result = AutoSocialPostService::autoPost($news);

                        if ($result['success']) {
                            $news->update(['is_posted_to_social' => true]);
                            Log::info("Auto social post successful for scheduled article: {$news->title} (ID: {$news->id})");
                        } else {
                            Log::warning("Auto social post failed for article {$news->id}: {$result['message']}");
                        }
                    }
                } catch (\Exception $e) {
                    Log::error("Social post error for article {$news->id}: {$e->getMessage()}");
                }
            }

            $publishedCount++;
            Log::info("Scheduled article published: {$news->title} (ID: {$news->id}, Publish Date: {$news->publish_date})");
        }

        try {
            app(\App\Services\Sitemap\SitemapService::class)->clearCaches();
            \App\Services\XmlService::rss_xml();
            \App\Services\XmlService::sitemap_xml();
        } catch (\Throwable $e) {
            Log::warning('Scheduled news sitemap refresh failed.', ['error' => $e->getMessage()]);
        }

        $this->info("Published {$publishedCount} scheduled article(s).");

        return self::SUCCESS;
    }
}
