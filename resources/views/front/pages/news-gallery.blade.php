@extends('front.layouts.app')

@section('title', 'School News & Gallery · Ananya International School, Lilapur')
@section('description', 'Announcements, events, achievements and photo galleries from campus life.')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-collage" aria-labelledby="ng-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">School News &amp; Gallery</span></nav>
      <h1 class="h1x word-pop" id="ng-title" style="--d:1">Moments and <span class="accent">Milestones</span></h1>
      <p class="copy-18" style="--d:2">Latest announcements, events, achievements and photo galleries from campus life.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#gallery">Browse the Gallery <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#announcements">Announcements</a>
      </div>
    </div>
    <div class="collage intro-art" aria-hidden="true">
      <img class="c1 float" src="{{ asset('frontend/assets/students-arch.png') }}" alt="" width="256" height="391">
      <img class="c2 float-2" src="{{ asset('frontend/assets/space-library.png') }}" alt="" width="316" height="191">
      <img class="c3 float" src="{{ asset('frontend/assets/t-2012.png') }}" alt="" width="209" height="209">
      <img class="c4 float-2" src="{{ asset('frontend/assets/about-hero.png') }}" alt="" width="813" height="460">
      <svg class="c5 spin-slow" viewBox="0 0 100 100"><circle cx="50" cy="50" r="46" fill="none" stroke="#03428e" stroke-width="2" stroke-dasharray="3 7"/></svg>
      <img class="c6 bob" src="{{ asset('frontend/assets/acad-star.png') }}" alt="" width="132" height="122">
    </div>
  </div>
</section>

<section class="sec tight" id="announcements" aria-labelledby="ann-title">
  <div class="stage">
    <div class="sec-head left rv" style="margin-bottom:26px">
      <span class="kicker">Announcements</span>
      <h2 class="h2" id="ann-title">Latest from <span class="accent">Ananya</span></h2>
    </div>
    <div class="ann-row" data-stagger>
      <article class="ann"><span class="ann-tag">Admissions</span><h3>Admissions open for the academic year starting April 2027</h3><p>Enquire now or book a campus visit to meet our team.</p><a href="{{ route('admissions') }}">Read more →</a></article>
      <article class="ann tbc-ann"><span class="ann-tag">Announcement</span><h3>[Announcement title]</h3><p>[Date and short summary]</p></article>
      <article class="ann tbc-ann"><span class="ann-tag">Event</span><h3>[Event title]</h3><p>[Date and short summary]</p></article>
    </div>
  </div>
</section>

<section class="sec bg-sky" id="gallery" aria-labelledby="gal-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ asset('frontend/assets/mascot/tiger-hello.webp') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">Say <b>cheese</b>!</p></div>
      <span class="kicker">Photo Gallery</span>
      <h2 class="h2" id="gal-title">Life on <span class="accent">Campus</span></h2>
    </div>
    <div class="filters rv" data-for="g1" role="group" aria-label="Filter photos">
      <button type="button" data-cat="all" aria-pressed="true">All</button>
      <button type="button" data-cat="events" aria-pressed="false">Events</button>
      <button type="button" data-cat="sports" aria-pressed="false">Sports</button>
      <button type="button" data-cat="arts" aria-pressed="false">Arts</button>
      <button type="button" data-cat="achievements" aria-pressed="false">Achievements</button>
      <button type="button" data-cat="announcements" aria-pressed="false">Announcements</button>
    </div>
    <div class="gallery" id="g1" data-stagger>
      <figure class="g-item" data-cat="sports"><img src="{{ asset('frontend/assets/cricket-arch.png') }}" alt="A student batting at the cricket nets" loading="lazy"><figcaption><span>Cricket practice</span><b class="tag">Sports</b></figcaption></figure>
      <figure class="g-item" data-cat="events"><img src="{{ asset('frontend/assets/t-2004.png') }}" alt="Children playing together on the playground" loading="lazy"><figcaption><span>Playtime together</span><b class="tag">Events</b></figcaption></figure>
      <figure class="g-item" data-cat="arts"><img src="{{ asset('frontend/assets/space-art.png') }}" alt="The art and craft studio" loading="lazy"><figcaption><span>Art studio</span><b class="tag">Arts</b></figcaption></figure>
      <figure class="g-item" data-cat="events"><img src="{{ asset('frontend/assets/about-hero.png') }}" alt="Students building a terrarium" loading="lazy"><figcaption><span>Hands-on learning</span><b class="tag">Events</b></figcaption></figure>
      <figure class="g-item" data-cat="sports"><img src="{{ asset('frontend/assets/space-sports.png') }}" alt="The indoor sports hall" loading="lazy"><figcaption><span>Indoor sports hall</span><b class="tag">Sports</b></figcaption></figure>
      <figure class="g-item" data-cat="arts"><img src="{{ asset('frontend/assets/classroom-girl.png') }}" alt="A girl writing in her notebook" loading="lazy"><figcaption><span>Writing and drawing</span><b class="tag">Arts</b></figcaption></figure>
      <figure class="g-item" data-cat="events"><img src="{{ asset('frontend/assets/mission-photo.png') }}" alt="Children studying a seedling" loading="lazy"><figcaption><span>Learning outdoors</span><b class="tag">Events</b></figcaption></figure>
      <figure class="g-item" data-cat="events"><img src="{{ asset('frontend/assets/stage-photo.png') }}" alt="Students building a robot car" loading="lazy"><figcaption><span>Robotics corner</span><b class="tag">Events</b></figcaption></figure>
      <figure class="g-item" data-cat="announcements"><img src="{{ asset('frontend/assets/give-child.png') }}" alt="A family meeting the admissions team" loading="lazy"><figcaption><span>Admissions open for April 2027</span><b class="tag">Announcements</b></figcaption></figure>
    </div>
    <p class="tbc-note" id="g1-empty" hidden style="max-width:520px;margin:10px auto 0">No photos in this category yet. The school will add achievements as the first year unfolds.</p>
  </div>
</section>
@endsection
