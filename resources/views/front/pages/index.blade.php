@extends('front.layouts.app')

@section('title', 'Ananya International School, Lilapur')
@section('description', 'Ananya International School, Lilapur is a CBSE school for Play School to Class 8, where strong academics meet sports, arts and real-world skills. Admissions open for April 2027.')
@section('footer-ethos', 'Global Thinking. Indian Values. Future Ready Learners.')

@section('content')
<!-- HERO -->
<section class="hero paper" aria-labelledby="hero-title">
  <div class="container hero-inner">
    <div class="hero-copy intro">
      <p class="badge" style="--d:0"><b>Admissions open for 2027–28</b> CBSE · Grades 1 to 8 · Lilapur, Ahmedabad</p>
      <h1 id="hero-title" class="word-pop" style="--d:1;margin-top:22px">Growing Beyond <span class="accent">What We Are.</span></h1>
      <p class="lead" style="--d:2">At Ananya International School, Lilapur, we nurture young minds with a global outlook while staying rooted in strong Indian values. </p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="{{ route('admissions') }}#enquire">Apply for Admission <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="{{ route('admissions') }}#visit">Book a Campus Visit</a>
      </div>
      <ul class="hero-facts" style="--d:4">
        <li>CBSE<br>Curriculum</li>
        <li>Grades<br>1 to 8</li>
        <li>Lilapur,<br>Ahmedabad</li>
        <svg class="heart accent wiggle" viewBox="0 0 40 50" aria-hidden="true"><use href="#i-heart"/></svg>
      </ul>
    </div>
  </div>
  <img class="hero-art intro-art" src="{{ asset('frontend/assets/hero-collage-home.png') }}" alt="A smiling Ananya student surrounded by scenes of campus life: the entrance, library, science lab and corridors" width="768" height="786" fetchpriority="high">
  <button class="tiger-hero" type="button" aria-label="Say hello to Ananya’s tiger mascot"><span class="th-fig"><img class="th-body" src="{{ asset('frontend/assets/mascot/tiger-wave-body.webp') }}" alt="" width="498" height="760"><img class="th-paw" src="{{ asset('frontend/assets/mascot/tiger-wave-paw.webp') }}" alt="" width="144" height="220"></span><span class="bubble" aria-live="polite">Hi! Welcome to <b>Ananya</b></span></button>
  <a class="scroll-cue bob" href="#why"><svg aria-hidden="true"><use href="#i-down"/></svg><span>Scroll Down</span></a>
</section>

<!-- WHY PARENTS CHOOSE ANANYA -->
<section class="why" id="why" aria-labelledby="why-title">
  <img class="deco plane why-plane" src="{{ asset('frontend/assets/plane-dash-transparent.png') }}" alt="" width="193" height="163" loading="lazy">
  <div class="container">
    <div class="why-head rv">
      <h2 class="h2" id="why-title">Why Parents Choose <span class="accent">Ananya</span></h2>
      <p class="lead">Six reasons families choose us for the years that matter most.</p>
    </div>
    <div class="why-body">
      <ul class="why-list" data-stagger>
        <li class="why-item"><img src="{{ asset('frontend/assets/home-feature-01.png') }}" alt="" width="100" height="100" loading="lazy"><div><h3>CBSE curriculum, taught differently.</h3><p>The national framework, delivered through hands-on, inquiry-led learning.</p></div></li>
        <li class="why-item"><img src="{{ asset('frontend/assets/home-feature-02.png') }}" alt="" width="100" height="100" loading="lazy"><div><h3>Play School to Class 8 under one roof.</h3><p>One continuous journey, with no disruption between stages.</p></div></li>
        <li class="why-item"><img src="{{ asset('frontend/assets/home-feature-03.png') }}" alt="" width="100" height="100" loading="lazy"><div><h3>Sports beyond the ordinary.</h3><p>From squash and shooting to team games, children discover what they love.</p></div></li>
      </ul>
      <div class="why-arch rv" data-rv="zoom"><img src="{{ asset('frontend/assets/campus-arch-home.png') }}" alt="Students in the Ananya campus courtyard with the school building behind them" width="768" height="1156" loading="lazy"></div>
      <ul class="why-list" data-stagger>
        <li class="why-item"><img src="{{ asset('frontend/assets/home-feature-04.png') }}" alt="" width="100" height="100" loading="lazy"><div><h3>Safe, supervised and connected.</h3><p>Secure campus, trained staff and school transport built around parent peace of mind.</p></div></li>
        <li class="why-item"><img src="{{ asset('frontend/assets/home-feature-05.png') }}" alt="" width="100" height="100" loading="lazy"><div><h3>Caring, qualified teachers.</h3><p>Classes of 35 students in spacious classrooms (approx. 650 sq. ft.), with close attention and regular communication with parents.</p></div></li>
        <li class="why-item"><img src="{{ asset('frontend/assets/home-feature-06.png') }}" alt="" width="100" height="100" loading="lazy"><div><h3>Whole-child growth.</h3><p>Academics, arts, leadership and life skills are given equal importance.</p></div></li>
      </ul>
    </div>
  </div>
  <img class="deco tree" src="{{ asset('frontend/assets/tree-sketch.png') }}" alt="" width="164" height="108" loading="lazy">
  <svg class="wave" viewBox="0 0 1440 150" preserveAspectRatio="none" aria-hidden="true"><path d="M0 52C190 14 400 12 640 40s560 70 800 4V150H0Z" fill="#c3d7e9"/><path d="M0 100c280-36 600-40 900-12s400 20 540-6V150H0Z" fill="#fbf8f1"/></svg>
</section>

<!-- PHILOSOPHY -->
<section class="sec paper" id="philosophy" aria-labelledby="phil-title">
  <div class="container msplit">
    <div class="media rv" data-rv="left"><img src="{{ asset('frontend/assets/values-circle.png') }}" alt="A student resting her chin on her hand, surrounded by Ananya's values: Curiosity, Compassion, Courage and Character" width="520" height="522" loading="lazy"></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">Ananya’s Educational Philosophy</span>
      <h2 class="h2" id="phil-title">Education That Builds the <span class="accent">Whole Child</span></h2>
      <p class="copy-18">At Ananya, learning has a purpose. Children connect concepts to real experiences, questions are always welcome, and every child matters. Respect, empathy, responsibility and integrity grow through everyday choices, and 21st-century skills are nurtured alongside academic learning.</p>
      <a class="btn btn-primary btn-sm" href="{{ route('about') }}#why">Read Our Philosophy <svg class="arrow"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
  <svg class="deco heart-a accent float-2" viewBox="0 0 40 50" aria-hidden="true" style="position:absolute;right:8%;top:70px;width:34px"><use href="#i-heart"/></svg>
</section>

<!-- QUEST -->
<section class="sec bg-navy quest" id="quest" aria-labelledby="quest-title" style="overflow:hidden">
  <div class="container">
    <div class="sec-head rv">
      <span class="kicker" style="color:#ffb48a">QUEST Pedagogy</span>
      <h2 class="h2" id="quest-title">Meet QUEST, Our Way of <span class="accent">Teaching and Learning</span></h2>
      <div class="quest-word" aria-hidden="true" data-stagger><span>Q</span><span>U</span><span>E</span><span>S</span><span>T</span></div>
      <ul class="quest-expansion" aria-label="QUEST stands for">
        <li><span class="quest-letter">Q</span><p><strong>Question</strong>Curiosity sparks learning.</p></li>
        <li><span class="quest-letter">U</span><p><strong>Understand</strong>Build meaning, not just memory.</p></li>
        <li><span class="quest-letter">E</span><p><strong>Explore</strong>Discover through experience.</p></li>
        <li><span class="quest-letter">S</span><p><strong>Share</strong>Express and reflect.</p></li>
        <li><span class="quest-letter">T</span><p><strong>Transform</strong>Apply knowledge to the real world.</p></li>
      </ul>
      <p class="copy-18" style="margin-top:26px">QUEST is the teaching-learning approach that shapes every classroom at Ananya.</p>
      <p class="copy-18">In a QUEST classroom, children explore before they are told, question before they memorise, and apply what they learn to real situations. Teachers guide, challenge and encourage, while children take ownership of their learning.</p>
    </div>
    <h3 class="rv" style="text-align:center;font-family:var(--sans);font-weight:700;font-size:18px;letter-spacing:1px;text-transform:uppercase;color:#ffb48a;margin-bottom:24px">What this means for your child</h3>
    <div class="cards c4" data-stagger>
      <article class="icard t-peach tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span><h3>Learning is active, not passive</h3></article>
      <article class="icard t-blue tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M9 18h6M10 21h4M12 3a6 6 0 0 0-3.5 10.9c.6.5 1 1.2 1 2.1h5c0-.9.4-1.6 1-2.1A6 6 0 0 0 12 3Z"/></svg></span><h3>Concepts are understood, not just remembered</h3></article>
      <article class="icard t-green tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M4 5h16v10H9l-5 4Z"/></svg></span><h3>Every child is heard and encouraged to think independently</h3></article>
      <article class="icard t-yellow tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/></svg></span><h3>Progress is measured through understanding, skills and confidence, not marks alone</h3></article>
    </div>
    <p class="rv" style="text-align:center;margin-top:40px"><a class="btn btn-apply" href="{{ route('academics') }}#quest">Explore QUEST Pedagogy <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
  </div>
  <svg class="deco spin-slow" viewBox="0 0 120 120" aria-hidden="true" style="position:absolute;left:-40px;top:60px;width:200px;opacity:.12"><circle cx="60" cy="60" r="56" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="4 8"/></svg>
  <img class="deco quest-plane float" src="{{ asset('frontend/assets/plane-dash-white-outline.png') }}" alt="" width="193" height="163" loading="lazy">
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>

<!-- CAMPUS HIGHLIGHTS -->
<section class="spaces" id="campus" aria-labelledby="campus-title">
  <div class="container">
    <div class="split-head rv">
      <h2 class="h2" id="campus-title">A Campus Made for <span class="accent">Growing Minds</span></h2>
      <div class="side">
        <p class="lead">Bright classrooms, well-equipped labs, a welcoming library and open spaces for play and sport create an environment where children feel comfortable, curious and safe.</p>
        <div class="btn-row"><a class="btn btn-primary" href="{{ route('campus-facilities') }}">Take a Campus Tour <svg class="arrow"><use href="#i-arrow"/></svg></a></div>
      </div>
    </div>
    <div class="space-grid" data-stagger>
      <article class="space s-sports"><div class="ph"><img src="{{ asset('frontend/assets/home-sports.webp') }}" alt="Students playing a team sport at school" width="464" height="286" loading="lazy"></div><h3>Sports</h3><p>Space to move and compete, from squash and shooting to team games.</p></article>
      <article class="space s-chem"><div class="ph"><img src="{{ asset('frontend/assets/home-science-lab.webp') }}" alt="Students exploring a science activity together" width="464" height="286" loading="lazy"></div><h3>Science Lab</h3><p>Hands-on experiments in Physics, Chemistry and Biology for middle school.</p></article>
      <article class="space s-lib"><div class="ph"><img src="{{ asset('frontend/assets/home-library.webp') }}" alt="Students reading together in the school library" width="464" height="286" loading="lazy"></div><h3>Library</h3><p>An age-wise collection of books and digital resources, with quiet reading corners.</p></article>
      <article class="space wide s-art"><div class="ph"><img src="{{ asset('frontend/assets/home-art-music-rooms.webp') }}" alt="Students taking part in an Art and Music room activity" width="464" height="286" loading="lazy"></div><h3>Art &amp; Music Rooms</h3><p>Dedicated spaces for drawing, painting, craft, music and creative expression.</p></article>
      <article class="space wide s-comp"><div class="ph"><img src="{{ asset('frontend/assets/home-computer-lab.webp') }}" alt="Students learning with computers in the computer lab" width="464" height="286" loading="lazy"></div><h3>Computer Lab</h3><p>Coding, digital skills and safe internet use, with smart classrooms across the school.</p></article>
    </div>
  </div>
</section>

<!-- DIRECTOR -->
<!-- Hidden for now; remove style="display:none" to show the Director message again -->
<section class="shaping" aria-labelledby="dir-title" style="display:none">
  <div class="shaping-copy rv" data-rv="zoom">
    <h2 class="sr-only" id="dir-title">A message from our Director</h2>
    <div class="quote-band">
      <blockquote>We are building a school where children are known by name, challenged with care and celebrated for who they are. Come and see for yourself.</blockquote>
      <cite>Dr. Anil Verma, Director</cite>
    </div>
    <a class="btn btn-primary btn-sm" href="{{ route('about') }}#people" style="margin-top:28px">Meet Our People <svg class="arrow"><use href="#i-arrow"/></svg></a>
  </div>
</section>

<!-- LIFE AT ANANYA -->
<section class="sec tight" id="home-life" aria-labelledby="life-title">
  <div class="container">
    <div class="split-head rv" style="align-items:flex-end">
      <h2 class="h2" id="life-title">Life at <span class="accent">Ananya</span></h2>
      <div class="side"><p class="lead">Latest news, events and photo galleries from our campus.</p><div class="btn-row"><a class="btn btn-outline" href="{{ route('news-gallery') }}">View News &amp; Gallery <svg class="arrow"><use href="#i-arrow"/></svg></a></div></div>
    </div>
  </div>
  <div class="marquee rv" style="margin-top:36px">
    <div class="marquee-track">
      <figure><img src="{{ asset('frontend/assets/home-break-conversations.webp') }}" alt="Students talking together during a school break" width="596" height="400" loading="lazy"><figcaption>A Break Full of Conversations</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-happy-start.webp') }}" alt="Students arriving at school with a teacher" width="596" height="400" loading="lazy"><figcaption>A Happy Start to Every Day</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-every-creation.webp') }}" alt="Students working together on a creative project" width="596" height="400" loading="lazy"><figcaption>Every Creation Has a Story</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-every-move.webp') }}" alt="Students thinking through a strategy together" width="596" height="400" loading="lazy"><figcaption>Every Move Is a New Strategy</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-finding-rhythm.webp') }}" alt="Students sharing a joyful group activity" width="596" height="400" loading="lazy"><figcaption>Finding Rhythm, Finding Joy</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-helping-hands.webp') }}" alt="Students helping one another during a classroom activity" width="596" height="400" loading="lazy"><figcaption>Helping Hands, Caring Hearts</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-little-discoveries.webp') }}" alt="Students exploring an activity with their teacher" width="596" height="400" loading="lazy"><figcaption>Little Discoveries, Shared Achievements</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-little-voices.webp') }}" alt="Students speaking together at a school event" width="596" height="400" loading="lazy"><figcaption>Little Voices, Big Confidence</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-nature-classroom.webp') }}" alt="Students learning together outdoors on campus" width="596" height="400" loading="lazy"><figcaption>Nature Is Our Classroom Too</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-numbers-through-play.webp') }}" alt="Students using learning materials to explore numbers" width="596" height="400" loading="lazy"><figcaption>Numbers Come Alive Through Play</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-stories-imagination.webp') }}" alt="Students reading a story together" width="596" height="400" loading="lazy"><figcaption>Stories That Spark Imagination</figcaption></figure>
      <figure><img src="{{ asset('frontend/assets/home-team-spirit.webp') }}" alt="Students passing a football during a game" width="596" height="400" loading="lazy"><figcaption>Team Spirit in Every Pass</figcaption></figure>
    </div>
  </div>
</section>

<!-- PARENT TESTIMONIALS -->
<section class="sec paper" id="testimonials" aria-labelledby="testi-title">
  <div class="container">
    <div class="sec-head rv">
      <span class="kicker">Parent Voices</span>
      <h2 class="h2" id="testi-title">What Our <span class="accent">Parents Say</span></h2>
      <p class="lead">Families are at the heart of the Ananya community. Here is what some of them share about their child’s experience.</p>
    </div>
    <div class="testi-slider rv">
    <div class="testi-track" id="testi-track" tabindex="0" aria-label="Parent reviews">
      <figure class="testi testi-1">
        <div class="stars" role="img" aria-label="5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg></div>
        <blockquote>Our daughter now comes home with questions about everything, and her teachers actually welcome them. She is curious, confident and genuinely happy to go to school.</blockquote>
        <figcaption class="who"><span><strong>Priya Sharma</strong><span>Grade 2 parent</span></span></figcaption>
      </figure>
      <figure class="testi testi-2">
        <div class="stars" role="img" aria-label="5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg></div>
        <blockquote>The early-years team knew our son by name within a week. He settled in so gently, and we always feel like partners in his learning, not just visitors.</blockquote>
        <figcaption class="who"><span><strong>Rahul Mehta</strong><span>Nursery parent</span></span></figcaption>
      </figure>
      <figure class="testi testi-3">
        <div class="stars" role="img" aria-label="5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg></div>
        <blockquote>What I love is that learning connects to real life. My son explains science ideas using things he has seen and done, not lines he has memorised.</blockquote>
        <figcaption class="who"><span><strong>Sneha Patel</strong><span>Grade 5 parent</span></span></figcaption>
      </figure>
      <figure class="testi testi-4">
        <div class="stars" role="img" aria-label="5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg></div>
        <blockquote>Beyond academics, Ananya cares about who the children are becoming: kind, respectful and responsible. Sports, art and music are valued as much as the classroom.</blockquote>
        <figcaption class="who"><span><strong>Meera Joshi</strong><span>Grade 3 parent</span></span></figcaption>
      </figure>
      <figure class="testi testi-5">
        <div class="stars" role="img" aria-label="5 out of 5 stars"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg></div>
        <blockquote>Communication is open and warm, the campus feels safe and cheerful, and both our children feel they matter. We could not have asked for a better school.</blockquote>
        <figcaption class="who"><span><strong>Amit &amp; Kavita Desai</strong><span>Parent of two students</span></span></figcaption>
      </figure>
    </div>
    <div class="testi-ctrl">
      <button class="testi-btn" type="button" id="testi-prev" aria-label="Previous review"><svg viewBox="0 0 24 24"><path d="M15 5l-7 7 7 7"/></svg></button>
      <div class="testi-dots" id="testi-dots"></div>
      <button class="testi-btn" type="button" id="testi-next" aria-label="Next review"><svg viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg></button>
    </div>
    </div>
    <p class="testi-cta rv"><a class="btn btn-outline" href="{{ route('contact') }}">Share Your Experience <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
  </div>
</section>

<script>
(function(){
  var t=document.getElementById('testi-track');if(!t)return;
  var cards=[].slice.call(t.children),dots=document.getElementById('testi-dots'),
      prev=document.getElementById('testi-prev'),next=document.getElementById('testi-next');
  function step(){return cards[1]?cards[1].offsetLeft-cards[0].offsetLeft:t.clientWidth}
  function perView(){return Math.max(1,Math.round(t.clientWidth/step()))}
  function pages(){return Math.max(1,cards.length-perView()+1)}
  function cur(){return Math.min(pages()-1,Math.round(t.scrollLeft/step()))}
  function build(){dots.innerHTML='';for(var i=0;i<pages();i++){(function(i){var b=document.createElement('button');b.type='button';b.setAttribute('aria-label','Go to review '+(i+1));b.onclick=function(){t.scrollTo({left:i*step()})};dots.appendChild(b)})(i)}update()}
  function update(){var c=cur();[].forEach.call(dots.children,function(b,i){b.setAttribute('aria-current',i===c?'true':'false')});prev.disabled=c===0;next.disabled=c>=pages()-1}
  prev.onclick=function(){t.scrollBy({left:-step()})};
  next.onclick=function(){t.scrollBy({left:step()})};
  t.addEventListener('scroll',function(){window.requestAnimationFrame(update)},{passive:true});
  t.addEventListener('keydown',function(e){if(e.key==='ArrowRight'){next.click()}else if(e.key==='ArrowLeft'){prev.click()}});
  window.addEventListener('resize',build);build();
})();
</script>

<!-- ADMISSIONS STEPS PREVIEW -->
<section class="sec bg-peach" aria-labelledby="steps-title">
  <div class="container">
    <div class="sec-head rv">
      <span class="kicker">Admissions Open for April 2027</span>
      <h2 class="h2" id="steps-title">Five Simple <span class="accent">Steps</span></h2>
    </div>
    <ol class="steps-path anim" data-stagger>
      <li class="step-c"><span class="dot">1</span><h3>Enquire</h3><p>Fill in the enquiry form or call our admissions desk.</p></li>
      <li class="step-c"><span class="dot">2</span><h3>Visit</h3><p>Tour the campus, meet our team and ask your questions.</p></li>
      <li class="step-c"><span class="dot">3</span><h3>Apply</h3><p>Complete the registration form and submit the documents.</p></li>
      <li class="step-c"><span class="dot">4</span><h3>Interaction</h3><p>A friendly, informal interaction with the child and parents.</p></li>
      <li class="step-c"><span class="dot">5</span><h3>Confirm</h3><p>Receive the decision, pay the fees and complete enrolment.</p></li>
    </ol>
    <p class="rv" style="text-align:center;margin-top:40px"><a class="btn btn-primary" href="{{ route('admissions') }}#process">See the Admission Process <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
  </div>
</section>

<!-- ENQUIRY -->
<section class="enquiry paper" id="contact" aria-labelledby="enq-title">
  <div class="container enquiry-grid">
    <div class="enquiry-copy rv" data-rv="left">
      <h2 class="h2" id="enq-title">Plan Your Child’s<br>Journey <span class="accent">With Ananya</span></h2>
      <p class="lead">Share a few details and our admissions team will call you within one working day to answer your questions and arrange a campus visit.</p>
      <div class="btn-row">
        <a class="btn btn-outline" href="{{ route('admissions') }}#faq">Read the FAQs <svg class="arrow"><use href="#i-arrow"/></svg></a>
      </div>
      <img class="family" src="{{ asset('frontend/assets/home-plan-child-journey.webp') }}" alt="A parent meeting with an Ananya teacher to discuss their child’s journey" width="1154" height="478" loading="lazy">
      <span class="callout-o" aria-hidden="true">More Possibilities<br>Ahead</span>
    </div>
    <div class="form-card rv" data-rv="right" id="enquiry-form">
      <h2>Request a Call Back</h2>
      <form class="js-form" data-thanks="Thank you. Our admissions team will reach out to you shortly." novalidate>
        <label class="sr-only" for="h-parent">Parent's name</label><input class="field" id="h-parent" name="parent" placeholder="Parent’s Name*" required autocomplete="name">
        <label class="sr-only" for="h-mobile">Mobile number</label><input class="field" id="h-mobile" name="mobile" type="tel" placeholder="Mobile Number*" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}">
        <label class="sr-only" for="h-email">Email</label><input class="field" id="h-email" name="email" type="email" placeholder="Email*" required autocomplete="email">
        <label class="sr-only" for="h-child">Child's name</label><input class="field" id="h-child" name="child" placeholder="Child’s Name*" required>
        <label class="sr-only" for="h-class">Class applying for</label>
        <select class="field" id="h-class" name="class" required><option value="" disabled selected hidden>Class Applying For*</option><option>Class 1</option><option>Class 2</option><option>Class 3</option><option>Class 4</option><option>Class 5</option><option>Class 6</option><option>Class 7</option><option>Class 8</option></select>
        <label class="sr-only" for="h-date">Preferred campus visit date</label><input class="field" id="h-date" name="visit_date" type="text" placeholder="Preferred Campus Visit Date (optional)" onfocus="this.type='date'">
        <label class="consent"><input type="checkbox" id="h-consent" required> I agree to be contacted by Ananya International School, Lilapur.</label>
        <button class="btn btn-apply" type="submit">Request a Call Back <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
  </div>
</section>
@endsection
