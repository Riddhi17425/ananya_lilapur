<a class="skip" href="#main">Skip to content</a>
<div class="topbar">
  <div class="container topbar-inner">
    <p class="tb-note"><span class="live-dot" aria-hidden="true"></span>Admissions open for the academic year starting April 2027</p>
    <ul class="tb-links">
      <li><a href="{{ route('admissions') }}#visit">Book a Campus Visit</a></li>
      <li><a href="{{ route('news-gallery') }}">School News &amp; Gallery</a></li>
      <!-- Parent Login: show only once the parent portal is live
      <li><a href="#" title="Access attendance, circulars, fee updates and progress reports.">Parent Login</a></li> -->
    </ul>
  </div>
</div>
<header class="site-header" id="top">
  <div class="container header-inner">
    <a class="logo" href="{{ route('home') }}" aria-label="Ananya International School, Lilapur — home"><img src="{{ asset('frontend/assets/logo.svg') }}" alt="Ananya International School, Lilapur" width="193" height="50"></a>
    <nav class="main-nav" aria-label="Main navigation">
      <ul>
        <li><a @class(['nav-link', 'is-active' => request()->routeIs('about')]) {!! request()->routeIs('about') ? 'aria-current="page"' : '' !!} href="{{ route('about') }}">About Us</a></li>
        <li><a @class(['nav-link', 'is-active' => request()->routeIs('academics')]) {!! request()->routeIs('academics') ? 'aria-current="page"' : '' !!} href="{{ route('academics') }}">Academics</a></li>
        <li><a @class(['nav-link', 'is-active' => request()->routeIs('beyond-academics')]) {!! request()->routeIs('beyond-academics') ? 'aria-current="page"' : '' !!} href="{{ route('beyond-academics') }}">Beyond Academics</a></li>
        <li><a @class(['nav-link', 'is-active' => request()->routeIs('campus-facilities')]) {!! request()->routeIs('campus-facilities') ? 'aria-current="page"' : '' !!} href="{{ route('campus-facilities') }}">Campus &amp; Facilities</a></li>
        <li><a @class(['nav-link', 'is-active' => request()->routeIs('admissions')]) {!! request()->routeIs('admissions') ? 'aria-current="page"' : '' !!} href="{{ route('admissions') }}">Admissions</a></li>
        <li><a @class(['nav-link', 'is-active' => request()->routeIs('careers')]) {!! request()->routeIs('careers') ? 'aria-current="page"' : '' !!} href="{{ route('careers') }}">Careers</a></li>
        <li><a @class(['nav-link', 'is-active' => request()->routeIs('contact')]) {!! request()->routeIs('contact') ? 'aria-current="page"' : '' !!} href="{{ route('contact') }}">Contact Us</a></li>
      </ul>
      <div class="nav-mobile-extra">
        <a href="{{ route('admissions') }}#visit">Book a Campus Visit</a>
        <a href="{{ route('news-gallery') }}">School News &amp; Gallery</a>
      </div>
    </nav>
    <a class="btn btn-apply header-cta" href="{{ route('admissions') }}#enquire">Apply for Admission <svg class="arrow"><use href="#i-arrow"/></svg></a>
    <button class="menu-toggle" aria-label="Open menu" aria-expanded="false"><span></span></button>
  </div>
</header>
