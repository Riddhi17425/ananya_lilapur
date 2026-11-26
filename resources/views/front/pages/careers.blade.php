@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@push('styles')
<style>
/* Careers hero: same placement as the campus hero so the photo sits level with the copy and closes the gap */
.ph-careers .ph-art{top:40px;width:600px}
</style>
@endpush

@section('content')
<section class="ph ph-careers" aria-labelledby="car-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <h1 class="h1x word-pop" id="car-title" style="--d:1">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="#openings">{{ $c->text('hero_button_1') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#apply">{{ $c->text('hero_button_2') }}</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ $c->image('hero_image') }}" alt="{{ $c->attr('hero_image_alt') }}" width="1249" height="751" fetchpriority="high"></div>
  </div>
</section>

<section class="sec cr cr-intro" aria-labelledby="cr-intro-title">
  <img class="deco cr-plane" src="{{ $c->image('deco_plane_image') }}" alt="" width="193" height="163" loading="lazy">
  <div class="stage cr-split">
    <div class="cr-text rv" data-rv="left">
      <span class="kicker">{{ $c->text('intro_kicker') }}</span>
      <h2 class="h2" id="cr-intro-title">{{ $c->title('intro_title') }}</h2>
      <p class="copy-18">{{ $c->text('intro_text') }}</p>
    </div>
    <figure class="cr-photo rv" data-rv="right">
      <img src="{{ $c->image('intro_image') }}" alt="{{ $c->attr('intro_image_alt') }}" width="1249" height="751" loading="lazy">
    </figure>
  </div>
</section>

<section class="sec bg-peach cr" aria-labelledby="cr-work-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><div class="arch-img" style="border:none;aspect-ratio:auto"><img src="{{ $c->image('work_image') }}" style="transform:none;transition:none;height:auto" alt="{{ $c->attr('work_image_alt') }}" width="1249" height="799" loading="lazy"></div></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">{{ $c->text('work_kicker') }}</span>
      <h2 class="h2" id="cr-work-title">{{ $c->title('work_title') }}</h2>
      <p class="copy-18">{{ $c->text('work_text') }}</p>
    </div>
  </div>
</section>

<section class="sec cr" aria-labelledby="cult-title">
  <div class="stage cr-center rv">
    <span class="kicker">{{ $c->text('culture_kicker') }}</span>
    <h2 class="h2" id="cult-title">{{ $c->title('culture_title') }}</h2>
    <p class="copy-18">{{ $c->text('culture_text') }}</p>
  </div>
</section>

<section class="sec bg-sky cr" aria-labelledby="cr-grow-title">
  <div class="stage msplit rev">
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ $c->image('grow_image') }}" alt="{{ $c->attr('grow_image_alt') }}" width="1319" height="959" loading="lazy"></div>
    <div class="copy rv" data-rv="left">
      <span class="kicker">{{ $c->text('grow_kicker') }}</span>
      <h2 class="h2" id="cr-grow-title">{{ $c->title('grow_title') }}</h2>
      <p class="copy-18">{{ $c->text('grow_text') }}</p>
    </div>
  </div>
</section>

<section class="sec cr" id="openings" aria-labelledby="open-title">
  <div class="stage">
    <div class="sec-head cr-head rv">
      <div class="tiger-pal" data-side="left" aria-hidden="true"><img src="{{ $c->image('deco_tiger_image') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">{{ $c->text('openings_bubble_before') }} <b>{{ $c->text('openings_bubble_bold') }}</b>{{ $c->text('openings_bubble_after') }}</p></div>
      <span class="kicker">{{ $c->text('openings_kicker') }}</span>
      <h2 class="h2" id="open-title">{{ $c->title('openings_title') }}</h2>
      <p class="copy-18">{{ $c->text('openings_text') }}</p>
    </div>
    <h3 class="cr-sub rv">{{ $c->text('openings_subheading') }}</h3>
    <ul class="role-grid" data-stagger>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_1_no') }}</span>
            <h4>{{ $c->text('role_1_title') }}</h4>
            <button class="apply-btn" type="button" data-position="Administrative Head">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_2_no') }}</span>
            <h4>{{ $c->text('role_2_title') }}</h4>
            <button class="apply-btn" type="button" data-position="Administrative Clerk">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_3_no') }}</span>
            <h4>{{ $c->text('role_3_title') }}</h4>
            <button class="apply-btn" type="button" data-position="Pre-primary & Early Years Teachers">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_4_no') }}</span>
            <h4>{{ $c->text('role_4_title') }}</h4>
            <button class="apply-btn" type="button" data-position="Middle School Teachers">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_5_no') }}</span>
            <h4>{{ $c->text('role_5_title') }}</h4>
            <button class="apply-btn" type="button" data-position="Language Teachers">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_6_no') }}</span>
            <h4>{{ $c->text('role_6_title') }}</h4>
            <button class="apply-btn" type="button" data-position="French Educator">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_7_no') }}</span>
            <h4>{{ $c->text('role_7_title') }}</h4>
            <button class="apply-btn" type="button" data-position="STEM Educator">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_8_no') }}</span>
            <h4>{{ $c->text('role_8_title') }}</h4>
            <button class="apply-btn" type="button" data-position="AI Educator">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_9_no') }}</span>
            <h4>{{ $c->text('role_9_title') }}</h4>
            <button class="apply-btn" type="button" data-position="Career Counsellor">{{ $c->text('role_button') }}</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">{{ $c->text('role_10_no') }}</span>
            <h4>{{ $c->text('role_10_title') }}</h4>
            <button class="apply-btn" type="button" data-position="IT Executive">{{ $c->text('role_button') }}</button>
          </li>
    </ul>
    <p class="copy-18 rv cr-note">{{ $c->text('openings_note_before') }} <a href="mailto:admissions@ananyalilapur.org">{{ $c->text('openings_note_link') }}</a> {{ $c->text('openings_note_after') }}</p>
  </div>
</section>

<section class="sec bg-sky cr" id="apply" aria-labelledby="apply-title">
  <div class="stage msplit">
    <div class="copy rv" data-rv="left">
      <span class="kicker">{{ $c->text('apply_kicker') }}</span>
      <h2 class="h2" id="apply-title">{{ $c->title('apply_title') }}</h2>
      <p class="copy-18">{{ $c->text('apply_text') }}</p>
    </div>
    <div class="form-panel rv" data-rv="right">
      <form class="js-form" action="{{ route('inquiries.store', 'career') }}" method="POST" enctype="multipart/form-data" data-thanks="Thank you for applying. Our team will review your application and get in touch." novalidate style="margin-top:0">
        <div class="f-grid">
          <label class="fl"><span>Full Name*</span><input class="field" id="cv-name" name="name" required autocomplete="name"></label>
          <label class="fl"><span>Email Address*</span><input class="field" id="cv-email" name="email" type="email" required autocomplete="email"></label>
          <label class="fl"><span>Contact Number*</span><input class="field" id="cv-mobile" name="mobile" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}"></label>
          <label class="fl"><span>Area of Interest*</span><select class="field" id="cv-position" name="area" required><option value="" disabled selected hidden>Select an area</option><option>Administrative Head</option><option>Administrative Clerk</option><option>Pre-primary & Early Years Teachers</option><option>Middle School Teachers</option><option>Language Teachers</option><option>French Educator</option><option>STEM Educator</option><option>AI Educator</option><option>Career Counsellor</option><option>IT Executive</option><option>Other</option></select></label>
          <label class="fl"><span>Years of Experience*</span><input class="field" id="cv-exp" name="experience" required placeholder="e.g. 4 years"></label>
          <label class="fl"><span>Upload Résumé*</span><input class="field" id="cv-file" name="cv" type="file" accept=".pdf,.doc,.docx" required></label>
        </div>
        <button class="btn btn-apply" type="submit">{{ $c->text('apply_submit') }} <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
  </div>
</section>
@endsection
