<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhotoGalleryCategoryController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\LearningStageController;
use App\Http\Controllers\InquiryController;
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

// Website forms: enquire, visit, career, contact (the pop-up "notify me" also posts to enquire).
Route::post('/inquiry/{type}', [InquiryController::class, 'store'])
    ->whereIn('type', ['enquire', 'visit', 'career', 'contact'])
    ->middleware('throttle:10,1')
    ->name('inquiries.store');
Route::get('/thank-you', [InquiryController::class, 'thankYou'])->name('thank-you');

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

        // Photo gallery categories
        Route::patch('photo-gallery-categories/{category}/status', [PhotoGalleryCategoryController::class, 'toggleStatus'])
            ->name('admin.photo-gallery-categories.status');
        Route::resource('photo-gallery-categories', PhotoGalleryCategoryController::class)
            ->parameters(['photo-gallery-categories' => 'category'])
            ->except('show')
            ->names('admin.photo-gallery-categories');

        // Photo galleries
        Route::patch('photo-galleries/{gallery}/status', [PhotoGalleryController::class, 'toggleStatus'])
            ->name('admin.photo-galleries.status');
        Route::resource('photo-galleries', PhotoGalleryController::class)
            ->parameters(['photo-galleries' => 'gallery'])
            ->except('show')
            ->names('admin.photo-galleries');

        // FAQs
        Route::patch('faqs/{faq}/status', [FaqController::class, 'toggleStatus'])
            ->name('admin.faqs.status');
        Route::resource('faqs', FaqController::class)
            ->except('show')
            ->names('admin.faqs');

        // Learning stages (Academics page tabs)
        Route::patch('learning-stages/{stage}/status', [LearningStageController::class, 'toggleStatus'])
            ->name('admin.learning-stages.status');
        Route::resource('learning-stages', LearningStageController::class)
            ->parameters(['learning-stages' => 'stage'])
            ->except('show')
            ->names('admin.learning-stages');

        // Inquiries (one tab per form type)
        Route::get('inquiries/resume/{inquiry}', [AdminInquiryController::class, 'resume'])->name('admin.inquiries.resume');
        Route::get('inquiries/view/{inquiry}', [AdminInquiryController::class, 'show'])->name('admin.inquiries.show');
        Route::delete('inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
        Route::get('inquiries/{type?}', [AdminInquiryController::class, 'index'])->name('admin.inquiries.index');

        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
});
