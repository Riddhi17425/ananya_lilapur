@extends('layouts.app')

@section('title', 'Beyond Academics · Ananya International School, Lilapur')
@section('description', 'Sports, performing and visual arts, clubs, life skills and student leadership at Ananya.')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-collage" aria-labelledby="ba-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">Beyond Academics</span></nav>
      <h1 class="h1x word-pop" id="ba-title" style="--d:1">Because Childhood Is Bigger Than <span class="accent">a Classroom</span></h1>
      <p class="copy-18" style="--d:2">At Ananya, activities are not extras. They are where children discover talent, build discipline, make friends and learn to lead. Every child gets time, space and coaching to explore.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#sports">Explore Activities <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="{{ route('admissions') }}#visit">Book a Campus Visit</a>
      </div>
    </div>
    <div class="collage intro-art" aria-hidden="true">
      <img class="c1 float" src="{{ asset('frontend/assets/beyond/hero/18.webp') }}" alt="" width="420" height="640">
      <img class="c2 float-2" src="{{ asset('frontend/assets/beyond/hero/17.webp') }}" alt="" width="464" height="295">
      <img class="c3 float" src="{{ asset('frontend/assets/beyond/hero/19.webp') }}" alt="" width="207" height="207">
      <img class="c4 float-2" src="{{ asset('frontend/assets/beyond/hero/16.webp') }}" alt="" width="613" height="361">
      <svg class="c5 spin-slow" viewBox="0 0 100 100"><circle cx="50" cy="50" r="46" fill="none" stroke="#ef6b2e" stroke-width="2" stroke-dasharray="3 7"/></svg>
      <img class="c6 bob" src="{{ asset('frontend/assets/acad-sun.png') }}" alt="" width="150" height="128">
    </div>
  </div>
</section>

<section class="sec" id="sports" aria-labelledby="sports-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><div class="arch-img" style="max-width:none;box-shadow:none;border:none"><img src="{{ asset('frontend/assets/beyond/sports-tennis.webp') }}" style="transform:none;transition:none;width:98%" alt="A student returning a shot on the lawn tennis court while a coach watches" width="1249" height="1327" loading="lazy"></div></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">Sports &amp; Physical Education</span>
      <h2 class="h2" id="sports-title">Play. Practise. <span class="accent">Perform.</span></h2>
      <p class="copy-18">Movement brings joy, confidence and a sense of belonging. Through active play, physical education and everyday care, we help children build healthy habits and feel good about themselves.</p>
      <h3 class="mini-h">Sports</h3>
      <ul class="chips"><li>Basketball</li><li>Skating</li><li>Pickleball</li><li>Cricket</li><li>Football</li><li>Swimming</li><li>Volleyball</li><li>Lawn Tennis</li><li>Archery</li><li>Shooting</li><li>Table Tennis</li><li>Squash</li></ul>
    </div>
  </div>
</section>

<section class="sec bg-peach" id="performing" aria-labelledby="perf-title">
  <img class="deco par" data-speed="-.08" src="{{ asset('frontend/assets/story-leaf.png') }}" alt="" width="288" height="255" loading="lazy" style="position:absolute;right:0;top:20px;width:220px">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker">Performing Arts</span>
      <h2 class="h2" id="perf-title">Find Your Voice and <span class="accent">Your Stage</span></h2>
      <p class="copy-18">Music, dance and drama help children express themselves, build confidence and learn to perform in front of others.</p>
    </div>
    <div class="cards c4" data-stagger>
      <article class="blobcard"><img class="bg" src="{{ asset('frontend/assets/subject-bg-3.png') }}" alt="" width="294" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-music"/></svg></span><h3>Music</h3><p>Vocal and instrumental music</p></article>
      <article class="blobcard"><img class="bg" src="{{ asset('frontend/assets/subject-bg-2.png') }}" alt="" width="284" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-dance"/></svg></span><h3>Dance</h3><p>Indian classical and contemporary dance</p></article>
      <article class="blobcard"><img class="bg" src="{{ asset('frontend/assets/subject-bg-4.png') }}" alt="" width="310" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-drama"/></svg></span><h3>Drama</h3><p>Drama, storytelling and theatre</p></article>
      <article class="blobcard"><img class="bg" src="{{ asset('frontend/assets/subject-bg-1.png') }}" alt="" width="298" height="240" loading="lazy"><span class="ic-lg"><svg class="i"><use href="#ic-party"/></svg></span><h3>On Stage</h3><p>Annual day, assemblies and cultural events</p></article>
    </div>
  </div>
</section>

<section class="sec" id="visual" aria-labelledby="visual-title">
  <div class="stage msplit rev">
    <div class="media rv" data-rv="right"><img class="soft-img" src="{{ asset('frontend/assets/beyond/visual-blob.webp') }}" alt="Students building a wooden bridge with blocks while referring to a design sketch" width="1249" height="799" loading="lazy" style="box-shadow:none;transform:none;transition:none"></div>
    <div class="copy rv" data-rv="left">
      <span class="kicker">Visual Arts</span>
      <h2 class="h2" id="visual-title">Imagine it. <span class="accent">Create it. See it differently.</span></h2>
      <p class="copy-18">Art gives children the freedom to explore ideas, experiment with materials and express their individual perspectives. Drawing, painting, craft and other creative experiences encourage observation, imagination, patience and original thinking. The process matters as much as the finished work: trying, revising and discovering new possibilities are all part of learning.</p>
    </div>
  </div>
</section>

<section class="sec bg-sky" id="clubs" aria-labelledby="clubs-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ asset('frontend/assets/mascot/tiger-hello.webp') }}" alt="" width="500" height="760" loading="lazy"><p class="bubble">Which club is <b>yours</b>?</p></div>
      <span class="kicker">Clubs &amp; Activities</span>
      <h2 class="h2" id="clubs-title">There is more than one way to <span class="accent">discover a passion.</span></h2>
      <p class="copy-18">Clubs and activities give students opportunities to explore interests beyond their regular subjects. From creative pursuits and reading to science, technology, environmental awareness and collaborative projects, students can discover what excites them, learn alongside others and develop skills through shared experiences.</p>
    </div>
    <ul class="club-cloud" data-stagger><li class="t-green"><svg class="i"><use href="#ic-speak"/></svg>Assembly Presentations</li><li class="t-blue"><svg class="i"><use href="#ic-star"/></svg>Interhouse Competitions</li><li class="t-peach"><svg class="i"><use href="#ic-people"/></svg>Clubs</li><li class="t-pink"><svg class="i"><use href="#ic-dance"/></svg>Dance</li><li class="t-mint"><svg class="i"><use href="#ic-music"/></svg>Music</li><li class="t-yellow"><svg class="i"><use href="#ic-chess"/></svg>Chess</li></ul>
  </div>
</section>

<section class="sec bg-navy" id="life-skills" aria-labelledby="ls-title" style="overflow:hidden">
  <div class="stage">
    <div class="sec-head rv">
      <span class="kicker" style="color:#ffb48a">Life Skills &amp; 21st-Century Skills</span>
      <h2 class="h2" id="ls-title">Capable minds. <span class="accent">Considerate choices. Responsible action.</span></h2>
      <p class="copy-18">The world asks children to do more than know the right answers. It asks them to think critically, communicate clearly, work with others and respond thoughtfully to unfamiliar situations. At Ananya, we aim to nurture these capabilities alongside values that guide how children use them.</p>
    </div>
    <ul class="skill-grid" data-stagger><li><span><svg class="i"><use href="#ic-puzzle"/></svg></span><p>Critical thinking</p></li><li><span><svg class="i"><use href="#ic-bulb"/></svg></span><p>Creativity</p></li><li><span><svg class="i"><use href="#ic-speak"/></svg></span><p>Communication</p></li><li><span><svg class="i"><use href="#ic-people"/></svg></span><p>Collaboration</p></li><li><span><svg class="i"><use href="#ic-phone"/></svg></span><p>Digital responsibility</p></li><li><span><svg class="i"><use href="#ic-heart"/></svg></span><p>Empathy</p></li><li><span><svg class="i"><use href="#ic-shield"/></svg></span><p>Integrity</p></li><li><span><svg class="i"><use href="#ic-star"/></svg></span><p>Resilience</p></li><li><span><svg class="i"><use href="#ic-cube"/></svg></span><p>Self-management</p></li><li><span><svg class="i"><use href="#ic-hands"/></svg></span><p>Social responsibility</p></li></ul>
  </div>
  <svg class="deco plane float" style="color:#fff;--pf:transparent;--pf2:transparent;position:absolute;right:5%;top:70px;width:150px" aria-hidden="true"><use href="#i-plane"/></svg>
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>

<section class="sec" id="leadership" aria-labelledby="lead-title">
  <div class="stage msplit">
    <div class="media rv" data-rv="left"><div class="arch-img" style="border-radius:0;max-width:92%;box-shadow:none"><img src="{{ asset('frontend/assets/beyond/leadership-books.webp') }}" alt="Three students at a campus table, one reviewing a clipboard while another arranges books" width="1269" height="1347" loading="lazy"></div></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">Student Leadership</span>
      <h2 class="h2" id="lead-title">Learning to Lead, <span class="accent">Learning to Serve</span></h2>
      <p class="copy-18">At Ananya, students are given real opportunities to speak, decide and lead. Our Student Council space is where student voices are heard, ideas are discussed and responsibility is shared, helping children grow into thoughtful, confident leaders.</p>
      <ul class="ticks"><li>Student council and house system</li><li>Class and club leadership roles</li><li>Community service and social-impact projects</li><li>Leadership workshops for middle-school students</li></ul>
      <a class="btn btn-apply" href="{{ route('admissions') }}#enquire">Apply for Admission <svg class="arrow"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>
@endsection
