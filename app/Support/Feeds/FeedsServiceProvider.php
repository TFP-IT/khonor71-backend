<?php

namespace App\Support\Feeds;

use Illuminate\Support\ServiceProvider;

class FeedsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FeedsFactory::class, function () {
            $config = config('feeds') ?? [];
            return new FeedsFactory($config);
        });

        $this->app->alias(FeedsFactory::class, 'Feeds');

        // Backward compatibility alias for willvincent\Feeds\Facades\FeedsFacade
        if (! class_exists('willvincent\Feeds\Facades\FeedsFacade', false)) {
            class_alias(\App\Support\Feeds\Facades\FeedsFacade::class, 'willvincent\Feeds\Facades\FeedsFacade');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Feeds', FeedsFactory::class];
    }
}
