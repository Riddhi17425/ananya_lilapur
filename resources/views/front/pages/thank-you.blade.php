@extends('front.layouts.app')

@section('title', 'Thank You · Ananya International School, Lilapur')
@section('description', 'Thank you for contacting Ananya International School, Lilapur.')

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/status-pages.css') }}">
@endpush

@php
    // Short message for each form.
    $messages = [
        'enquire' => 'Our admissions team will connect with you soon.',
        'visit' => 'We have received your campus visit request and will confirm the time with you shortly.',
        'career' => 'Our team will review your application and get in touch if there is a good fit.',
        'contact' => 'We will review this and get back to you shortly.',
        'notify' => 'We will let you know as soon as Classes 9 to 12 open for admission.',
    ];
@endphp

@section('content')
<section class="status-page">
    <div class="sp-confetti" aria-hidden="true">
        @for ($i = 0; $i < 12; $i++)<i></i>@endfor
    </div>

    <div class="status-page__inner">
        <div class="sp-tick" aria-hidden="true"><svg viewBox="0 0 36 36"><path d="M9 18.5l6 6 12-13"/></svg></div>

        <h1 class="sp-rise d1" role="status">Thank <span class="accent">you!</span></h1>
        <p class="sp-rise d2">{{ $messages[$type] ?? $messages['contact'] }}</p>

        <div class="status-page__actions sp-rise d3">
            <a class="btn btn-apply" href="{{ route('home') }}">Back to Home <svg class="arrow"><use href="#i-arrow"/></svg></a>        </div>
    </div>
</section>
@endsection
