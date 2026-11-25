@extends('layouts.app')

@section('title', 'Campus & Facilities · Ananya International School, Lilapur')
@section('description', 'Classrooms, library, labs, sports facilities, safety, transport and well-being at the Lilapur campus.')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@push('styles')
<style>
/* Campus hero: wide photo sits near the top of the hero, with the same offset used on the other hero pages */
.ph-campus .ph-art{top:40px;width:600px}
</style>
@endpush

@section('content')
<section class="ph ph-campus" aria-labelledby="cf-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">Campus &amp; Facilities</span></nav>
      <h1 class="h1x word-pop" id="cf-title" style="--d:1">A Campus Designed <span class="accent">Around Children</span></h1>
      <p class="copy-18" style="--d:2">Our Lilapur campus is planned to be bright, safe and inspiring. Every space, from classroom to playground, supports learning, play and well-being.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="{{ route('admissions') }}#visit">Book a Campus Visit <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#safety">Transport</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ asset('frontend/assets/campus/hero-reading.webp') }}" alt="Three students reading a picture book together in a bright classroom" width="1529" height="983" fetchpriority="high"></div>
  </div>
</section>

<nav class="jump" aria-label="On this page"><div class="stage"><a href="#classrooms">Classrooms</a><a href="#library-labs">Library &amp; Labs</a><a href="#sports-facilities">Sports</a><a href="#safety">Transport</a><a href="#health">Health</a></div></nav>
<section class="sec" id="classrooms" aria-labelledby="cls-title">
  <div class="stage msplit">
    <div class="copy rv" data-rv="left">
      <span class="kicker">Classrooms &amp; Learning Spaces</span>
      <h2 class="h2" id="cls-title">Rooms Where Learning <span class="accent">Feels Natural</span></h2>
      <p class="copy-18">Spaces for questions, conversations and the joy of figuring things out. Our classrooms are thoughtfully planned to help children feel comfortable, involved and ready to learn.</p>
      <ul class="ticks"><li>Spacious, airy and well-lit classrooms</li><li>Child-friendly furniture suited to each age group</li><li>Smart boards and audio-visual aids</li><li>Activity corners and display walls for student work</li><li>Dedicated early-years rooms with safe play areas</li></ul>
    </div>
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ asset('frontend/assets/campus/classroom-model.webp') }}" alt="Students presenting a paper model village in a bright classroom while a teacher listens" width="1249" height="751" loading="lazy"></div>
  </div>
</section>
<section class="sec bg-peach" id="library-labs" aria-labelledby="ll-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="left" aria-hidden="true"><img src="{{ asset('frontend/assets/mascot/tiger-proud.webp') }}" alt="" width="421" height="760" loading="lazy"><p class="bubble">Come and <b>explore</b>!</p></div>
      <span class="kicker">Library &amp; Laboratories</span>
      <h2 class="h2" id="ll-title">Read, Explore, <span class="accent">Experiment</span></h2>
    </div>
    <div class="space-grid" data-stagger>
      <article class="space s-sports"><div class="ph"><img src="{{ asset('frontend/assets/home-sports.webp') }}" alt="Students playing a team sport at school" width="464" height="286" loading="lazy"></div><h3>Sports</h3><p>Space to move and compete, from squash and shooting to team games.</p></article>
      <article class="space s-chem"><div class="ph"><img src="{{ asset('frontend/assets/home-science-lab.webp') }}" alt="Students exploring a science activity together" width="464" height="286" loading="lazy"></div><h3>Science Lab</h3><p>Hands-on experiments in Physics, Chemistry and Biology for middle school.</p></article>
      <article class="space s-lib"><div class="ph"><img src="{{ asset('frontend/assets/home-library.webp') }}" alt="Students reading together in the school library" width="464" height="286" loading="lazy"></div><h3>Library</h3><p>An age-wise collection of books and digital resources, with quiet reading corners.</p></article>
      <article class="space wide s-art"><div class="ph"><img src="{{ asset('frontend/assets/home-art-music-rooms.webp') }}" alt="Students taking part in an Art and Music room activity" width="464" height="286" loading="lazy"></div><h3>Art &amp; Music Rooms</h3><p>Dedicated spaces for drawing, painting, craft, music and creative expression.</p></article>
      <article class="space wide s-comp"><div class="ph"><img src="{{ asset('frontend/assets/home-computer-lab.webp') }}" alt="Students learning with computers in the computer lab" width="464" height="286" loading="lazy"></div><h3>Computer Lab</h3><p>Coding, digital skills and safe internet use, with smart classrooms across the school.</p></article>
    </div>
  </div>
</section>
<section class="sec" id="sports-facilities" aria-labelledby="sf-title">
  <div class="stage msplit rev">
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ asset('frontend/assets/campus/sports-agility.webp') }}" alt="Students running agility ladder and cone drills on the outdoor grass with their coach" width="1249" height="1327" loading="lazy"></div>
    <div class="copy rv" data-rv="left">
      <span class="kicker">Sports Facilities</span>
      <h2 class="h2" id="sf-title">Space to Move <span class="accent">and Compete</span></h2>
      <ul class="ticks"><li><b>Outdoor Arena.</b> Open space for energetic play, teamwork and fresh challenges. Children learn to participate wholeheartedly, support one another and enjoy their own progress.</li><li><b>Indoor Arena.</b> A lively space for movement, practice and shared achievement. Indoor activities help children build coordination, focus and confidence.</li><li><b>Precision Sports | Shooting Range.</b> A dedicated space for learning patience, precision and self-control. Age-appropriate participation is guided by trained supervision and clear safety procedures.</li></ul>
      <a class="btn btn-primary btn-sm" href="{{ route('beyond-academics') }}#sports">See Our Sports Programme <svg class="arrow"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>
<section class="sec bg-navy" id="safety" aria-labelledby="safe-title" style="overflow:hidden">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker" style="color:#ffb48a">Transport</span>
      <h2 class="h2" id="safe-title">A Safe Journey, <span class="accent">Door to School</span></h2>
    </div>
    <h3 class="sf-sub rv">Safe and reliable school transport</h3>
    <p class="copy-18 as-intro-s">Ananya International School partners with a third-party transport service provider to offer students a convenient and safety-focused commute.</p>
    <ul class="skill-grid sf-grid" data-stagger><li><span><svg class="i"><use href="#ic-shield"/></svg></span><p>GPS-enabled buses</p></li><li><span><svg class="i"><use href="#ic-door"/></svg></span><p>Planned pick-up and drop-off</p></li><li><span><svg class="i"><use href="#ic-phone"/></svg></span><p>Parent support</p></li><li><span><svg class="i"><use href="#ic-cctv"/></svg></span><p>CCTV surveillance</p></li></ul>
    <p class="sf-close rv">A child’s school day begins before the first lesson and ends after the last bell. Our transport arrangements help parents understand routes, pick-up and drop-off points and how to reach the transport team.</p>
    <p class="sf-cta rv"><a class="btn btn-primary btn-sm" href="{{ route('contact') }}#transport">Transport enrolment form <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
  </div>
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>
<section class="sec bg-sky hw" id="health" aria-labelledby="hl-title">
  <div class="stage">
    <div class="sec-head rv hw-head">
      <span class="kicker">Health &amp; Well-being</span>
      <h2 class="h2" id="hl-title">Nourish &amp; <span class="accent">Belong</span></h2>
      <span class="hw-pill">Cafeteria</span>
    </div>
    <div class="hw-body rv">
      <p class="hw-lead">A welcoming place to pause, eat and spend time together. Our cafeteria is planned with attention to hygiene, comfort and the everyday joy of sharing a table.</p>
      <p class="copy-18">Movement, good food and everyday care come together to help children build healthy habits and feel good about themselves.</p>
    </div>
    <div class="hw-quote rv">
      <p>Parents can trust the journey, so children can enjoy the day.</p>
    </div>
  </div>
</section>
@endsection
