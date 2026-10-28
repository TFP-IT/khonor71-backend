<?php

namespace App\Providers;

use App\Helpers\ThemeHelper;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();

        //View::share('themeSettings', ThemeHelper::themeSettings());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // The news portal is Bangla-only. Keep the existing language_id
        // columns and rows so stored English content remains intact, while
        // excluding it from every Eloquent read and forcing new model records
        // to use the Bangla language row.
        $localizedModels = [
            \App\Models\NewsMst::class => ['language_id', true],
            \Modules\Archive\Entities\NewsArchive::class => ['language_id', false],
            \App\Models\BreakingNews::class => ['language_id', true],
            \App\Models\HomePagePosition::class => ['language_id', true],
            \App\Models\PhotoPost::class => ['language_id', true],
            \Modules\Advertisement\Entities\Advertisement::class => ['language_id', true],
            \Modules\Category\Entities\Category::class => ['language_id', true],
            \Modules\Menu\Entities\MenuContent::class => ['language_id', true],
            \Modules\News\Entities\AiNewsCandidate::class => ['language_id', true],
            \Modules\News\Entities\AiNewsSource::class => ['language_id', true],
            \Modules\Opinion\Entities\Opinion::class => ['language_id', true],
            \Modules\Page\Entities\Page::class => ['language_id', true],
            \Modules\Poll\Entities\Poll::class => ['language_id', true],
            \Modules\ProbashiJanala\Entities\ProbashiNews::class => ['language_id', true],
            \Modules\RssFeeds\Entities\RssFeed::class => ['paper_language', true],
            \Modules\Setting\Entities\FontSetup::class => ['language_id', true],
            \Modules\Story\Entities\Story::class => ['language_id', true],
            \Modules\VideoNews\Entities\VideoNews::class => ['language_id', true],
        ];

        foreach ($localizedModels as $modelClass => [$languageColumn, $forceBanglaOnCreate]) {
            $modelClass::addGlobalScope('bangla_portal_only', function ($query) use ($languageColumn) {
                $languageId = bangla_language_id();
                $qualifiedColumn = $query->getModel()->qualifyColumn($languageColumn);

                if ($languageId) {
                    $query->where($qualifiedColumn, $languageId);
                } else {
                    $query->whereRaw('1 = 0');
                }
            });

            if ($forceBanglaOnCreate) {
                $modelClass::creating(function ($model) use ($languageColumn) {
                    $model->{$languageColumn} = bangla_language_id();
                });
            }
        }

        Blueprint::macro('updateCreatedBy', function () {
            $this->foreignId('created_by')->nullable();
            $this->foreignId('updated_by')->nullable();
        });

        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);

        Blade::include('backend.layouts.forms.form-control-input', 'input');
        Blade::include('backend.layouts.forms.form-control-radio', 'radio');
        Blade::include('backend.layouts.forms.form-control-select', 'select');
        Blade::include('backend.layouts.forms.form-control-textarea', 'textarea');
        Blade::include('backend.layouts.forms.image-with-preview', 'imageWithPreview');
        Blade::include('backend.layouts.forms.image-with-preview', 'imageWithPreview2');

        // Use a view composer instead of View::share so the theme
        // settings query runs per-request, not once at boot. This
        // is required for Octane's long-running worker model.
        View::composer('*', function ($view) {
            if (! $view->offsetExists('themeSettings')) {
                $view->with('themeSettings', ThemeHelper::themeSettings());
            }
        });

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }

    protected function loadHelpers()
    {
        foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
