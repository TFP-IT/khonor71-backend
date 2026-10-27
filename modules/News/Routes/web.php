<?php

use App\Enums\PanelPrefixEnum;
use Illuminate\Support\Facades\Route;
use Modules\News\Http\Controllers\AIController;
use Modules\News\Http\Controllers\BulkPostController;
use Modules\News\Http\Controllers\NewsController;
use Modules\News\Http\Controllers\NewsPostController;
use Modules\News\Http\Controllers\BreakingNewsController;
use Modules\News\Http\Controllers\NewsPositionController;
use Modules\News\Http\Controllers\AiNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::prefix(PanelPrefixEnum::ADMIN->value)->group(function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::prefix('ai-news')->as('ai-news.')->controller(AiNewsController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/sources', 'sources')->name('sources');
            Route::post('/sources', 'storeSource')->name('sources.store');
            Route::patch('/sources/{source}/toggle', 'toggleSource')->name('sources.toggle');
            Route::delete('/sources/{source}', 'deleteSource')->name('sources.destroy');
            Route::post('/run', 'runNow')->name('run');
            Route::post('/candidates/{candidate}/retry', 'retry')->name('retry');
            Route::get('/candidates/{candidate}', 'edit')->name('edit');
            Route::patch('/candidates/{candidate}', 'updateReview')->name('review.update');
            Route::post('/candidates/{candidate}/reject', 'reject')->name('reject');
            Route::post('/candidates/{candidate}/cms-draft', 'createCmsDraft')->name('cms-draft');
        });

        Route::get('news/position', [NewsPositionController::class, 'index'])->name('news.position.index');
        Route::patch('news/position/update', [NewsPositionController::class, 'update'])->name('news.position.update');
        Route::delete('news/position/{news_position}/destroy', [NewsPositionController::class, 'destroy'])->name('news.position.destroy');

        Route::post('news/breaking-news/toggle-ticker', [BreakingNewsController::class, 'toggleTicker'])->name('news.breaking-news.toggle-ticker');
        Route::resource('news/breaking-news', BreakingNewsController::class)->names('news.breaking-news')->except(['create', 'show']);
        Route::post('news/breaking-news/{breaking_news}/status', [BreakingNewsController::class, 'updateStatus'])->name('news.breaking-news.update-status');

        Route::resource('news/post', NewsPostController::class)->names('news.post')->except(['show']);
        Route::get('ai/ai_settings', [AIController::class, 'index'])->name('ai.ai_settings');
        Route::PATCH('ai/settings/update', [AIController::class, 'update'])->name('ai.settings.update');

        Route::post('news/store-report', [NewsController::class, 'storeReport'])->name('news.storeReport');
        Route::patch('news/{news}/update-status', [NewsController::class, 'updateStatus'])->name('news.update-status');
        Route::resource('news', NewsController::class);
        Route::get('/news/sub-category/{categoryId}', [NewsController::class, 'getSubCategories'])->name('admin.news.sub_category.details');
        Route::get('/news/category-by-language/{languageId}', [NewsController::class, 'getCategoriesByLanguage']);
        Route::get('/news/districts-by-division/{divisionId}', [NewsController::class, 'getDistrictsByDivision'])->name('admin.news.districts_by_division');
        // routes/web.php or routes/admin.php
        Route::post('/admin/ai/generate', [AIController::class, 'generateText'])->name('admin.ai.generate');
        Route::resource('bulk/post/upload', BulkPostController::class)->names('bulk.post.upload');
        Route::patch('news/{news}/social-post', [NewsController::class, 'socialPost'])->name('news.social.post');
    });
});
