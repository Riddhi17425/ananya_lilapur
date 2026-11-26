<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>@yield('title') · Admin · Ananya International School, Lilapur</title>
<link rel="stylesheet" href="{{ asset('backend/css/vendor/dataTables-2.1.8.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/vendor/summernote-lite-0.9.0.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}">
@stack('styles')
</head>
<body class="admin-page">

<div class="admin-layout">
    {{-- Left sidebar --}}
    <aside class="sidebar" id="sidebar">
        <a class="sidebar__logo" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('frontend/assets/logo-white.svg') }}" alt="Ananya International School, Lilapur" width="170" height="44">
        </a>

        <nav class="sidebar__nav" aria-label="Admin navigation">
            <a href="{{ route('admin.dashboard') }}" @class(['is-active' => request()->routeIs('admin.dashboard')])>Dashboard</a>
            <a href="{{ route('admin.testimonials.index') }}" @class(['is-active' => request()->routeIs('admin.testimonials.*')])>Testimonials</a>
            <a href="{{ route('admin.photo-gallery-categories.index') }}" @class(['is-active' => request()->routeIs('admin.photo-gallery-categories.*')])>Gallery Categories</a>
            <a href="{{ route('admin.photo-galleries.index') }}" @class(['is-active' => request()->routeIs('admin.photo-galleries.*')])>Photo Gallery</a>
            <a href="{{ route('admin.faqs.index') }}" @class(['is-active' => request()->routeIs('admin.faqs.*')])>FAQs</a>
            <a href="{{ route('admin.learning-stages.index') }}" @class(['is-active' => request()->routeIs('admin.learning-stages.*')])>Learning Stages</a>
            <a href="{{ route('admin.inquiries.index') }}" @class(['is-active' => request()->routeIs('admin.inquiries.*')])>Inquiries</a>
        </nav>

        <div class="sidebar__footer">
            <p class="sidebar__user">{{ auth()->user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn--small">Log out</button>
            </form>
        </div>
    </aside>
    <div class="sidebar__scrim" data-sidebar-toggle></div>

    <div class="admin-main">
        {{-- Mobile top bar (menu button) --}}
        <div class="admin-topbar">
            <button type="button" class="sidebar-toggle" data-sidebar-toggle aria-label="Toggle menu" aria-controls="sidebar">&#9776;</button>
        </div>

        <main class="admin-content">
            @include('admin.partials.status')

            @yield('content')
        </main>
    </div>
</div>

@include('admin.partials.scripts')
@stack('scripts')
<script src="{{ asset('backend/js/admin.js') }}"></script>
</body>
</html>
