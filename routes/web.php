<?php

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
