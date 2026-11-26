@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-contact" aria-labelledby="contact-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">{{ $c->text('hero_crumb_home') }}</a><span>/</span><span aria-current="page">{{ $c->text('hero_crumb_current') }}</span></nav>
      <h1 class="h1x word-pop" id="contact-title" style="--d:1">{{ $c->title('hero_title') }}</h1>
      <p class="copy-18" style="--d:2">{{ $c->text('hero_text') }}</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#enquiry">{{ $c->text('hero_button_message') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#map">{{ $c->text('hero_button_map') }}</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ $c->image('hero_image') }}" alt="{{ $c->text('hero_image_alt') }}" width="786" height="540" fetchpriority="high"></div>
  </div>
</section>

<section class="sec tight" aria-labelledby="loc-title">
  <div class="stage">
    <div class="campus-card rv" data-rv="zoom">
      <span class="pin bob" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/></svg></span>
      <div>
        <span class="kicker">{{ $c->text('location_kicker') }}</span>
        <h2 id="loc-title">{{ $c->text('location_title') }}</h2>
        <p class="copy-18">{{ $c->text('location_address') }}</p>

      </div>
    </div>
    <h2 class="sr-only">{{ $c->text('details_sr_title') }}</h2>
    <div class="dl-cards" data-stagger style="margin-top:30px">
      <div class="dl-card"><h3>{{ $c->text('details_card_1_title') }}</h3><p><a href="tel:+917990259272">{{ $c->text('details_card_1_phone') }}</a><br><a href="mailto:admissions@ananyalilapur.org">{{ $c->text('details_card_1_email') }}</a></p></div>
      <div class="dl-card"><h3>{{ $c->text('details_card_2_title') }}</h3><p><a href="tel:+917990259272">{{ $c->text('details_card_2_phone') }}</a><br><a href="mailto:admissions@ananyalilapur.org">{{ $c->text('details_card_2_email') }}</a></p></div>
      <div class="dl-card"><h3>{{ $c->text('details_card_3_title') }}</h3><p><a href="mailto:admissions@ananyalilapur.org">{{ $c->text('details_card_3_email') }}</a></p></div>
      <div class="dl-card"><h3>{{ $c->text('details_card_4_title') }}</h3><p>{{ $c->text('details_card_4_text') }}</p></div>
    </div>
  </div>
</section>

<section class="message" aria-labelledby="msg-title">
  <img class="d d-tree" src="{{ $c->image('deco_tree_image') }}" alt="" width="59" height="802" loading="lazy">
  <div class="stage">
    <div class="msg-panel">
      <div class="form-card" id="enquiry">
        <h2>{{ $c->text('form_title') }}</h2>
        <form class="js-form" action="{{ route('inquiries.store', 'contact') }}" method="POST" data-thanks="Thank you for reaching out. We will get back to you within one working day." novalidate>
          <label class="sr-only" for="g-name">Name</label><input class="field" id="g-name" name="name" placeholder="Name*" required autocomplete="name">
          <label class="sr-only" for="g-mobile">Mobile</label><input class="field" id="g-mobile" name="mobile" type="tel" placeholder="Mobile*" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}">
          <label class="sr-only" for="g-email">Email</label><input class="field" id="g-email" name="email" type="email" placeholder="Email*" required autocomplete="email">
          <label class="sr-only" for="g-subject">Subject</label>
          <select class="field" id="g-subject" name="subject" required><option value="" disabled selected hidden>Subject*</option><option>Admissions</option><option>Transport</option><option>Careers</option><option>Other</option></select>
          <label class="sr-only" for="g-msg">Message</label><textarea class="field" id="g-msg" name="message" placeholder="Message*" required></textarea>
          <button class="btn btn-primary" type="submit">{{ $c->text('form_submit') }} <svg class="arrow"><use href="#i-arrow"/></svg></button>
          <p class="form-note" role="status" aria-live="polite"></p>
        </form>
      </div>
      <div class="msg-right" id="map">
        <div>
          <h2 class="h2" id="msg-title">{{ $c->title('map_title') }}</h2>
          <p class="copy-18">{{ $c->text('map_text') }}</p>
        </div>
        <div class="tiger-pal contact-pal" data-side="right" aria-hidden="true"><img src="{{ $c->image('deco_tiger_image') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">{{ $c->text('map_bubble_before') }}<b>{{ $c->text('map_bubble_bold') }}</b>{{ $c->text('map_bubble_after') }}</p></div>
        <a class="map-link" href="https://www.google.com/maps/search/?api=1&amp;query=Ananya+International+School+Opp+Serene+53+Behind+Sardar+Dham+Lilapur+Ahmedabad+380060" target="_blank" rel="noopener">
          <img src="{{ $c->image('map_image') }}" alt="{{ $c->text('map_image_alt') }}" width="706" height="444" loading="lazy">
          <span>{{ $c->text('map_link_label') }}</span>
        </a>
        <p style="margin-top:18px"><a class="btn btn-apply" href="https://www.google.com/maps/dir/?api=1&amp;destination=Ananya+International+School+Opp+Serene+53+Behind+Sardar+Dham+Lilapur+Ahmedabad+380060" target="_blank" rel="noopener">{{ $c->text('map_directions_label') }} <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
      </div>
    </div>
  </div>
</section>
@endsection
