<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{!! $__env->yieldContent('title', 'Ananya International School, Lilapur') !!}</title>
<meta name="description" content="{!! $__env->yieldContent('description') !!}">
<meta name="csrf-token" content="{{ csrf_token() }}">
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

@include('front.partials.svg-sprite')
@include('front.partials.header')

<main id="main">@yield('content')</main>

@include('front.partials.footer')
@include('front.partials.enquiry-modal')

<script src="{{ asset('frontend/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery.validate-1.20.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/site.js') }}"></script>
<script src="{{ asset('frontend/assets/js/forms.js') }}"></script>
<script src="{{ asset('frontend/assets/js/mascot.js') }}"></script>
@stack('scripts')
</body>
</html>
