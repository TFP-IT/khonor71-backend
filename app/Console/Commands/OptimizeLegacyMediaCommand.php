<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class OptimizeLegacyMediaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:optimize-legacy {--force : Overwrite even if smaller}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compress and resize oversized legacy images in storage to improve PageSpeed and load performance';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting legacy media optimization...');
        $totalOriginalBytes = 0;
        $totalOptimizedBytes = 0;
        $optimizedCount = 0;

        $directories = [
            [
                'dir' => storage_path('app/public/videonews/thumb'),
                'maxWidth' => 640,
                'maxHeight' => 360,
                'type' => 'video_thumb',
            ],
            [
                'dir' => storage_path('app/public/opinion'),
                'maxWidth' => 800,
                'maxHeight' => 800,
                'type' => 'opinion',
            ],
            [
                'dir' => storage_path('app/public/application'),
                'maxWidth' => 400,
                'maxHeight' => 400,
                'type' => 'application',
            ],
            [
                'dir' => storage_path('app/public/images/thumb'),
                'maxWidth' => 400,
                'maxHeight' => 240,
                'type' => 'thumb',
            ],
        ];

        foreach ($directories as $config) {
            $dir = $config['dir'];
            if (!is_dir($dir)) {
                continue;
            }

            $files = glob($dir . '/*');
            foreach ($files as $file) {
                if (!is_file($file) || is_link($file)) {
                    continue;
                }

                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                    continue;
                }

                $originalSize = filesize($file);
                // Only process files that are either > 50KB or when forced
                if ($originalSize < 50 * 1024 && !$this->option('force')) {
                    continue;
                }

                try {
                    $img = Image::make($file)->orientate();
                    $width = $img->width();
                    $height = $img->height();
                    $needsResize = false;

                    $targetWidth = $config['maxWidth'];
                    $targetHeight = $config['maxHeight'];

                    if ($config['type'] === 'opinion' && str_contains(basename($file), 'person')) {
                        $targetWidth = 200;
                        $targetHeight = 200;
                    }

                    if ($width > $targetWidth || $height > $targetHeight) {
                        $img->resize($targetWidth, $targetHeight, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                        $needsResize = true;
                    }

                    if ($needsResize || $originalSize > 70 * 1024) {
                        $totalOriginalBytes += $originalSize;
                        $quality = 82;

                        if ($ext === 'png') {
                            // If PNG has transparency, preserve format; otherwise encode cleanly
                            $img->save($file, 85);
                        } else {
                            $img->save($file, $quality);
                        }

                        // Clear stat cache to get new size
                        clearstatcache(true, $file);
                        $newSize = filesize($file);
                        $totalOptimizedBytes += $newSize;
                        $optimizedCount++;

                        // Sync to public/storage if copy exists
                        $relative = str_replace(storage_path('app/public/'), '', $file);
                        $publicFile = public_path('storage/' . $relative);
                        if (file_exists($publicFile) && !is_link($publicFile)) {
                            @copy($file, $publicFile);
                        }

                        $savedKB = round(($originalSize - $newSize) / 1024, 1);
                        $this->line("Optimized: " . basename($file) . " [{$width}x{$height} -> {$img->width()}x{$img->height()}] Saved {$savedKB} KB");
                    }
                } catch (\Throwable $e) {
                    $this->warn("Skipped " . basename($file) . ": " . $e->getMessage());
                }
            }
        }

        $totalSavedMB = round(($totalOriginalBytes - $totalOptimizedBytes) / (1024 * 1024), 2);
        $this->info("Successfully optimized {$optimizedCount} images! Total bandwidth saved: {$totalSavedMB} MB");

        return Command::SUCCESS;
    }
}

