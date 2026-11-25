<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/academics', 'academics')->name('academics');
    Route::get('/beyond-academics', 'beyondAcademics')->name('beyond-academics');
    Route::get('/campus-facilities', 'campusFacilities')->name('campus-facilities');
    Route::get('/admissions', 'admissions')->name('admissions');
    Route::get('/careers', 'careers')->name('careers');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/news-gallery', 'newsGallery')->name('news-gallery');
});

/*
|--------------------------------------------------------------------------
| Admin authentication
|--------------------------------------------------------------------------
| Standard Laravel route names (login, password.request, password.reset ...)
| are used, so framework redirects and reset-password emails work out of the box.
*/
Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);

        Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [ForgotPasswordController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('password.email');

        Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::patch('testimonials/{testimonial}/status', [TestimonialController::class, 'toggleStatus'])
            ->name('admin.testimonials.status');
        Route::resource('testimonials', TestimonialController::class)
            ->except('show')
            ->names('admin.testimonials');

        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
});
