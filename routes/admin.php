<?php

use App\Models\BottomBanner;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Backend\NewsController;

use App\Http\Controllers\Backend\BannerController;


use App\Http\Controllers\Backend\ContactController;

use App\Http\Controllers\Backend\EditorController;

use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\UpcomingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubmitPaperController;
use App\Http\Controllers\Backend\SummaryController;
use App\Http\Controllers\Backend\PaperController;

// Dashboard routes
Route::middleware(['auth'])->group(function () {

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('business-info', 'businessSettings')->name('business-setting');
    Route::post('business-info', 'businessSettingsUpdate')->name('business-setting-update');
    Route::get('profile', 'profile')->name('profile');
    Route::post('profile', 'profileUpdate')->name('profile.update');
});
});

Route::controller(BranchController::class)->group(function () {
    Route::group(['prefix' => 'branches', 'as' => 'branches.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

// Teammember routes
Route::controller(SubmitPaperController::class)->group(function () {
    Route::group(['prefix' => 'submitpaper', 'as' => 'submitpaper.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});


Route::controller(SummaryController::class)->group(function () {
    Route::group(['prefix' => 'papersummary', 'as' => 'papersummary.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::post('/papers/export-selected', [SummaryController::class, 'exportSelected'])->name('papers.export.selected');


// Teammember routes










// Upcomimg routes
Route::controller(PaperController::class)->group(function () {
    Route::group(['prefix' => 'paper', 'as' => 'paper.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});

Route::post('/paper/{id}/publish', [PaperController::class, 'publish'])->name('url.publish');


Route::controller(EditorController::class)->group(function () {
    Route::group(['prefix' => 'editor', 'as' => 'editor.'], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::post('{id}/edit', 'update')->name('update');
        Route::get('{id}/delete', 'destroy')->name('delete');
    });
});





Route::controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'index')->name('contact.index');
    Route::delete('contacts/{id}/delete', 'delete')->name('contacts.delete');
});
