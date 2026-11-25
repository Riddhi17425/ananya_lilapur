<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function academics()
    {
        return view('pages.academics');
    }

    public function beyondAcademics()
    {
        return view('pages.beyond-academics');
    }

    public function campusFacilities()
    {
        return view('pages.campus-facilities');
    }

    public function admissions()
    {
        return view('pages.admissions');
    }

    public function careers()
    {
        return view('pages.careers');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function newsGallery()
    {
        return view('pages.news-gallery');
    }
}
