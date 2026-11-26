@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-collage" aria-labelledby="ba-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <h1 class="h1x word-pop" id="ba-title" style="--d:1">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#sports">{{ $c->text('hero_button_1') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="{{ route('admissions') }}#visit">{{ $c->text('hero_button_2') }}</a>
      </div>
    </div>
    <div class="collage intro-art" aria-hidden="true">
      <img class="c1 float" src="{{ $c->image('deco_hero_1') }}" alt="" width="420" height="640">
      <img class="c2 float-2" src="{{ $c->image('deco_hero_2') }}" alt="" width="464" height="295">
      <img class="c3 float" src="{{ $c->image('deco_hero_3') }}" alt="" width="207" height="207">
      <img class="c4 float-2" src="{{ $c->image('deco_hero_4') }}" alt="" width="613" height="361">
      <svg class="c5 spin-slow" viewBox="0 0 100 100"><circle cx="50" cy="50" r="46" fill="none" stroke="#ef6b2e" stroke-width="2" stroke-dasharray="3 7"/></svg>
      <img class="c6 bob" src="{{ $c->image('deco_hero_sun') }}" alt="" width="150" height="128">
    </div>
  </div>
</section>

<section class="sec" id="sports" aria-labelledby="sports-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><div class="arch-img" style="max-width:none;box-shadow:none;border:none"><img src="{{ $c->image('sports_image') }}" style="transform:none;transition:none;width:98%" alt="{{ $c->text('sports_image_alt') }}" width="1249" height="1327" loading="lazy"></div></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">{{ $c->text('sports_kicker') }}</span>
      <h2 class="h2" id="sports-title">{{ $c->title('sports_title') }}</h2>
      <p class="copy-18">{{ $c->text('sports_text') }}</p>
      <h3 class="mini-h">{{ $c->text('sports_list_title') }}</h3>
      <ul class="chips"><li>{{ $c->text('sports_chip_1') }}</li><li>{{ $c->text('sports_chip_2') }}</li><li>{{ $c->text('sports_chip_3') }}</li><li>{{ $c->text('sports_chip_4') }}</li><li>{{ $c->text('sports_chip_5') }}</li><li>{{ $c->text('sports_chip_6') }}</li><li>{{ $c->text('sports_chip_7') }}</li><li>{{ $c->text('sports_chip_8') }}</li><li>{{ $c->text('sports_chip_9') }}</li><li>{{ $c->text('sports_chip_10') }}</li><li>{{ $c->text('sports_chip_11') }}</li><li>{{ $c->text('sports_chip_12') }}</li></ul>
    </div>
  </div>
</section>

<section class="sec bg-peach" id="performing" aria-labelledby="perf-title">
  <img class="deco par" data-speed="-.08" src="{{ $c->image('deco_leaf') }}" alt="" width="288" height="255" loading="lazy" style="position:absolute;right:0;top:20px;width:220px">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker">{{ $c->text('perf_kicker') }}</span>
      <h2 class="h2" id="perf-title">{{ $c->title('perf_title') }}</h2>
      <p class="copy-18">{{ $c->text('perf_text') }}</p>
    </div>
    <div class="cards c4" data-stagger>
      <article class="blobcard"><img class="bg" src="{{ $c->image('deco_card_bg_1') }}" alt="" width="294" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-music"/></svg></span><h3>{{ $c->text('perf_card_1_title') }}</h3><p>{{ $c->text('perf_card_1_text') }}</p></article>
      <article class="blobcard"><img class="bg" src="{{ $c->image('deco_card_bg_2') }}" alt="" width="284" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-dance"/></svg></span><h3>{{ $c->text('perf_card_2_title') }}</h3><p>{{ $c->text('perf_card_2_text') }}</p></article>
      <article class="blobcard"><img class="bg" src="{{ $c->image('deco_card_bg_3') }}" alt="" width="310" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-drama"/></svg></span><h3>{{ $c->text('perf_card_3_title') }}</h3><p>{{ $c->text('perf_card_3_text') }}</p></article>
      <article class="blobcard"><img class="bg" src="{{ $c->image('deco_card_bg_4') }}" alt="" width="298" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-party"/></svg></span><h3>{{ $c->text('perf_card_4_title') }}</h3><p>{{ $c->text('perf_card_4_text') }}</p></article>
    </div>
  </div>
</section>

<section class="sec" id="visual" aria-labelledby="visual-title">
  <div class="stage msplit rev">
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ $c->image('visual_image') }}" alt="{{ $c->text('visual_image_alt') }}" width="1249" height="799" loading="lazy" style="box-shadow:none;transform:none;transition:none"></div>
    <div class="copy rv" data-rv="left">
      <span class="kicker">{{ $c->text('visual_kicker') }}</span>
      <h2 class="h2" id="visual-title">{{ $c->title('visual_title') }}</h2>
      <p class="copy-18">{{ $c->text('visual_text') }}</p>
    </div>
  </div>
</section>

<section class="sec bg-sky" id="clubs" aria-labelledby="clubs-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ $c->image('deco_tiger') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">{!! $c->html('clubs_bubble') !!}</p></div>
      <span class="kicker">{{ $c->text('clubs_kicker') }}</span>
      <h2 class="h2" id="clubs-title">{{ $c->title('clubs_title') }}</h2>
      <p class="copy-18">{{ $c->text('clubs_text') }}</p>
    </div>
    <ul class="club-cloud" data-stagger><li class="t-green"><svg class="i"><use href="#ic-speak"/></svg>{{ $c->text('clubs_chip_1') }}</li><li class="t-blue"><svg class="i"><use href="#ic-star"/></svg>{{ $c->text('clubs_chip_2') }}</li><li class="t-peach"><svg class="i"><use href="#ic-people"/></svg>{{ $c->text('clubs_chip_3') }}</li><li class="t-pink"><svg class="i"><use href="#ic-dance"/></svg>{{ $c->text('clubs_chip_4') }}</li><li class="t-mint"><svg class="i"><use href="#ic-music"/></svg>{{ $c->text('clubs_chip_5') }}</li><li class="t-yellow"><svg class="i"><use href="#ic-chess"/></svg>{{ $c->text('clubs_chip_6') }}</li></ul>
  </div>
</section>

<section class="sec bg-navy" id="life-skills" aria-labelledby="ls-title" style="overflow:hidden">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker" style="color:#ffb48a">{{ $c->text('skills_kicker') }}</span>
      <h2 class="h2" id="ls-title">{{ $c->title('skills_title') }}</h2>
      <p class="copy-18">{{ $c->text('skills_text') }}</p>
    </div>
    <ul class="skill-grid" data-stagger><li><span><svg class="i"><use href="#ic-puzzle"/></svg></span><p>{{ $c->text('skills_item_1') }}</p></li><li><span><svg class="i"><use href="#ic-bulb"/></svg></span><p>{{ $c->text('skills_item_2') }}</p></li><li><span><svg class="i"><use href="#ic-speak"/></svg></span><p>{{ $c->text('skills_item_3') }}</p></li><li><span><svg class="i"><use href="#ic-people"/></svg></span><p>{{ $c->text('skills_item_4') }}</p></li><li><span><svg class="i"><use href="#ic-phone"/></svg></span><p>{{ $c->text('skills_item_5') }}</p></li><li><span><svg class="i"><use href="#ic-heart"/></svg></span><p>{{ $c->text('skills_item_6') }}</p></li><li><span><svg class="i"><use href="#ic-shield"/></svg></span><p>{{ $c->text('skills_item_7') }}</p></li><li><span><svg class="i"><use href="#ic-star"/></svg></span><p>{{ $c->text('skills_item_8') }}</p></li><li><span><svg class="i"><use href="#ic-cube"/></svg></span><p>{{ $c->text('skills_item_9') }}</p></li><li><span><svg class="i"><use href="#ic-hands"/></svg></span><p>{{ $c->text('skills_item_10') }}</p></li></ul>
  </div>
  <svg class="deco plane float" style="color:#fff;--pf:transparent;--pf2:transparent;position:absolute;right:5%;top:70px;width:150px" aria-hidden="true"><use href="#i-plane"/></svg>
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>

<section class="sec" id="leadership" aria-labelledby="lead-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><div class="arch-img" style="border-radius:0;max-width:92%;box-shadow:none"><img src="{{ $c->image('lead_image') }}" alt="{{ $c->text('lead_image_alt') }}" width="1269" height="1347" loading="lazy"></div></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">{{ $c->text('lead_kicker') }}</span>
      <h2 class="h2" id="lead-title">{{ $c->title('lead_title') }}</h2>
      <p class="copy-18">{{ $c->text('lead_text') }}</p>
      <ul class="ticks"><li>{{ $c->text('lead_tick_1') }}</li><li>{{ $c->text('lead_tick_2') }}</li><li>{{ $c->text('lead_tick_3') }}</li><li>{{ $c->text('lead_tick_4') }}</li></ul>
      <a class="btn btn-apply" href="{{ route('admissions') }}#enquire">{{ $c->text('lead_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>
@endsection
