<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\LearningStage;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryCategory;
use App\Models\Testimonial;

class PageController extends Controller
{
    public function home()
    {
        return view('front.pages.index', [
            'testimonials' => Testimonial::active()->oldest('id')->get(),
            // "Life at Ananya" strip: the 12 newest active photos from the photo gallery.
            'homeGalleries' => PhotoGallery::active()
                ->whereIn('category_id', PhotoGalleryCategory::active()->select('id'))
                ->latest('id')
                ->limit(12)
                ->get(),
        ]);
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function academics()
    {
        return view('front.pages.academics', [
            'stages' => LearningStage::active()->ordered()->get(),
        ]);
    }

    public function beyondAcademics()
    {
        return view('front.pages.beyond-academics');
    }

    public function campusFacilities()
    {
        return view('front.pages.campus-facilities');
    }

    public function admissions()
    {
        return view('front.pages.admissions', [
            'faqs' => Faq::active()->oldest('id')->get(),
        ]);
    }

    public function careers()
    {
        return view('front.pages.careers');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function newsGallery()
    {
        // "Life on Campus": all active categories (filters) and their active photos.
        $categories = PhotoGalleryCategory::active()->orderBy('id')->get();

        $galleries = PhotoGallery::active()
            ->with('category')
            ->whereIn('category_id', $categories->modelKeys())
            ->oldest('id')
            ->get();

        return view('front.pages.news-gallery', compact('categories', 'galleries'));
    }
}
