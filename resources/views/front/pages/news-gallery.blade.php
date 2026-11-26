@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-collage" aria-labelledby="ng-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <h1 class="h1x word-pop" id="ng-title" style="--d:1">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#gallery">{{ $c->text('hero_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <!-- <a class="btn btn-outline" href="#announcements">Announcements</a> -->
      </div>
    </div>
    <div class="collage intro-art" aria-hidden="true">
      <img class="c1 float" src="{{ $c->image('hero_collage_1_image') }}" alt="" width="256" height="391">
      <img class="c2 float-2" src="{{ $c->image('hero_collage_2_image') }}" alt="" width="316" height="191">
      <img class="c3 float" src="{{ $c->image('hero_collage_3_image') }}" alt="" width="209" height="209">
      <img class="c4 float-2" src="{{ $c->image('hero_collage_4_image') }}" alt="" width="813" height="460">
      <svg class="c5 spin-slow" viewBox="0 0 100 100"><circle cx="50" cy="50" r="46" fill="none" stroke="#03428e" stroke-width="2" stroke-dasharray="3 7"/></svg>
      <img class="c6 bob" src="{{ $c->image('hero_collage_5_image') }}" alt="" width="132" height="122">
    </div>
  </div>
</section>

<!-- <section class="sec tight" id="announcements" aria-labelledby="ann-title">
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
</section> -->

<section class="sec bg-sky" id="gallery" aria-labelledby="gal-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ $c->image('gallery_mascot_image') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">{!! $c->html('gallery_bubble') !!}</p></div>
      <span class="kicker">{{ $c->text('gallery_kicker') }}</span>
      <h2 class="h2" id="gal-title">{{ $c->title('gallery_title') }}</h2>
    </div>
    <div class="filters rv" data-for="g1" role="group" aria-label="Filter photos">
      <button type="button" data-cat="all" aria-pressed="true">{{ $c->text('gallery_filter_all') }}</button>
@foreach ($categories as $category)
      <button type="button" data-cat="{{ Str::slug($category->category_name) }}" aria-pressed="false">{{ $category->category_name }}</button>
@endforeach
    </div>
    <div class="gallery" id="g1" data-stagger>
@foreach ($galleries as $gallery)
      <figure class="g-item" data-cat="{{ Str::slug($gallery->category->category_name) }}" data-full="{{ $gallery->innerImageUrl() }}"><img src="{{ $gallery->listImageUrl() }}" alt="{{ $gallery->name }}" loading="lazy"><figcaption><span>{{ $gallery->name }}</span><b class="tag">{{ $gallery->category->category_name }}</b></figcaption></figure>
@endforeach
    </div>
    <p class="tbc-note" id="g1-empty" hidden style="max-width:520px;margin:10px auto 0">{{ $c->text('gallery_empty') }}</p>
  </div>
</section>
@endsection
