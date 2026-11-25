@extends('layouts.app')

@section('title', 'Contact Us · Ananya International School, Lilapur')
@section('description', 'Contact details, location map and a general enquiry form for Ananya International School, Lilapur.')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-contact" aria-labelledby="contact-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">Contact Us</span></nav>
      <h1 class="h1x word-pop" id="contact-title" style="--d:1">We Would Love to <span class="accent">Hear From You</span></h1>
      <p class="copy-18" style="--d:2">Whether you have a question about admissions, transport or careers, our team is happy to help.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#enquiry">Send Us a Message <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#map">Find Us on Map</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ asset('frontend/assets/contact-hero.png') }}" alt="A smiling student with her school bag in front of the campus, with the words “We'd love to hear from you!”" width="786" height="540" fetchpriority="high"></div>
  </div>
</section>

<section class="sec tight" aria-labelledby="loc-title">
  <div class="stage">
    <div class="campus-card rv" data-rv="zoom">
      <span class="pin bob" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/></svg></span>
      <div>
        <span class="kicker">Campus Location</span>
        <h2 id="loc-title">Ananya International School, Lilapur Campus</h2>
        <p class="copy-18">Opp. Serene 53, Behind Sardar Dham, Lilapur, Ahmedabad-380060, Gujarat.</p>
        
      </div>
    </div>
    <h2 class="sr-only">Contact details</h2>
    <div class="dl-cards" data-stagger style="margin-top:30px">
      <div class="dl-card"><h3>Admissions</h3><p><a href="tel:+917990259272">+91 79902 59272</a><br><a href="mailto:admissions@ananyalilapur.org">admissions@ananyalilapur.org</a></p></div>
      <div class="dl-card"><h3>General Enquiries</h3><p><a href="tel:+917990259272">+91 79902 59272</a><br><a href="mailto:admissions@ananyalilapur.org">admissions@ananyalilapur.org</a></p></div>
      <div class="dl-card"><h3>Careers</h3><p><a href="mailto:admissions@ananyalilapur.org">admissions@ananyalilapur.org</a></p></div>
      <div class="dl-card"><h3>Office Hours</h3><p>Mon to Sat, 8:00 am to 4:00 pm</p></div>
    </div>
  </div>
</section>

<section class="message" aria-labelledby="msg-title">
  <img class="d d-tree" src="{{ asset('frontend/assets/contact-tree.png') }}" alt="" width="59" height="802" loading="lazy">
  <div class="stage">
    <div class="msg-panel">
      <div class="form-card" id="enquiry">
        <h2>Send Us a Message</h2>
        <form class="js-form" data-thanks="Thank you for reaching out. We will get back to you within one working day." novalidate>
          <label class="sr-only" for="g-name">Name</label><input class="field" id="g-name" name="name" placeholder="Name*" required autocomplete="name">
          <label class="sr-only" for="g-mobile">Mobile</label><input class="field" id="g-mobile" name="mobile" type="tel" placeholder="Mobile*" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}">
          <label class="sr-only" for="g-email">Email</label><input class="field" id="g-email" name="email" type="email" placeholder="Email*" required autocomplete="email">
          <label class="sr-only" for="g-subject">Subject</label>
          <select class="field" id="g-subject" name="subject" required><option value="" disabled selected hidden>Subject*</option><option>Admissions</option><option>Transport</option><option>Careers</option><option>Other</option></select>
          <label class="sr-only" for="g-msg">Message</label><textarea class="field" id="g-msg" name="message" placeholder="Message*" required></textarea>
          <button class="btn btn-primary" type="submit">Send Message <svg class="arrow"><use href="#i-arrow"/></svg></button>
          <p class="form-note" role="status" aria-live="polite"></p>
        </form>
      </div>
      <div class="msg-right" id="map">
        <div>
          <h2 class="h2" id="msg-title">Find Us <span class="accent">on the Map</span></h2>
          <p class="copy-18">Use the map to plan your visit to our Lilapur campus.</p>
        </div>
        <div class="tiger-pal contact-pal" data-side="right" aria-hidden="true"><img src="{{ asset('frontend/assets/mascot/tiger-hello.webp') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">We’d love to <b>hear from you</b>!</p></div>
        <a class="map-link" href="https://www.google.com/maps/search/?api=1&amp;query=Ananya+International+School+Opp+Serene+53+Behind+Sardar+Dham+Lilapur+Ahmedabad+380060" target="_blank" rel="noopener">
          <img src="{{ asset('frontend/assets/map-blob.png') }}" alt="Map of the area around the campus" width="706" height="444" loading="lazy">
          <span>Open in Google Maps ↗</span>
        </a>
        <p style="margin-top:18px"><a class="btn btn-apply" href="https://www.google.com/maps/dir/?api=1&amp;destination=Ananya+International+School+Opp+Serene+53+Behind+Sardar+Dham+Lilapur+Ahmedabad+380060" target="_blank" rel="noopener">Get Directions <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
      </div>
    </div>
  </div>
</section>
@endsection
