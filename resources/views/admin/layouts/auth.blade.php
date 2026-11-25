<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>@yield('title') · Admin · Ananya International School, Lilapur</title>
<link rel="preload" href="{{ asset('frontend/assets/fonts/dm-sans-latin-opsz-normal.woff2') }}" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}">
</head>
<body class="auth-page">

<div class="auth-shell">
    {{-- Brand panel (hidden on small screens) --}}
    <aside class="auth-brand" aria-hidden="true">
        <img class="auth-brand__logo" src="{{ asset('frontend/assets/logo-white.svg') }}" alt="" width="193" height="50">
        <div class="auth-brand__body">
            <h2>Admin Panel</h2>
            <p>Manage Ananya International School, Lilapur securely from one place.</p>
        </div>
        <img class="auth-brand__tiger" src="{{ asset('frontend/assets/mascot/tiger-hello.webp') }}" alt="" width="300" height="300">
    </aside>

    {{-- Form panel --}}
    <main class="auth-main">
        <div class="auth-card">
            <img class="auth-card__logo" src="{{ asset('frontend/assets/logo.svg') }}" alt="Ananya International School, Lilapur" width="193" height="50">

            <h1>@yield('heading')</h1>
            <p class="auth-card__sub">@yield('subheading')</p>

            @include('admin.partials.status')

            @yield('content')
        </div>
    </main>
</div>

@include('admin.partials.scripts')
</body>
</html>
