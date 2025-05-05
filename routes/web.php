<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PaperController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\JobApplicationController;


Route::get('/clear/{command}', function ($command) {
    $response = Artisan::call($command);
    dd($response);
});



Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');

    Route::get('portfolio', 'portfolio')->name('mdmessage');
   Route::get('blog', 'blog')->name('blog');
    Route::get('contact', 'contact_us')->name('contact_us');
    Route::get('gallery', 'gallery')->name('gallery');
    Route::get('abouts', 'about')->name('abouts');
    Route::get('publish', 'branches')->name('branches');
    Route::get('gallery-detail/{slug}', 'galleryDetail')->name('gallery.detail');


});
Route::get('page/{slug}', [PageController::class, 'show'])->name('page.show');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('login', [LoginController::class, 'adminlogin'])->name('login'); // Display login form

Route::post('/logins', [LoginController::class, 'login'])->name('login.submit'); // Process login form submission

Route::get('/registerform', [LoginController::class, 'reg'])->name('reg');
Route::post('/authorregister', [LoginController::class, 'registerd'])->name('author.register');

Route::get('/training-events', [EventController::class, 'index'])->name('training.search');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


Route::get('/download/{fileName}', [FileDownloadController::class, 'download'])->name('document.download');
Route::post('/paperstore', [PaperController::class, 'store'])->name('paper.store');
