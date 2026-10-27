<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\ImportAttnData::class,
        Commands\PublishScheduledNewsCommand::class,
        Commands\IngestAiNewsFeedsCommand::class,
    ];
    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Publish scheduled articles every minute
        $schedule->command('news:publish-scheduled')->everyMinute();

        $schedule->command('ai-news:ingest')
            ->everyTenMinutes()
            ->withoutOverlapping(20)
            ->when(fn () => config('ai_news.enabled'));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
