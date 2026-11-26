@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-about" aria-labelledby="about-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <h1 class="h1x word-pop" id="about-title" style="--d:1">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="{{ route('admissions') }}#enquire">{{ $c->text('hero_btn_apply') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="{{ route('admissions') }}#visit">{{ $c->text('hero_btn_visit') }}</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ $c->image('hero_image') }}" alt="{{ $c->text('hero_image_alt') }}" width="813" height="460" fetchpriority="high"></div>
  </div>
</section>

<section class="sec" id="legacy" aria-labelledby="legacy-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><img src="{{ $c->image('legacy_image') }}" alt="{{ $c->text('legacy_image_alt') }}" width="518" height="479" loading="lazy"></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">{{ $c->text('legacy_kicker') }}</span>
      <h2 class="h2" id="legacy-title">{{ $c->title('legacy_title') }}</h2>
      <p class="copy-18">{{ $c->text('legacy_text_1') }}</p>
      <p class="copy-18">{{ $c->text('legacy_text_2') }}</p>
    </div>
  </div>
  <img class="deco plane-d float" src="{{ $c->image('deco_plane') }}" alt="" width="183" height="165" loading="lazy" style="position:absolute;right:6%;top:40px;width:150px">
</section>

<section class="foundations-v2 sec bg-sky" id="vision" aria-labelledby="vision-title">
  <img class="deco tree-l par" data-speed="-.05" src="{{ $c->image('deco_tree') }}" alt="" width="327" height="846" loading="lazy">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker">{{ $c->text('vision_kicker') }}</span>
      <h2 class="h2" id="vision-title">{{ $c->title('vision_title') }}</h2>
    </div>
    <div class="vm2">
      <article class="vm-card vm-vision rv" data-rv="left">
        <img src="{{ $c->image('vision_image') }}" alt="{{ $c->text('vision_image_alt') }}" width="490" height="350" loading="lazy">
        <h3><img src="{{ $c->image('deco_vision_icon') }}" alt="" width="52" height="53" loading="lazy">{{ $c->text('vision_card_title') }}</h3>
        <p class="vision-q">{{ $c->text('vision_text_1') }}</p>
        <p class="vision-q">{{ $c->text('vision_text_2') }}</p>
      </article>
      <div class="vm-center">
        <img class="vm-medal spin-hover rv" data-rv="zoom" src="{{ $c->image('medal_image') }}" alt="{{ $c->text('medal_image_alt') }}" width="242" height="228" loading="lazy">
      </div>
      <article class="vm-card vm-mission rv" data-rv="right">
        <img src="{{ $c->image('mission_image') }}" alt="{{ $c->text('mission_image_alt') }}" width="513" height="350" loading="lazy">
        <h3><img src="{{ $c->image('deco_mission_icon') }}" alt="" width="51" height="53" loading="lazy">{{ $c->text('mission_card_title') }}</h3>
        <ul class="ticks vm-mission-list">
          <li>{{ $c->text('mission_item_1') }}</li>
          <li>{{ $c->text('mission_item_2') }}</li>
          <li>{{ $c->text('mission_item_3') }}</li>
          <li>{{ $c->text('mission_item_4') }}</li>
          <li>{{ $c->text('mission_item_5') }}</li>
        </ul>
      </article>
    </div>
    <h3 class="sub-h rv">{{ $c->text('values_title') }}</h3>
    <ul class="values-5" data-stagger>
      <li><img src="{{ $c->image('value_1_image') }}" alt="" width="110" height="110" loading="lazy"><h4>{{ $c->text('value_1_title') }}</h4></li>
      <li><img src="{{ $c->image('value_2_image') }}" alt="" width="110" height="110" loading="lazy"><h4>{{ $c->text('value_2_title') }}</h4></li>
      <li><img src="{{ $c->image('value_3_image') }}" alt="" width="110" height="110" loading="lazy"><h4>{{ $c->text('value_3_title') }}</h4></li>
      <li><img src="{{ $c->image('value_4_image') }}" alt="" width="110" height="110" loading="lazy"><h4>{{ $c->text('value_4_title') }}</h4></li>
      <li><img src="{{ $c->image('value_5_image') }}" alt="" width="110" height="110" loading="lazy"><h4>{{ $c->text('value_5_title') }}</h4></li>
    </ul>
  </div>
  <svg class="wave" viewBox="0 0 1440 112" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:90px"><path d="M0 40C200 6 420 4 700 34s540 50 740 8v70H0Z" fill="#fbf8f1"/></svg>
</section>

<section class="sec" id="why" aria-labelledby="whyana-title" style="overflow:hidden">
  <img class="deco story-blob" src="{{ $c->image('deco_blob') }}" alt="" width="350" height="337" loading="lazy">
  <img class="deco story-leaf" src="{{ $c->image('deco_leaf') }}" alt="" width="288" height="255" loading="lazy">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ $c->image('deco_tiger') }}" alt="" width="421" height="760" loading="lazy"><p class="bubble">{!! $c->html('why_bubble') !!}</p></div>
      <span class="kicker">{{ $c->text('why_kicker') }}</span>
      <h2 class="h2" id="whyana-title">{{ $c->title('why_title') }}</h2>
      <p class="copy-18">{{ $c->text('why_intro') }}</p>
    </div>
    <ol class="cards" data-stagger style="list-style:none">
      <li class="icard t-blue tilt-hover"><span class="num">01</span><span class="ic"><img src="{{ $c->image('why_card_1_icon') }}" alt="" width="64" height="64" loading="lazy"></span><h3>{{ $c->text('why_card_1_title') }}</h3><p>{{ $c->text('why_card_1_text') }}</p></li>
      <li class="icard t-peach tilt-hover"><span class="num">02</span><span class="ic"><img src="{{ $c->image('why_card_2_icon') }}" alt="" width="64" height="64" loading="lazy"></span><h3>{{ $c->text('why_card_2_title') }}</h3><p>{{ $c->text('why_card_2_text') }}</p></li>
      <li class="icard t-green tilt-hover"><span class="num">03</span><span class="ic"><img src="{{ $c->image('why_card_3_icon') }}" alt="" width="64" height="64" loading="lazy"></span><h3>{{ $c->text('why_card_3_title') }}</h3><p>{{ $c->text('why_card_3_text') }}</p></li>
      <li class="icard t-pink tilt-hover"><span class="num">04</span><span class="ic"><img src="{{ $c->image('why_card_4_icon') }}" alt="" width="64" height="64" loading="lazy"></span><h3>{{ $c->text('why_card_4_title') }}</h3><p>{{ $c->text('why_card_4_text') }}</p></li>
      <li class="icard t-yellow tilt-hover"><span class="num">05</span><span class="ic"><img src="{{ $c->image('why_card_5_icon') }}" alt="" width="64" height="64" loading="lazy"></span><h3>{{ $c->text('why_card_5_title') }}</h3><p>{{ $c->text('why_card_5_text') }}</p></li>
      <li class="icard t-mint tilt-hover"><span class="num">06</span><span class="ic"><img src="{{ $c->image('why_card_6_icon') }}" alt="" width="64" height="64" loading="lazy"></span><h3>{{ $c->text('why_card_6_title') }}</h3><p>{{ $c->text('why_card_6_text') }}</p></li>
    </ol>
    <div class="quote-band rv" data-rv="zoom" style="margin-top:80px">
      <blockquote>{{ $c->text('why_quote') }}</blockquote>
      <cite>{{ $c->text('why_quote_cite') }}</cite>
    </div>
  </div>
</section>

<section class="sec bg-peach" id="people" aria-labelledby="people-title" hidden>
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker">{{ $c->text('people_kicker') }}</span>
      <h2 class="h2" id="people-title">{{ $c->title('people_title') }}</h2>
    </div>
    <div class="msplit director rv">
      <div class="media"><div class="person"><div class="ph-slot" style="aspect-ratio:1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div></div></div>
      <div class="copy">
        <span class="kicker">{{ $c->text('director_kicker') }}</span>
        <h3 class="h2" style="font-size:clamp(30px,3vw,44px)">{{ $c->text('director_name') }}</h3>
        <p class="copy-18" style="font-style:italic;color:#5a6470">{{ $c->text('director_quote') }}</p>
      </div>
    </div>
    <div class="cards" data-stagger style="margin-top:70px">
      <article class="person"><div class="ph-slot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div><div class="body"><span class="role">{{ $c->text('person_1_role') }}</span><h3>{{ $c->text('person_1_name') }}</h3><p>{{ $c->text('person_1_text') }}</p></div></article>
      <article class="person"><div class="ph-slot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div><div class="body"><span class="role">{{ $c->text('person_2_role') }}</span><h3>{{ $c->text('person_2_name') }}</h3><p>{{ $c->text('person_2_text') }}</p></div></article>
      <article class="person"><div class="ph-slot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div><div class="body"><span class="role">{{ $c->text('person_3_role') }}</span><h3>{{ $c->text('person_3_name') }}</h3><p>{{ $c->text('person_3_text') }}</p></div></article>
    </div>
    <div class="msplit rev" style="margin-top:90px">
      <div class="media rv" data-rv="right"><img src="{{ $c->image('teachers_image') }}" alt="{{ $c->text('teachers_image_alt') }}" width="209" height="209" loading="lazy" style="border-radius:50%;max-width:420px;margin:0 auto;display:block"></div>
      <div class="copy rv" data-rv="left">
        <span class="kicker">{{ $c->text('teachers_kicker') }}</span>
        <h3 class="h2" style="font-size:clamp(32px,3.4vw,50px)">{{ $c->title('teachers_title') }}</h3>
        <p class="copy-18">{{ $c->text('teachers_text') }}</p>
        <a class="btn btn-primary btn-sm" href="{{ route('careers') }}">{{ $c->text('teachers_btn') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
      </div>
    </div>
  </div>
</section>
@endsection
