@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

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
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <h1 class="h1x word-pop" id="cf-title" style="--d:1">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="{{ route('admissions') }}#visit">{{ $c->text('hero_button_primary') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#safety">{{ $c->text('hero_button_secondary') }}</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ $c->image('hero_image') }}" alt="{{ $c->text('hero_image_alt') }}" width="1529" height="983" fetchpriority="high"></div>
  </div>
</section>

<nav class="jump" aria-label="On this page"><div class="stage"><a href="#classrooms">{{ $c->text('jump_1') }}</a><a href="#library-labs">{{ $c->text('jump_2') }}</a><a href="#sports-facilities">{{ $c->text('jump_3') }}</a><a href="#safety">{{ $c->text('jump_4') }}</a><a href="#health">{{ $c->text('jump_5') }}</a></div></nav>
<section class="sec" id="classrooms" aria-labelledby="cls-title">
  <div class="stage msplit">
    <div class="copy rv" data-rv="left">
      <span class="kicker">{{ $c->text('classrooms_kicker') }}</span>
      <h2 class="h2" id="cls-title">{{ $c->title('classrooms_title') }}</h2>
      <p class="copy-18">{{ $c->text('classrooms_text') }}</p>
      <ul class="ticks"><li>{{ $c->text('classrooms_item_1') }}</li><li>{{ $c->text('classrooms_item_2') }}</li><li>{{ $c->text('classrooms_item_3') }}</li><li>{{ $c->text('classrooms_item_4') }}</li><li>{{ $c->text('classrooms_item_5') }}</li></ul>
    </div>
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ $c->image('classrooms_image') }}" alt="{{ $c->text('classrooms_image_alt') }}" width="1249" height="751" loading="lazy"></div>
  </div>
</section>
<section class="sec bg-peach" id="library-labs" aria-labelledby="ll-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="left" aria-hidden="true"><img src="{{ $c->image('labs_mascot_image') }}" alt="" width="421" height="760" loading="lazy"><p class="bubble">{{ $c->text('labs_bubble_before') }}<b>{{ $c->text('labs_bubble_bold') }}</b>{{ $c->text('labs_bubble_after') }}</p></div>
      <span class="kicker">{{ $c->text('labs_kicker') }}</span>
      <h2 class="h2" id="ll-title">{{ $c->title('labs_title') }}</h2>
    </div>
    <div class="space-grid" data-stagger>
      <article class="space s-sports"><div class="ph"><img src="{{ $c->image('space_1_image') }}" alt="{{ $c->text('space_1_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('space_1_title') }}</h3><p>{{ $c->text('space_1_text') }}</p></article>
      <article class="space s-chem"><div class="ph"><img src="{{ $c->image('space_2_image') }}" alt="{{ $c->text('space_2_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('space_2_title') }}</h3><p>{{ $c->text('space_2_text') }}</p></article>
      <article class="space s-lib"><div class="ph"><img src="{{ $c->image('space_3_image') }}" alt="{{ $c->text('space_3_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('space_3_title') }}</h3><p>{{ $c->text('space_3_text') }}</p></article>
      <article class="space wide s-art"><div class="ph"><img src="{{ $c->image('space_4_image') }}" alt="{{ $c->text('space_4_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('space_4_title') }}</h3><p>{{ $c->text('space_4_text') }}</p></article>
      <article class="space wide s-comp"><div class="ph"><img src="{{ $c->image('space_5_image') }}" alt="{{ $c->text('space_5_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('space_5_title') }}</h3><p>{{ $c->text('space_5_text') }}</p></article>
    </div>
  </div>
</section>
<section class="sec" id="sports-facilities" aria-labelledby="sf-title">
  <div class="stage msplit rev">
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ $c->image('sports_image') }}" alt="{{ $c->text('sports_image_alt') }}" width="1249" height="1327" loading="lazy"></div>
    <div class="copy rv" data-rv="left">
      <span class="kicker">{{ $c->text('sports_kicker') }}</span>
      <h2 class="h2" id="sf-title">{{ $c->title('sports_title') }}</h2>
      <ul class="ticks"><li><b>{{ $c->text('sports_item_1_title') }}</b> {{ $c->text('sports_item_1_text') }}</li><li><b>{{ $c->text('sports_item_2_title') }}</b> {{ $c->text('sports_item_2_text') }}</li><li><b>{{ $c->text('sports_item_3_title') }}</b> {{ $c->text('sports_item_3_text') }}</li></ul>
      <a class="btn btn-primary btn-sm" href="{{ route('beyond-academics') }}#sports">{{ $c->text('sports_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>
<section class="sec bg-navy" id="safety" aria-labelledby="safe-title" style="overflow:hidden">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker" style="color:#ffb48a">{{ $c->text('transport_kicker') }}</span>
      <h2 class="h2" id="safe-title">{{ $c->title('transport_title') }}</h2>
    </div>
    <h3 class="sf-sub rv">{{ $c->text('transport_subtitle') }}</h3>
    <p class="copy-18 as-intro-s">{{ $c->text('transport_intro') }}</p>
    <ul class="skill-grid sf-grid" data-stagger><li><span><svg class="i"><use href="#ic-shield"/></svg></span><p>{{ $c->text('transport_feature_1') }}</p></li><li><span><svg class="i"><use href="#ic-door"/></svg></span><p>{{ $c->text('transport_feature_2') }}</p></li><li><span><svg class="i"><use href="#ic-phone"/></svg></span><p>{{ $c->text('transport_feature_3') }}</p></li><li><span><svg class="i"><use href="#ic-cctv"/></svg></span><p>{{ $c->text('transport_feature_4') }}</p></li></ul>
    <p class="sf-close rv">{{ $c->text('transport_closing') }}</p>
    <p class="sf-cta rv"><a class="btn btn-primary btn-sm" href="{{ route('contact') }}#transport">{{ $c->text('transport_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
  </div>
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>
<section class="sec bg-sky hw" id="health" aria-labelledby="hl-title">
  <div class="stage">
    <div class="sec-head rv hw-head">
      <span class="kicker">{{ $c->text('health_kicker') }}</span>
      <h2 class="h2" id="hl-title">{{ $c->title('health_title') }}</h2>
      <span class="hw-pill">{{ $c->text('health_pill') }}</span>
    </div>
    <div class="hw-body rv">
      <p class="hw-lead">{{ $c->text('health_lead') }}</p>
      <p class="copy-18">{{ $c->text('health_text') }}</p>
    </div>
    <div class="hw-quote rv">
      <p>{{ $c->text('health_quote') }}</p>
    </div>
  </div>
</section>
@endsection
