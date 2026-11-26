@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-acad" aria-labelledby="acad-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <h1 class="h1x word-pop" id="acad-title" style="--d:1">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#stages">{{ $c->text('hero_button_1') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#quest">{{ $c->text('hero_button_2') }}</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ $c->image('hero_image') }}" alt="{{ $c->text('hero_image_alt') }}" width="765" height="492" fetchpriority="high"></div>
  </div>
</section>

<section class="sec" id="cbse" aria-labelledby="cbse-title">
  <img class="deco" src="{{ $c->image('deco_blob_left') }}" alt="" width="245" height="286" loading="lazy" style="position:absolute;left:0;top:0;width:110px;z-index:0">
  <div class="stage msplit">
    <div class="copy rv" data-rv="left">
      <span class="kicker">{{ $c->text('cbse_kicker') }}</span>
      <h2 class="h2" id="cbse-title">{{ $c->title('cbse_title') }}</h2>
      <p class="copy-18">{{ $c->text('cbse_text') }}</p>
      <h3 class="mini-h">{{ $c->text('cbse_list_title') }}</h3>
      <ul class="ticks">
        <li>{{ $c->text('cbse_item_1') }}</li>
        <li>{{ $c->text('cbse_item_2') }}</li>
        <li>{{ $c->text('cbse_item_3') }}</li>
        <li>{{ $c->text('cbse_item_4') }}</li>
        <li>{{ $c->text('cbse_item_5') }}</li>
      </ul>
    </div>
    <div class="media rv" data-rv="right">
      <img src="{{ $c->image('cbse_image') }}" alt="{{ $c->text('cbse_image_alt') }}" width="1120" height="1276" loading="lazy">
      <aside class="callout-card float-2">
        <h3>{{ $c->text('cbse_card_title') }}</h3>
        <p>{{ $c->text('cbse_card_text') }}</p>
      </aside>
    </div>
  </div>
</section>

<section class="sec bg-navy qp" id="quest" aria-labelledby="quest-title">
  <div class="stage">
    <div class="sec-head rv qp-head">
      <span class="kicker" style="color:#ffb48a">{{ $c->text('quest_kicker') }}</span>
      <h2 class="h2" id="quest-title">{{ $c->title('quest_title') }}</h2>
      <p class="qp-sub">{{ $c->text('quest_sub') }}</p>
      <p class="copy-18">{{ $c->text('quest_text') }}</p>
    </div>
    <h3 class="qp-title rv">{{ $c->text('quest_grid_title') }} <span>{{ $c->text('quest_grid_title_accent') }}</span></h3>
    <div class="qp-grid" data-stagger>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">{{ $c->text('quest_card_1_letter') }}</span>
          <h3>{{ $c->text('quest_card_1_title') }}</h3>
          <p class="qp-tag">{{ $c->text('quest_card_1_tag') }}</p>
          <p class="qp-body">{{ $c->text('quest_card_1_text') }}</p>
          <p class="qp-method">{{ $c->text('quest_card_1_method') }}</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">{{ $c->text('quest_card_2_letter') }}</span>
          <h3>{{ $c->text('quest_card_2_title') }}</h3>
          <p class="qp-tag">{{ $c->text('quest_card_2_tag') }}</p>
          <p class="qp-body">{{ $c->text('quest_card_2_text') }}</p>
          <p class="qp-method">{{ $c->text('quest_card_2_method') }}</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">{{ $c->text('quest_card_3_letter') }}</span>
          <h3>{{ $c->text('quest_card_3_title') }}</h3>
          <p class="qp-tag">{{ $c->text('quest_card_3_tag') }}</p>
          <p class="qp-body">{{ $c->text('quest_card_3_text') }}</p>
          <p class="qp-method">{{ $c->text('quest_card_3_method') }}</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">{{ $c->text('quest_card_4_letter') }}</span>
          <h3>{{ $c->text('quest_card_4_title') }}</h3>
          <p class="qp-tag">{{ $c->text('quest_card_4_tag') }}</p>
          <p class="qp-body">{{ $c->text('quest_card_4_text') }}</p>
          <p class="qp-method">{{ $c->text('quest_card_4_method') }}</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">{{ $c->text('quest_card_5_letter') }}</span>
          <h3>{{ $c->text('quest_card_5_title') }}</h3>
          <p class="qp-tag">{{ $c->text('quest_card_5_tag') }}</p>
          <p class="qp-body">{{ $c->text('quest_card_5_text') }}</p>
          <p class="qp-method">{{ $c->text('quest_card_5_method') }}</p>
        </article>
    </div>
  </div>
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>

@if ($stages->isNotEmpty())
<section class="sec stage-tabs" id="stages" data-tabs aria-labelledby="stages-title">
  <img class="deco wiggle" src="{{ $c->image('deco_star') }}" alt="" width="132" height="122" loading="lazy" style="position:absolute;left:5%;top:120px;width:100px">
  <img class="deco float" src="{{ $c->image('deco_sun') }}" alt="" width="150" height="128" loading="lazy" style="position:absolute;right:6%;top:60px;width:130px">
  <div class="stage">
    <div class="g-head rv">
      <h2 class="h2" id="stages-title">{{ $c->title('stages_title') }}</h2>
      <p class="copy-18">{{ $c->text('stages_text') }}</p>
      <div class="tabs" role="tablist" aria-label="School stages">
        @foreach ($stages as $stage)
        <button role="tab" id="tab-{{ $stage->slug() }}" aria-controls="panel-{{ $stage->slug() }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}" @if (! $loop->first) tabindex="-1" @endif>{{ $stage->tab_name }}</button>
        @endforeach
      </div>
    </div>
    @foreach ($stages as $stage)
    <div class="panel" id="panel-{{ $stage->slug() }}" role="tabpanel" aria-labelledby="tab-{{ $stage->slug() }}" @if (! $loop->first) hidden @endif>
      <img src="{{ $stage->imageUrl() }}" alt="{{ $stage->image_alt }}" loading="lazy" style="max-width:{{ $stage->image_width }}px;margin:0 auto{{ $stage->image_arch ? ';border-radius:150px 150px 20px 20px' : '' }}">
      <div class="copy">
        @if ($stage->badge)<span class="soon-badge">{{ $stage->badge }}</span>@endif
        <span class="kicker">{{ $stage->kicker }}</span>
        <h3>{{ $stage->heading }}</h3>
        <div class="copy-18">{!! $stage->description !!}</div>
        @if ($stage->pointList())
        <ul class="ticks cols">@foreach ($stage->pointList() as $point)<li>{{ $point }}</li>@endforeach</ul>
        @endif
        @if ($stage->classList())
        <ul class="chips" aria-label="Classes">@foreach ($stage->classList() as $class)<li>{{ $class }}</li>@endforeach</ul>
        @endif
        @if ($stage->notify_button)
        <button class="btn btn-apply" type="button" data-enquire data-notify-me data-source="notify-{{ $stage->slug() }}" data-title="Notify Me When Available" data-text="Leave your details and we will let you know as soon as Classes 9 to 12 open for admission.">Notify Me When Available <svg class="arrow"><use href="#i-arrow"/></svg></button>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif

<section class="sec bg-sky as" id="assessment" aria-labelledby="assess-title">
  <div class="stage">
    <div class="sec-head rv as-head">
      <span class="kicker">{{ $c->text('assess_kicker') }}</span>
      <h2 class="h2" id="assess-title">{{ $c->title('assess_title') }}</h2>
      <p class="copy-18">{{ $c->text('assess_text') }}</p>
    </div>
    <ol class="as-steps" data-stagger aria-label="How we assess">
        <li class="as-step">
          <span class="as-num" aria-hidden="true">{{ $c->text('assess_step_1_num') }}</span>
          <h3>{{ $c->text('assess_step_1_title') }}</h3>
          <p>{{ $c->text('assess_step_1_text') }}</p>
        </li>
        <li class="as-step">
          <span class="as-num" aria-hidden="true">{{ $c->text('assess_step_2_num') }}</span>
          <h3>{{ $c->text('assess_step_2_title') }}</h3>
          <p>{{ $c->text('assess_step_2_text') }}</p>
        </li>
        <li class="as-step">
          <span class="as-num" aria-hidden="true">{{ $c->text('assess_step_3_num') }}</span>
          <h3>{{ $c->text('assess_step_3_title') }}</h3>
          <p>{{ $c->text('assess_step_3_text') }}</p>
        </li>
        <li class="as-step">
          <span class="as-num" aria-hidden="true">{{ $c->text('assess_step_4_num') }}</span>
          <h3>{{ $c->text('assess_step_4_title') }}</h3>
          <p>{{ $c->text('assess_step_4_text') }}</p>
        </li>
    </ol>
    <p class="as-close rv">{{ $c->text('assess_close') }}</p>
  </div>
</section>

<section class="brighter" aria-labelledby="bright-title">
  <div class="stage" style="height:100%">
    <div class="copy rv" data-rv="left">
      <h2 class="h2" id="bright-title">{{ $c->text('cta_title_before') }} <span class="br">{{ $c->text('cta_title_middle') }} <span class="accent">{{ $c->text('cta_title_accent') }}</span></span></h2>
      <p class="copy-dm">{{ $c->text('cta_text') }}</p>
      <div class="btn-row"><a class="btn btn-apply" href="{{ route('admissions') }}#enquire">{{ $c->text('cta_button_1') }} <svg class="arrow"><use href="#i-arrow"/></svg></a><a class="btn btn-outline" href="{{ route('admissions') }}#visit">{{ $c->text('cta_button_2') }}</a></div>
    </div>
    <img class="art rv" data-rv="right" src="{{ $c->image('cta_image') }}" alt="{{ $c->text('cta_image_alt') }}" width="817" height="413" loading="lazy">
  </div>
</section>
@endsection
