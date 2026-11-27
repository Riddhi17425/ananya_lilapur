@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-adm" aria-labelledby="adm-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <p class="badge" style="--d:0;margin-top:18px"><b>{{ $c->text('hero_badge_bold') }}</b> {{ $c->text('hero_badge_text') }}</p>
      <h1 class="h1x word-pop" id="adm-title" style="--d:1;margin-top:16px">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="#enquire">{{ $c->text('hero_apply_label') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#visit">{{ $c->text('hero_visit_label') }}</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ $c->image('hero_image') }}" alt="{{ $c->text('hero_image_alt') }}" width="817" height="413" fetchpriority="high"></div>
  </div>
</section>

<nav class="jump" aria-label="On this page"><div class="stage"><a href="#process">{{ $c->text('jump_process') }}</a><a href="#eligibility">{{ $c->text('jump_eligibility') }}</a>{{-- Fees tab commented out for now: <a href="#fees">{{ $c->text('jump_fees') }}</a> --}}<a href="#faq">{{ $c->text('jump_faq') }}</a><a href="#enquire">{{ $c->text('jump_enquire') }}</a><a href="#visit">{{ $c->text('jump_visit') }}</a></div></nav>

<section class="sec bg-peach" id="process" aria-labelledby="proc-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ $c->image('deco_tiger_image') }}" alt="" width="505" height="760" loading="lazy"><p class="bubble">{{ $c->text('process_mascot_before') }} <b>{{ $c->text('process_mascot_bold') }}</b> {{ $c->text('process_mascot_after') }}</p></div>
      <span class="kicker">{{ $c->text('process_kicker') }}</span>
      <h2 class="h2" id="proc-title">{{ $c->title('process_title') }}</h2>
    </div>
    <img class="rv" src="{{ $c->image('process_image') }}" alt="{{ $c->text('process_image_alt') }}" width="1634" height="826" loading="lazy" style="display:block;width:100%;max-width:760px;margin:0 auto 40px;border-radius:24px">
    <ol class="steps-path anim" data-stagger><li class="step-c"><span class="dot">{{ $c->text('step_1_number') }}</span><h3>{{ $c->text('step_1_title') }}</h3><p>{{ $c->text('step_1_text') }}</p></li><li class="step-c"><span class="dot">{{ $c->text('step_2_number') }}</span><h3>{{ $c->text('step_2_title') }}</h3><p>{{ $c->text('step_2_text') }}</p></li><li class="step-c"><span class="dot">{{ $c->text('step_3_number') }}</span><h3>{{ $c->text('step_3_title') }}</h3><p>{{ $c->text('step_3_text') }}</p></li><li class="step-c"><span class="dot">{{ $c->text('step_4_number') }}</span><h3>{{ $c->text('step_4_title') }}</h3><p>{{ $c->text('step_4_text') }}</p></li><li class="step-c"><span class="dot">{{ $c->text('step_5_number') }}</span><h3>{{ $c->text('step_5_title') }}</h3><p>{{ $c->text('step_5_text') }}</p></li></ol>
  </div>
</section>

<style>
  #eligibility .stage { display: block; }
  .el-head { width: 100%; text-align: center; max-width: 720px; margin: 0 auto clamp(32px, 5vw, 56px); }
  .el-wrap { width: 100%; }
  .el-head .kicker { display: inline-block; }
  .el-wrap { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: clamp(24px, 5vw, 72px); align-items: center; }
  .el-art { margin: 0; display: flex; justify-content: center; }
  .el-art img { width: 100%; max-width: 420px; height: auto; border-radius: 24px; }
  .el-wrap .el-card { background: #fff; border-radius: 24px; padding: clamp(24px, 4vw, 40px); box-shadow: 0 12px 32px rgba(18, 38, 63, .08); border-left: 6px solid #f26a21; }
  .el-wrap .el-card p { margin: 0; text-align: left; }
  @@media (max-width: 820px) {
    .el-wrap { grid-template-columns: minmax(0, 1fr); }
    .el-art img { max-width: 320px; }
  }
</style>
<section class="sec" id="eligibility" aria-labelledby="el-title">
  <div class="stage">
    <header class="el-head rv">
      <span class="kicker">{{ $c->text('eligibility_kicker') }}</span>
      <h2 class="h2" id="el-title">{{ $c->title('eligibility_title') }}</h2>
    </header>
    <div class="el-wrap">
      <figure class="el-art rv">
        <img src="{{ $c->image('eligibility_image') }}" alt="{{ $c->text('eligibility_image_alt') }}" width="524" height="640" loading="lazy" style="aspect-ratio:524/430;object-fit:cover;object-position:50% 50%;height:auto">
      </figure>
      <div class="el-card rv">
        <p class="copy-18">{{ $c->text('eligibility_text') }}</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== Preprimary (section-specific styles; pp- prefix) ===== -->
<style>
.pp-sec .stage{display:block}.pp-head{width:100%;text-align:center;max-width:720px;margin:0 auto clamp(32px,5vw,56px)}.pp-head .kicker{display:inline-block}.pp-wrap{width:100%;display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,.95fr);align-items:center;gap:clamp(40px,5vw,80px)}.pp-copy{min-width:0}.pp-copy .pp-intro{margin:0;max-width:600px;color:var(--ink)}.pp-list{list-style:none;margin:28px 0 0;padding:0;display:grid;gap:16px}.pp-list li{display:flex;align-items:flex-start;gap:14px}.pp-ic{flex:none;display:grid;place-items:center;width:44px;height:44px;border-radius:14px;background:#fff;color:var(--orange);box-shadow:0 8px 20px rgba(14,42,71,.08)}.pp-ic svg{width:22px;height:22px}.pp-list h3{margin:0;font-family:var(--sans);font-weight:700;font-size:17px;line-height:1.35;color:var(--navy)}.pp-list p{margin:3px 0 0;font-size:15.5px;line-height:1.55;color:var(--ink)}.pp-copy .btn-row{margin-top:32px}.pp-art{position:relative;margin:0;justify-self:end;width:100%;max-width:600px;background:transparent}.pp-art img{display:block;width:100%;max-width:100%;height:auto;aspect-ratio:auto;object-fit:contain;background:transparent;border:0;border-radius:0;box-shadow:none;filter:drop-shadow(0 16px 24px rgba(14,42,71,.12))}@@media (max-width:1199.98px){.pp-wrap{grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:clamp(28px,4vw,48px)}.pp-list{gap:14px}.pp-list h3{font-size:16px}.pp-list p{font-size:15px}}@@media (max-width:767.98px){.pp-wrap{grid-template-columns:minmax(0,1fr);gap:44px}.pp-art{justify-self:center;max-width:560px}}
</style>
<section class="sec bg-peach pp-sec" id="preprimary" aria-labelledby="pp-title">
  <div class="stage">
    <header class="pp-head rv">
      <span class="kicker">{{ $c->text('preprimary_kicker') }}</span>
      <h2 class="h2" id="pp-title">{{ $c->title('preprimary_title') }}</h2>
    </header>
    <div class="pp-wrap">
      <div class="pp-copy rv">
        <p class="copy-18 pp-intro">{{ $c->text('preprimary_text') }}</p>
        <ul class="pp-list">
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-bulb"/></svg></span><div><h3>{{ $c->text('preprimary_item_1_title') }}</h3><p>{{ $c->text('preprimary_item_1_text') }}</p></div></li>
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-book"/></svg></span><div><h3>{{ $c->text('preprimary_item_2_title') }}</h3><p>{{ $c->text('preprimary_item_2_text') }}</p></div></li>
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-people"/></svg></span><div><h3>{{ $c->text('preprimary_item_3_title') }}</h3><p>{{ $c->text('preprimary_item_3_text') }}</p></div></li>
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-star"/></svg></span><div><h3>{{ $c->text('preprimary_item_4_title') }}</h3><p>{{ $c->text('preprimary_item_4_text') }}</p></div></li>
        </ul>
        <div class="btn-row">
          <a class="btn btn-apply" href="https://ananyatots.org/" target="_blank" rel="noopener">{{ $c->text('preprimary_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        </div>
      </div>
      <figure class="pp-art rv">
        <img src="{{ $c->image('preprimary_image') }}" alt="{{ $c->text('preprimary_image_alt') }}" width="1178" height="784" loading="lazy">
      </figure>
    </div>
  </div>
</section>

{{-- Fees section commented out for now
<section class="sec bg-sky" id="fees" aria-labelledby="fee-title" hidden>
  <div class="stage">
    <div class="fee-card rv" data-rv="zoom">
      <div class="fee-copy">
        <span class="kicker">{{ $c->text('fees_kicker') }}</span>
        <h2 class="h2" id="fee-title">{{ $c->title('fees_title') }}</h2>
        <p class="copy-18">{{ $c->text('fees_text') }}</p>
        <p class="copy-18" style="font-size:15px;color:#6a737c"><b>{{ $c->text('fees_note_label') }}</b> {{ $c->text('fees_note_text') }}</p>
        <div class="btn-row">
          <button class="btn btn-primary" type="button" disabled aria-describedby="fee-pdf-note" style="opacity:.55;cursor:not-allowed">{{ $c->text('fees_download_button') }}</button>
          <button class="btn btn-outline" type="button" data-enquire data-source="fees" data-title="Ask About Fees" data-text="Tell us which class you are interested in and our admissions team will share the full fee schedule.">{{ $c->text('fees_ask_button') }}</button>
        </div>
        <p id="fee-pdf-note" class="form-note" style="color:#8a5a00">{{ $c->text('fees_pdf_note') }}</p>
      </div>
      <ul class="fee-list" data-stagger>
        <li>{{ $c->text('fees_item_1') }}</li><li>{{ $c->text('fees_item_2') }}</li><li>{{ $c->text('fees_item_3') }}</li><li>{{ $c->text('fees_item_4') }}</li><li>{{ $c->text('fees_item_5') }}</li><li>{{ $c->text('fees_item_6') }}</li>
      </ul>
    </div>
  </div>
</section>
--}}

@if ($faqs->isNotEmpty())
<section class="sec faq" id="faq" aria-labelledby="faq-title">
  <div class="stage">
    <h2 class="h2 rv" id="faq-title">{{ $c->title('faq_title') }}</h2>
    <div class="faq-list" data-stagger>
      @foreach ($faqs as $faq)
      <details @if ($loop->first) open @endif><summary>{{ $faq->question }} <i aria-hidden="true"></i></summary><div class="ans">{!! $faq->answer !!}</div></details>
      @endforeach
    </div>
  </div>
</section>
@endif

<section class="sec paper" aria-label="Enquiry and campus visit forms">
  <div class="stage forms-2">
    <div class="form-panel rv" data-rv="left" id="enquire">
      <span class="kicker">{{ $c->text('enquire_kicker') }}</span>
      <h3>{{ $c->text('enquire_title') }}</h3>
      <p>{{ $c->text('enquire_text') }}</p>
      <form class="js-form" action="{{ route('inquiries.store', 'enquire') }}" method="POST" data-thanks="Thank you. Our admissions team will call you within one working day." novalidate>
        <input type="hidden" name="source" value="admissions">
        <div class="f-grid">
          <label class="fl"><span>Parent’s Name*</span><input class="field" id="e-parent" name="parent" required autocomplete="name"></label>
          <label class="fl"><span>Mobile Number*</span><input class="field" id="e-mobile" name="mobile" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}"></label>
          <label class="fl"><span>Email*</span><input class="field" id="e-email" name="email" type="email" required autocomplete="email"></label>
          <label class="fl"><span>Child’s Name*</span><input class="field" id="e-child" name="child" required></label>
          <label class="fl"><span>Class Applying For*</span><select class="field" id="e-class" name="class" required><option value="" disabled selected hidden>Select a class</option><option>Class 1</option><option>Class 2</option><option>Class 3</option><option>Class 4</option><option>Class 5</option><option>Class 6</option><option>Class 7</option><option>Class 8</option></select></label>
          <label class="fl"><span>Current School (if any)</span><input class="field" id="e-school" name="current_school"></label>
          <label class="fl full"><span>Message (optional)</span><textarea class="field" id="e-msg" name="message"></textarea></label>
        </div>
        <button class="btn btn-apply" type="submit">{{ $c->text('enquire_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
    <div class="form-panel rv" data-rv="right" id="visit">
      <span class="kicker">{{ $c->text('visit_kicker') }}</span>
      <h3>{{ $c->text('visit_title') }}</h3>
      <p>{{ $c->text('visit_text') }}</p>
      <form class="js-form" action="{{ route('inquiries.store', 'visit') }}" method="POST" data-thanks="Thank you. We will confirm your campus visit shortly." novalidate>
        <div class="f-grid">
          <label class="fl"><span>Parent’s Name*</span><input class="field" id="v-parent" name="parent" required autocomplete="name"></label>
          <label class="fl"><span>Mobile Number*</span><input class="field" id="v-mobile" name="mobile" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}"></label>
          <label class="fl full"><span>Email*</span><input class="field" id="v-email" name="email" type="email" required autocomplete="email"></label>
          <label class="fl"><span>Preferred Date and Time*</span><input class="field" id="v-date" name="datetime" type="datetime-local" required></label>
          <label class="fl"><span>Number of Visitors*</span><input class="field" id="v-count" name="visitors" type="number" min="1" max="8" value="2" required></label>
          <label class="fl full"><span>Child’s Class*</span><select class="field" id="v-class" name="class" required><option value="" disabled selected hidden>Select a class</option><option>Class 1</option><option>Class 2</option><option>Class 3</option><option>Class 4</option><option>Class 5</option><option>Class 6</option><option>Class 7</option><option>Class 8</option></select></label>
        </div>
        <button class="btn btn-primary" type="submit">{{ $c->text('visit_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
  </div>
</section>
@endsection