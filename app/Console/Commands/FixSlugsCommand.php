<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixSlugsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fix-slugs {--dry-run : Preview changes without updating the database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerate and update all Bengali slugs/URLs to modern phonetic transliteration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $isDryRun = $this->option('dry-run');

        if ($isDryRun) {
            $this->warn('Running in DRY-RUN mode. No database records will be modified.');
        }

        $this->info('Starting URL / Slug regeneration...');

        // 1. news_msts
        $this->fixNewsMsts($isDryRun);

        // 2. opinions
        $this->fixOpinions($isDryRun);

        // 3. video_news
        $this->fixVideoNews($isDryRun);

        $this->info('All URLs have been processed successfully.');

        return self::SUCCESS;
    }

    protected function fixNewsMsts(bool $isDryRun): void
    {
        $this->newLine();
        $this->info('1. Processing news_msts table...');

        $records = DB::table('news_msts')
            ->select('id', 'title', 'encode_title')
            ->orderBy('id', 'asc')
            ->get();

        $usedSlugs = [];
        $updates = [];

        foreach ($records as $item) {
            $title = trim((string)($item->title ?? ''));
            if ($title === '') {
                continue;
            }

            $baseSlug = generateSlug($title);
            if ($baseSlug === '') {
                $baseSlug = 'news-' . $item->id;
            }

            $slug = $baseSlug;
            $suffix = 2;
            while (isset($usedSlugs[$slug])) {
                $slug = $baseSlug . '-' . $suffix++;
            }
            $usedSlugs[$slug] = true;

            if ($slug !== $item->encode_title) {
                $updates[] = [
                    'id' => $item->id,
                    'old' => $item->encode_title,
                    'new' => $slug,
                ];
            }
        }

        $count = count($updates);
        $this->info("   Found {$count} news records needing URL update.");

        if ($count === 0) {
            return;
        }

        if ($isDryRun) {
            $this->table(['ID', 'Old Slug', 'New Slug'], array_slice(array_map(function ($u) {
                return [$u['id'], $u['old'], $u['new']];
            }, $updates), 0, 10));
            $this->info("   (Dry-run: {$count} rows would be updated)");
            return;
        }

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        $chunks = array_chunk($updates, 500);
        foreach ($chunks as $chunk) {
            DB::transaction(function () use ($chunk, $bar) {
                foreach ($chunk as $row) {
                    DB::table('news_msts')
                        ->where('id', $row['id'])
                        ->update(['encode_title' => $row['new']]);
                    $bar->advance();
                }
            });
        }

        $bar->finish();
        $this->newLine();
        $this->info("   Successfully updated {$count} news records.");
    }

    protected function fixOpinions(bool $isDryRun): void
    {
        $this->newLine();
        $this->info('2. Processing opinions table...');

        $opinions = DB::table('opinions')->select('id', 'title', 'encode_title')->get();
        $updated = 0;

        foreach ($opinions as $op) {
            $title = trim((string)($op->title ?? ''));
            if ($title === '') {
                continue;
            }

            $slug = generateSlug($title);
            if ($slug !== '' && $slug !== $op->encode_title) {
                if (!$isDryRun) {
                    DB::table('opinions')->where('id', $op->id)->update(['encode_title' => $slug]);
                }
                $updated++;
            }
        }

        $this->info("   " . ($isDryRun ? "Would update" : "Successfully updated") . " {$updated} opinions.");
    }

    protected function fixVideoNews(bool $isDryRun): void
    {
        $this->newLine();
        $this->info('3. Processing video_news table...');

        $videoNews = DB::table('video_news')->select('id', 'title', 'encode_title')->get();
        $updated = 0;

        foreach ($videoNews as $vn) {
            $title = trim((string)($vn->title ?? ''));
            if ($title === '' || str_starts_with($title, 'http://') || str_starts_with($title, 'https://')) {
                continue;
            }

            $slug = generateSlug($title);
            if ($slug !== '' && $slug !== $vn->encode_title) {
                if (!$isDryRun) {
                    DB::table('video_news')->where('id', $vn->id)->update(['encode_title' => $slug]);
                }
                $updated++;
            }
        }

        $this->info("   " . ($isDryRun ? "Would update" : "Successfully updated") . " {$updated} video news.");
    }
}

