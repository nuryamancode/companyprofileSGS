<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'Admin') {
            return redirect()->route('admin.dashboard.index');
        } else {
            Auth::logout();
            return redirect()->route('login');
        }
    }
});



Route::get('lang/{locale}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');
Route::controller(\App\Http\Controllers\User\IndexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/detail/{id}', 'show')->name('detail');
});
Route::controller(\App\Http\Controllers\User\ServiceController::class)->group(function () {
    Route::get('/services', 'index')->name('service');
    Route::get('/services/{id}/detail', 'show')->name('service.detail');
});
Route::controller(\App\Http\Controllers\User\AboutController::class)->group(function () {
    Route::get('/abouts', 'index')->name('about');
});
Route::controller(\App\Http\Controllers\User\ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact/send', 'send')->name('contact.send');
});



Route::middleware('guest')->group(function () {
    Route::controller(\App\Http\Controllers\Auth\LoginController::class)->group(function () {
        Route::get('/back-office', 'index')->name('login');
        Route::post('/back-office', 'login')->name('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


    Route::middleware('role:Admin')->name('admin.')->group(function () {
        Route::resource('/back-office/dashboard', \App\Http\Controllers\Admin\DashboardController::class);
        Route::resource('/back-office/carousel', \App\Http\Controllers\Admin\CaraouselController::class);
        Route::get('/back-office/carousel/{id}/delete', [\App\Http\Controllers\Admin\CaraouselController::class , 'destroy'])->name('carousel.delete');

        Route::resource('/back-office/about', \App\Http\Controllers\Admin\AboutController::class);
        Route::get('/back-office/about/{id}/delete', [\App\Http\Controllers\Admin\AboutController::class , 'destroy'])->name('about.delete');

        Route::resource('/back-office/banner', \App\Http\Controllers\Admin\BannerController::class);
        Route::get('/back-office/banner/{id}/delete', [\App\Http\Controllers\Admin\BannerController::class , 'destroy'])->name('banner.delete');

        Route::resource('/back-office/service', \App\Http\Controllers\Admin\ServiceController::class);
        Route::get('/back-office/service/{id}/delete', [\App\Http\Controllers\Admin\ServiceController::class , 'destroy'])->name('service.delete');

        Route::resource('/back-office/client', \App\Http\Controllers\Admin\ClientController::class);
        Route::get('/back-office/client/{id}/delete', [\App\Http\Controllers\Admin\ClientController::class , 'destroy'])->name('client.delete');

        Route::resource('/back-office/director', \App\Http\Controllers\Admin\DirectorController::class);
        Route::get('/back-office/director/{id}/delete', [\App\Http\Controllers\Admin\DirectorController::class , 'destroy'])->name('director.delete');

        Route::resource('/back-office/contact', \App\Http\Controllers\Admin\ContactController::class);
        Route::get('/back-office/contact/{id}/delete', [\App\Http\Controllers\Admin\ContactController::class , 'destroy'])->name('contact.delete');
    });
});
