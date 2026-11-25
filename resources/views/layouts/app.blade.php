<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{!! $__env->yieldContent('title', 'Ananya International School, Lilapur') !!}</title>
<meta name="description" content="{!! $__env->yieldContent('description') !!}">
<script>document.documentElement.classList.add("js")</script>
<link rel="preload" href="{{ asset('frontend/assets/fonts/newsreader-latin-opsz-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="{{ asset('frontend/assets/fonts/dm-sans-latin-opsz-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="{{ asset('frontend/assets/css/site.css') }}">
@stack('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/v2.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/mascot.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/refined.css') }}">
@stack('styles')
</head>
<body>

@include('partials.svg-sprite')
@include('partials.header')

<main id="main">@yield('content')</main>

@include('partials.footer')
@include('partials.enquiry-modal')

<script src="{{ asset('frontend/assets/js/site.js') }}"></script>
<script src="{{ asset('frontend/assets/js/mascot.js') }}"></script>
@stack('scripts')
</body>
</html>
