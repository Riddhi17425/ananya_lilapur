@extends('front.layouts.app')

@section('title', 'About Us · Ananya International School, Lilapur')
@section('description', 'Our legacy, vision, mission, values and the people behind Ananya International School, Lilapur.')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-about" aria-labelledby="about-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">About Us</span></nav>
      <h1 class="h1x word-pop" id="about-title" style="--d:1">About Ananya <span class="accent">International School</span></h1>
      <p class="copy-18" style="--d:2">Ananya International School, Lilapur is a CBSE school that believes childhood deserves curiosity, courage and care. From a child’s very first day at Play School to the farewell at Class 8, we walk beside every learner and every family.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="{{ route('admissions') }}#enquire">Apply for Admission <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="{{ route('admissions') }}#visit">Book a Campus Visit</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ asset('frontend/assets/about-hero-new.webp') }}" alt="Three Ananya students smiling as they look at a terrarium together in the classroom" width="813" height="460" fetchpriority="high"></div>
  </div>
</section>

<section class="sec" id="legacy" aria-labelledby="legacy-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><img src="{{ asset('frontend/assets/about-potential.png') }}" alt="A teacher exploring a globe with four young students" width="518" height="479" loading="lazy"></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">Our Legacy</span>
      <h2 class="h2" id="legacy-title">A Journey of Learning. <span class="accent">A Legacy of Growth.</span></h2>
      <p class="copy-18">Ananya’s story began with Dr. Geetaben Patel’s commitment to children and education. Today, the next generation carries that care forward, bringing fresh possibilities while staying close to the values that shaped us.</p>
      <p class="copy-18">We see legacy not simply as something to preserve, but as wisdom to build upon. What generations have taught us gives us perspective; what the future asks of us calls for fresh thinking. At Ananya, these two ideas come together in the way we approach learning, relationships and the growth of every child.</p>
    </div>
  </div>
  <img class="deco plane-d float" src="{{ asset('frontend/assets/potential-plane.png') }}" alt="" width="183" height="165" loading="lazy" style="position:absolute;right:6%;top:40px;width:150px">
</section>

<section class="foundations-v2 sec bg-sky" id="vision" aria-labelledby="vision-title">
  <img class="deco tree-l par" data-speed="-.05" src="{{ asset('frontend/assets/tree-left.png') }}" alt="" width="327" height="846" loading="lazy">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker">Vision, Mission &amp; Values</span>
      <h2 class="h2" id="vision-title">What We Stand <span class="accent">For</span></h2>
    </div>
    <div class="vm2">
      <article class="vm-card vm-vision rv" data-rv="left">
        <img src="{{ asset('frontend/assets/vision-photo.png') }}" alt="A smiling girl looking up at the sky" width="490" height="350" loading="lazy">
        <h3><img src="{{ asset('frontend/assets/vision-icon.png') }}" alt="" width="52" height="53" loading="lazy">Our Vision</h3>
        <p class="vision-q">To nurture curious, capable and caring young people who keep growing beyond what they are today.</p>
        <p class="vision-q">We want every child to be known by name, encouraged to ask questions and supported to become a confident, responsible member of their family, their community and the wider world.</p>
      </article>
      <div class="vm-center">
        <img class="vm-medal spin-hover rv" data-rv="zoom" src="{{ asset('frontend/assets/medallion.png') }}" alt="Ananya International School, Lilapur emblem" width="242" height="228" loading="lazy">
      </div>
      <article class="vm-card vm-mission rv" data-rv="right">
        <img src="{{ asset('frontend/assets/mission-photo.png') }}" alt="Two children studying a seedling through a magnifying glass" width="513" height="350" loading="lazy">
        <h3><img src="{{ asset('frontend/assets/mission-icon.png') }}" alt="" width="51" height="53" loading="lazy">Our Mission</h3>
        <ul class="ticks vm-mission-list">
          <li>To make learning purposeful by connecting concepts to real experiences</li>
          <li>To welcome questions and help children think, investigate and reason</li>
          <li>To give every child thoughtful attention, whatever their abilities, interests and ways of learning</li>
          <li>To build character and 21st-century skills alongside academic learning</li>
          <li>To grow together with families as partners in every child’s journey</li>
        </ul>
      </article>
    </div>
    <h3 class="sub-h rv">Our Core Values</h3>
    <ul class="values-5" data-stagger>
      <li><img src="{{ asset('frontend/assets/core-value-care.png') }}" alt="" width="110" height="110" loading="lazy"><h4>The Child Comes First</h4></li>
      <li><img src="{{ asset('frontend/assets/core-value-curiosity.png') }}" alt="" width="110" height="110" loading="lazy"><h4>Education with Purpose</h4></li>
      <li><img src="{{ asset('frontend/assets/core-value-character.png') }}" alt="" width="110" height="110" loading="lazy"><h4>Integrity in Every Action</h4></li>
      <li><img src="{{ asset('frontend/assets/core-value-courage.png') }}" alt="" width="110" height="110" loading="lazy"><h4>Learning Beyond the Classroom</h4></li>
      <li><img src="{{ asset('frontend/assets/core-value-collaboration.png') }}" alt="" width="110" height="110" loading="lazy"><h4>Growing Together</h4></li>
    </ul>
  </div>
  <svg class="wave" viewBox="0 0 1440 112" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:90px"><path d="M0 40C200 6 420 4 700 34s540 50 740 8v70H0Z" fill="#fbf8f1"/></svg>
</section>

<section class="sec" id="why" aria-labelledby="whyana-title" style="overflow:hidden">
  <img class="deco story-blob" src="{{ asset('frontend/assets/story-blob.png') }}" alt="" width="350" height="337" loading="lazy">
  <img class="deco story-leaf" src="{{ asset('frontend/assets/story-leaf.png') }}" alt="" width="288" height="255" loading="lazy">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ asset('frontend/assets/mascot/tiger-proud.webp') }}" alt="" width="421" height="760" loading="lazy"><p class="bubble">Every child is <b>born curious</b>!</p></div>
      <span class="kicker">Our Educational Philosophy</span>
      <h2 class="h2" id="whyana-title">Why <span class="accent">Ananya?</span></h2>
      <p class="copy-18">Parents have many good school options. Here is what makes Ananya different:</p>
    </div>
    <ol class="cards" data-stagger style="list-style:none">
      <li class="icard t-blue tilt-hover"><span class="num">01</span><span class="ic"><img src="{{ asset('frontend/assets/why-approach-01.png') }}" alt="" width="64" height="64" loading="lazy"></span><h3>Learning with purpose.</h3><p>Children connect concepts to experiences and discover how knowledge can be used.</p></li>
      <li class="icard t-peach tilt-hover"><span class="num">02</span><span class="ic"><img src="{{ asset('frontend/assets/why-approach-02.png') }}" alt="" width="64" height="64" loading="lazy"></span><h3>Questions are welcome.</h3><p>We encourage children to think, investigate and look for reasons rather than simply accept information.</p></li>
      <li class="icard t-green tilt-hover"><span class="num">03</span><span class="ic"><img src="{{ asset('frontend/assets/why-approach-03.png') }}" alt="" width="64" height="64" loading="lazy"></span><h3>Every child matters.</h3><p>Different abilities, interests and ways of learning deserve thoughtful attention.</p></li>
      <li class="icard t-pink tilt-hover"><span class="num">04</span><span class="ic"><img src="{{ asset('frontend/assets/why-approach-04.png') }}" alt="" width="64" height="64" loading="lazy"></span><h3>Action-driven character development.</h3><p>Respect, empathy, responsibility and integrity are developed through everyday choices and interactions.</p></li>
      <li class="icard t-yellow tilt-hover"><span class="num">05</span><span class="ic"><img src="{{ asset('frontend/assets/why-approach-05.png') }}" alt="" width="64" height="64" loading="lazy"></span><h3>Developing change makers.</h3><p>We nurture 21st-century skills alongside academic learning.</p></li>
      <li class="icard t-mint tilt-hover"><span class="num">06</span><span class="ic"><img src="{{ asset('frontend/assets/why-approach-06.png') }}" alt="" width="64" height="64" loading="lazy"></span><h3>Leadership you can meet.</h3><p>The Director and academic team are accessible to families.</p></li>
    </ol>
    <div class="quote-band rv" data-rv="zoom" style="margin-top:80px">
      <blockquote>We do not believe in a single measure of success. A child who loves science, one who dances, one who leads and one who quietly helps others are all successful. Our job is to help each of them find their peak.</blockquote>
      <cite>Our philosophy</cite>
    </div>
  </div>
</section>

<section class="sec bg-peach" id="people" aria-labelledby="people-title" hidden>
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker">People @@Ananya</span>
      <h2 class="h2" id="people-title">The People Behind <span class="accent">Ananya</span></h2>
    </div>
    <div class="msplit director rv">
      <div class="media"><div class="person"><div class="ph-slot" style="aspect-ratio:1"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div></div></div>
      <div class="copy">
        <span class="kicker">Director’s Message</span>
        <h3 class="h2" style="font-size:clamp(30px,3vw,44px)">Dr. Anil Verma</h3>
        <p class="copy-18" style="font-style:italic;color:#5a6470">“We are building a school where children are known by name, challenged with care and celebrated for who they are. Come and see for yourself.”</p>
      </div>
    </div>
    <div class="cards" data-stagger style="margin-top:70px">
      <article class="person"><div class="ph-slot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div><div class="body"><span class="role">Principal / Academic Head</span><h3>[Name]</h3><p>[Qualification, 80-word profile and photo]</p></div></article>
      <article class="person"><div class="ph-slot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div><div class="body"><span class="role">Leadership Team</span><h3>[Name]</h3><p>[Role, photo, one-line profile]</p></div></article>
      <article class="person"><div class="ph-slot"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></div><div class="body"><span class="role">Leadership Team</span><h3>[Name]</h3><p>[Role, photo, one-line profile]</p></div></article>
    </div>
    <div class="msplit rev" style="margin-top:90px">
      <div class="media rv" data-rv="right"><img src="{{ asset('frontend/assets/t-2012.png') }}" alt="A teacher guiding students through a science project" width="209" height="209" loading="lazy" style="border-radius:50%;max-width:420px;margin:0 auto;display:block"></div>
      <div class="copy rv" data-rv="left">
        <span class="kicker">Our Teachers</span>
        <h3 class="h2" style="font-size:clamp(32px,3.4vw,50px)">Warm, Qualified and <span class="accent">Always Learning</span></h3>
        <p class="copy-18">Our teachers are selected for subject knowledge, warmth and a genuine love for working with children. They receive ongoing training in QUEST pedagogy, child psychology and classroom technology. </p>
        <a class="btn btn-primary btn-sm" href="{{ route('careers') }}">Join Our Team <svg class="arrow"><use href="#i-arrow"/></svg></a>
      </div>
    </div>
  </div>
</section>
@endsection
