@extends('front.layouts.app')

@section('title', 'Careers · Ananya International School, Lilapur')
@section('description', 'Join the founding team at Ananya International School, Lilapur.')

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
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">Careers</span></nav>
      <h1 class="h1x word-pop" id="car-title" style="--d:1">Help Us Build <span class="accent">Something Special</span></h1>
      <p class="copy-18" style="--d:2">Ananya is a new school with big ambitions, and we are looking for educators and professionals who care about children and want to grow with us. If you want to be part of a school from its very first year, you are in the right place.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="#openings">See Current Openings <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#apply">Apply Today</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ asset('frontend/assets/careers/44.webp') }}" alt="A teacher with young students at a classroom table, with bright windows and shelves behind" width="1249" height="751" fetchpriority="high"></div>
  </div>
</section>

<section class="sec cr cr-intro" aria-labelledby="cr-intro-title">
  <img class="deco cr-plane" src="{{ asset('frontend/assets/plane-dash-transparent.png') }}" alt="" width="193" height="163" loading="lazy">
  <div class="stage cr-split">
    <div class="cr-text rv" data-rv="left">
      <span class="kicker">Careers</span>
      <h2 class="h2" id="cr-intro-title">Build a future in education. <span class="accent">Make a difference every day.</span></h2>
      <p class="copy-18">At Ananya, we believe the quality of a child’s learning experience is shaped by the people who guide it. We welcome educators and professionals who bring curiosity, care, commitment and a willingness to grow: people who see education not as the delivery of a syllabus, but as the thoughtful work of helping young minds develop. If you believe in creating meaningful learning experiences and contributing to a school that continues to evolve, we would like to hear from you.</p>
    </div>
    <figure class="cr-photo rv" data-rv="right">
      <img src="{{ asset('frontend/assets/careers/45.webp') }}" alt="Ananya educators and staff meeting together in the school" width="1249" height="751" loading="lazy">
    </figure>
  </div>
</section>

<section class="sec bg-peach cr" aria-labelledby="cr-work-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><div class="arch-img" style="border:none;aspect-ratio:auto"><img src="{{ asset('frontend/assets/careers/43.webp') }}" style="transform:none;transition:none;height:auto" alt="Students and a parent building with wooden blocks together during a classroom activity" width="1249" height="799" loading="lazy"></div></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">Working at Ananya</span>
      <h2 class="h2" id="cr-work-title">A shared purpose. <span class="accent">Many ways to make a difference.</span></h2>
      <p class="copy-18">Working at Ananya means contributing to a learning community where academic growth, relationships, responsibility and new ideas matter. Every role, whether in teaching, leadership or school operations, contributes to the experience we create for children and families.</p>
    </div>
  </div>
</section>

<section class="sec cr" aria-labelledby="cult-title">
  <div class="stage cr-center rv">
    <span class="kicker">Our Work Culture</span>
    <h2 class="h2" id="cult-title">A school takes shape through <span class="accent">the people who care for its children.</span></h2>
    <p class="copy-18">We are looking for thoughtful educators and committed professionals who share our belief in meaningful learning and growing together.</p>
  </div>
</section>

<section class="sec bg-sky cr" aria-labelledby="cr-grow-title">
  <div class="stage msplit rev">
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ asset('frontend/assets/careers/42.webp') }}" alt="Ananya staff members in discussion at a table in a bright room" width="1319" height="959" loading="lazy"></div>
    <div class="copy rv" data-rv="left">
      <span class="kicker">Professional Growth &amp; Development</span>
      <h2 class="h2" id="cr-grow-title">Stay curious, <span class="accent">keep learning.</span></h2>
      <p class="copy-18">At Ananya, educators are encouraged to stay curious, reflect on their practice and keep learning. Our teachers are trained and certified in QUEST pedagogy through capacity building, classroom implementation, observation and feedback, and continuous improvement.</p>
    </div>
  </div>
</section>

<section class="sec cr" id="openings" aria-labelledby="open-title">
  <div class="stage">
    <div class="sec-head cr-head rv">
      <div class="tiger-pal" data-side="left" aria-hidden="true"><img src="{{ asset('frontend/assets/mascot/tiger-point.webp') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">We’re <b>hiring</b>!</p></div>
      <span class="kicker">Current Openings</span>
      <h2 class="h2" id="open-title">Find your place <span class="accent">at Ananya.</span></h2>
      <p class="copy-18">Explore current opportunities across teaching, academic leadership, administration and school support. Each opening will list the role, required qualifications, experience and application details.</p>
    </div>
    <h3 class="cr-sub rv">Open positions</h3>
    <ul class="role-grid" data-stagger>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">01</span>
            <h4>Administrative Head</h4>
            <button class="apply-btn" type="button" data-position="Administrative Head">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">02</span>
            <h4>Administrative Clerk</h4>
            <button class="apply-btn" type="button" data-position="Administrative Clerk">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">03</span>
            <h4>Pre-primary &amp; Early Years Teachers</h4>
            <button class="apply-btn" type="button" data-position="Pre-primary & Early Years Teachers">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">04</span>
            <h4>Middle School Teachers</h4>
            <button class="apply-btn" type="button" data-position="Middle School Teachers">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">05</span>
            <h4>Language Teachers</h4>
            <button class="apply-btn" type="button" data-position="Language Teachers">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">06</span>
            <h4>French Educator</h4>
            <button class="apply-btn" type="button" data-position="French Educator">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">07</span>
            <h4>STEM Educator</h4>
            <button class="apply-btn" type="button" data-position="STEM Educator">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">08</span>
            <h4>AI Educator</h4>
            <button class="apply-btn" type="button" data-position="AI Educator">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">09</span>
            <h4>Career Counsellor</h4>
            <button class="apply-btn" type="button" data-position="Career Counsellor">Apply Now</button>
          </li>
          <li class="role-card rv">
            <span class="role-no" aria-hidden="true">10</span>
            <h4>IT Executive</h4>
            <button class="apply-btn" type="button" data-position="IT Executive">Apply Now</button>
          </li>
    </ul>
    <p class="copy-18 rv cr-note">Don’t see a suitable role? Send us your CV at <a href="mailto:admissions@ananyalilapur.org">admissions@ananyalilapur.org</a> and we will keep it on file.</p>
  </div>
</section>

<section class="sec bg-sky cr" id="apply" aria-labelledby="apply-title">
  <div class="stage msplit">
    <div class="copy rv" data-rv="left">
      <span class="kicker">Apply for a Position</span>
      <h2 class="h2" id="apply-title">Tell us what you can <span class="accent">bring to Ananya.</span></h2>
      <p class="copy-18">If you share our commitment to meaningful education and the growth of every child, we invite you to introduce yourself. Please share your résumé and details of the role you are interested in.</p>
    </div>
    <div class="form-panel rv" data-rv="right">
      <form class="js-form" data-thanks="Thank you for applying. Our team will review your application and get in touch." novalidate style="margin-top:0">
        <div class="f-grid">
          <label class="fl"><span>Full Name*</span><input class="field" id="cv-name" name="name" required autocomplete="name"></label>
          <label class="fl"><span>Email Address*</span><input class="field" id="cv-email" name="email" type="email" required autocomplete="email"></label>
          <label class="fl"><span>Contact Number*</span><input class="field" id="cv-mobile" name="mobile" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}"></label>
          <label class="fl"><span>Area of Interest*</span><select class="field" id="cv-position" name="area" required><option value="" disabled selected hidden>Select an area</option><option>Administrative Head</option><option>Administrative Clerk</option><option>Pre-primary & Early Years Teachers</option><option>Middle School Teachers</option><option>Language Teachers</option><option>French Educator</option><option>STEM Educator</option><option>AI Educator</option><option>Career Counsellor</option><option>IT Executive</option><option>Other</option></select></label>
          <label class="fl"><span>Years of Experience*</span><input class="field" id="cv-exp" name="experience" required placeholder="e.g. 4 years"></label>
          <label class="fl"><span>Upload Résumé*</span><input class="field" id="cv-file" name="cv" type="file" accept=".pdf,.doc,.docx" required></label>
        </div>
        <button class="btn btn-apply" type="submit">Submit Application <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
  </div>
</section>
@endsection
