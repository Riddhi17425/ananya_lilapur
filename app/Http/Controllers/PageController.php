<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('front.pages.index');
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function academics()
    {
        return view('front.pages.academics');
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
        return view('front.pages.admissions');
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
        return view('front.pages.news-gallery');
    }
}
