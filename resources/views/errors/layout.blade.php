<!doctype html>
{{-- Standalone page (no database, no site layout) so it still works when something is broken. --}}
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>@yield('title') · Ananya International School, Lilapur</title>
<link rel="stylesheet" href="{{ asset('frontend/assets/css/site.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/status-pages.css') }}">
</head>
<body>
<main class="status-page status-page--error">
    <div class="status-page__inner status-page__inner--split">
        <div class="sp-text">
            <a href="{{ url('/') }}" aria-label="Ananya International School, Lilapur - home"><img src="{{ asset('frontend/assets/logo.svg') }}" alt="Ananya International School, Lilapur" width="170" height="44"></a>

            <div class="sp-code" aria-hidden="true">@yield('code')</div>

            <h1 class="sp-rise d1">@yield('heading')</h1>
            <p class="sp-rise d2">@yield('message')</p>

            <div class="status-page__actions sp-rise d3">
                <a class="btn btn-apply" href="{{ url('/') }}">Back to Home</a>            </div>
        </div>

        <img class="status-page__tiger" src="{{ asset('frontend/assets/mascot/'.trim($__env->yieldContent('tiger', 'tiger-hello')).'.webp') }}" alt="" width="333" height="300">
    </div>
</main>
</body>
</html>
