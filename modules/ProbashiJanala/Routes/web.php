<?php
use App\Enums\PanelPrefixEnum;
use Illuminate\Support\Facades\Route;
use Modules\ProbashiJanala\Http\Controllers\ProbashiJanalaController;
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
    Route::prefix('probashijanala')->group(function() {
        Route::get('/', 'ProbashiJanalaController@index');
    });

    Route::group(['prefix' => 'probashijanala', 'middleware' => ['auth']], function () {

        Route::controller(ProbashiJanalaController::class)->name('probashijanala.')->group(function () {

            Route::get('/probashijanala-list', 'index')->name('index');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::get('/edit/{probashiNews:id}', action: 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');

            Route::delete('delete/{probashiNews:id}', 'destroy')->name('destroy');

            Route::put('probashijanala-status-update/{probashiNews}', 'updateStatus')->name('status.update');
            Route::delete('/{probashiNews}/delete-video', 'deleteVideo')->name('delete.video');
            Route::delete('/{probashiNews}/delete-image', 'deleteImage')->name('delete.image');

        });

    });
});
