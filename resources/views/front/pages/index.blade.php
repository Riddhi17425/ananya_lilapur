@extends('front.layouts.app')

@section('title', $c->raw('seo_title'))
@section('description', $c->raw('seo_description'))
@section('footer-ethos', 'Global Thinking. Indian Values. Future Ready Learners.')

@section('content')
<!-- HERO -->
<section class="hero paper" aria-labelledby="hero-title">
  <div class="container hero-inner">
    <div class="hero-copy intro">
      <p class="badge" style="--d:0"><b>{{ $c->text('hero_badge_bold') }}</b> {{ $c->text('hero_badge_text') }}</p>
      <h1 id="hero-title" class="word-pop" style="--d:1;margin-top:22px">{{ $c->title('hero_title') }}</h1>
      <p class="lead" style="--d:2">{{ $c->text('hero_text') }} </p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="{{ route('admissions') }}#enquire">{{ $c->text('hero_button_1') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="{{ route('admissions') }}#visit">{{ $c->text('hero_button_2') }}</a>
      </div>
      <ul class="hero-facts" style="--d:4">
        <li>{{ $c->text('hero_fact_1_line_1') }}<br>{{ $c->text('hero_fact_1_line_2') }}</li>
        <li>{{ $c->text('hero_fact_2_line_1') }}<br>{{ $c->text('hero_fact_2_line_2') }}</li>
        <li>{{ $c->text('hero_fact_3_line_1') }}<br>{{ $c->text('hero_fact_3_line_2') }}</li>
        <svg class="heart accent wiggle" viewBox="0 0 40 50" aria-hidden="true"><use href="#i-heart"/></svg>
      </ul>
    </div>
  </div>
  <img class="hero-art intro-art" src="{{ $c->image('hero_image') }}" alt="{{ $c->text('hero_image_alt') }}" width="768" height="786" fetchpriority="high">
  <button class="tiger-hero" type="button" aria-label="{{ $c->text('hero_tiger_label') }}"><span class="th-fig"><img class="th-body" src="{{ $c->image('hero_tiger_body_image') }}" alt="" width="498" height="760"><img class="th-paw" src="{{ $c->image('hero_tiger_paw_image') }}" alt="" width="144" height="220"></span><span class="bubble" aria-live="polite">{{ $c->text('hero_bubble_before') }} <b>{{ $c->text('hero_bubble_bold') }}</b></span></button>
  <a class="scroll-cue bob" href="#why"><svg aria-hidden="true"><use href="#i-down"/></svg><span>{{ $c->text('hero_scroll_cue') }}</span></a>
</section>

<!-- WHY PARENTS CHOOSE ANANYA -->
<section class="why" id="why" aria-labelledby="why-title">
  <img class="deco plane why-plane" src="{{ $c->image('deco_plane_image') }}" alt="" width="193" height="163" loading="lazy">
  <div class="container">
    <div class="why-head rv">
      <h2 class="h2" id="why-title">{{ $c->title('why_title') }}</h2>
      <p class="lead">{{ $c->text('why_text') }}</p>
    </div>
    <div class="why-body">
      <ul class="why-list" data-stagger>
        <li class="why-item"><img src="{{ $c->image('why_item_1_image') }}" alt="" width="100" height="100" loading="lazy"><div><h3>{{ $c->text('why_item_1_title') }}</h3><p>{{ $c->text('why_item_1_text') }}</p></div></li>
        <li class="why-item"><img src="{{ $c->image('why_item_2_image') }}" alt="" width="100" height="100" loading="lazy"><div><h3>{{ $c->text('why_item_2_title') }}</h3><p>{{ $c->text('why_item_2_text') }}</p></div></li>
        <li class="why-item"><img src="{{ $c->image('why_item_3_image') }}" alt="" width="100" height="100" loading="lazy"><div><h3>{{ $c->text('why_item_3_title') }}</h3><p>{{ $c->text('why_item_3_text') }}</p></div></li>
      </ul>
      <div class="why-arch rv" data-rv="zoom"><img src="{{ $c->image('why_arch_image') }}" alt="{{ $c->text('why_arch_image_alt') }}" width="768" height="1156" loading="lazy"></div>
      <ul class="why-list" data-stagger>
        <li class="why-item"><img src="{{ $c->image('why_item_4_image') }}" alt="" width="100" height="100" loading="lazy"><div><h3>{{ $c->text('why_item_4_title') }}</h3><p>{{ $c->text('why_item_4_text') }}</p></div></li>
        <li class="why-item"><img src="{{ $c->image('why_item_5_image') }}" alt="" width="100" height="100" loading="lazy"><div><h3>{{ $c->text('why_item_5_title') }}</h3><p>{{ $c->text('why_item_5_text') }}</p></div></li>
        <li class="why-item"><img src="{{ $c->image('why_item_6_image') }}" alt="" width="100" height="100" loading="lazy"><div><h3>{{ $c->text('why_item_6_title') }}</h3><p>{{ $c->text('why_item_6_text') }}</p></div></li>
      </ul>
    </div>
  </div>
  <img class="deco tree" src="{{ $c->image('deco_tree_image') }}" alt="" width="164" height="108" loading="lazy">
  <svg class="wave" viewBox="0 0 1440 150" preserveAspectRatio="none" aria-hidden="true"><path d="M0 52C190 14 400 12 640 40s560 70 800 4V150H0Z" fill="#c3d7e9"/><path d="M0 100c280-36 600-40 900-12s400 20 540-6V150H0Z" fill="#fbf8f1"/></svg>
</section>

<!-- PHILOSOPHY -->
<section class="sec paper" id="philosophy" aria-labelledby="phil-title">
  <div class="container msplit">
    <div class="media rv" data-rv="left"><img src="{{ $c->image('phil_image') }}" alt="{{ $c->text('phil_image_alt') }}" width="520" height="522" loading="lazy"></div>
    <div class="copy rv" data-rv="right">
      <span class="kicker">{{ $c->text('phil_kicker') }}</span>
      <h2 class="h2" id="phil-title">{{ $c->title('phil_title') }}</h2>
      <p class="copy-18">{{ $c->text('phil_text') }}</p>
      <a class="btn btn-primary btn-sm" href="{{ route('about') }}#why">{{ $c->text('phil_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
    </div>
  </div>
  <svg class="deco heart-a accent float-2" viewBox="0 0 40 50" aria-hidden="true" style="position:absolute;right:8%;top:70px;width:34px"><use href="#i-heart"/></svg>
</section>

<!-- QUEST -->
<section class="sec bg-navy quest" id="quest" aria-labelledby="quest-title" style="overflow:hidden">
  <div class="container">
    <div class="sec-head rv">
      <span class="kicker" style="color:#ffb48a">{{ $c->text('quest_kicker') }}</span>
      <h2 class="h2" id="quest-title">{{ $c->title('quest_title') }}</h2>
      <div class="quest-word" aria-hidden="true" data-stagger><span>Q</span><span>U</span><span>E</span><span>S</span><span>T</span></div>
      <ul class="quest-expansion" aria-label="QUEST stands for">
        <li><span class="quest-letter">Q</span><p><strong>{{ $c->text('quest_1_title') }}</strong>{{ $c->text('quest_1_text') }}</p></li>
        <li><span class="quest-letter">U</span><p><strong>{{ $c->text('quest_2_title') }}</strong>{{ $c->text('quest_2_text') }}</p></li>
        <li><span class="quest-letter">E</span><p><strong>{{ $c->text('quest_3_title') }}</strong>{{ $c->text('quest_3_text') }}</p></li>
        <li><span class="quest-letter">S</span><p><strong>{{ $c->text('quest_4_title') }}</strong>{{ $c->text('quest_4_text') }}</p></li>
        <li><span class="quest-letter">T</span><p><strong>{{ $c->text('quest_5_title') }}</strong>{{ $c->text('quest_5_text') }}</p></li>
      </ul>
      <p class="copy-18" style="margin-top:26px">{{ $c->text('quest_text_1') }}</p>
      <p class="copy-18">{{ $c->text('quest_text_2') }}</p>
    </div>
    <h3 class="rv" style="text-align:center;font-family:var(--sans);font-weight:700;font-size:18px;letter-spacing:1px;text-transform:uppercase;color:#ffb48a;margin-bottom:24px">{{ $c->text('quest_cards_title') }}</h3>
    <div class="cards c4" data-stagger>
      <article class="icard t-peach tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span><h3>{{ $c->text('quest_card_1') }}</h3></article>
      <article class="icard t-blue tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M9 18h6M10 21h4M12 3a6 6 0 0 0-3.5 10.9c.6.5 1 1.2 1 2.1h5c0-.9.4-1.6 1-2.1A6 6 0 0 0 12 3Z"/></svg></span><h3>{{ $c->text('quest_card_2') }}</h3></article>
      <article class="icard t-green tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M4 5h16v10H9l-5 4Z"/></svg></span><h3>{{ $c->text('quest_card_3') }}</h3></article>
      <article class="icard t-yellow tilt-hover"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/></svg></span><h3>{{ $c->text('quest_card_4') }}</h3></article>
    </div>
    <p class="rv" style="text-align:center;margin-top:40px"><a class="btn btn-apply" href="{{ route('academics') }}#quest">{{ $c->text('quest_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
  </div>
  <svg class="deco spin-slow" viewBox="0 0 120 120" aria-hidden="true" style="position:absolute;left:-40px;top:60px;width:200px;opacity:.12"><circle cx="60" cy="60" r="56" fill="none" stroke="#fff" stroke-width="2" stroke-dasharray="4 8"/></svg>
  <img class="deco quest-plane float" src="{{ $c->image('deco_quest_plane_image') }}" alt="" width="193" height="163" loading="lazy">
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>

<!-- CAMPUS HIGHLIGHTS -->
<section class="spaces" id="campus" aria-labelledby="campus-title">
  <div class="container">
    <div class="split-head rv">
      <h2 class="h2" id="campus-title">{{ $c->title('campus_title') }}</h2>
      <div class="side">
        <p class="lead">{{ $c->text('campus_text') }}</p>
        <div class="btn-row"><a class="btn btn-primary" href="{{ route('campus-facilities') }}">{{ $c->text('campus_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a></div>
      </div>
    </div>
    <div class="space-grid" data-stagger>
      <article class="space s-sports"><div class="ph"><img src="{{ $c->image('campus_1_image') }}" alt="{{ $c->text('campus_1_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('campus_1_title') }}</h3><p>{{ $c->text('campus_1_text') }}</p></article>
      <article class="space s-chem"><div class="ph"><img src="{{ $c->image('campus_2_image') }}" alt="{{ $c->text('campus_2_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('campus_2_title') }}</h3><p>{{ $c->text('campus_2_text') }}</p></article>
      <article class="space s-lib"><div class="ph"><img src="{{ $c->image('campus_3_image') }}" alt="{{ $c->text('campus_3_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('campus_3_title') }}</h3><p>{{ $c->text('campus_3_text') }}</p></article>
      <article class="space wide s-art"><div class="ph"><img src="{{ $c->image('campus_4_image') }}" alt="{{ $c->text('campus_4_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('campus_4_title') }}</h3><p>{{ $c->text('campus_4_text') }}</p></article>
      <article class="space wide s-comp"><div class="ph"><img src="{{ $c->image('campus_5_image') }}" alt="{{ $c->text('campus_5_image_alt') }}" width="464" height="286" loading="lazy"></div><h3>{{ $c->text('campus_5_title') }}</h3><p>{{ $c->text('campus_5_text') }}</p></article>
    </div>
  </div>
</section>

<!-- DIRECTOR -->
<!-- Hidden for now; remove style="display:none" to show the Director message again -->
<section class="shaping" aria-labelledby="dir-title" style="display:none">
  <div class="shaping-copy rv" data-rv="zoom">
    <h2 class="sr-only" id="dir-title">{{ $c->text('director_heading') }}</h2>
    <div class="quote-band">
      <blockquote>{{ $c->text('director_quote') }}</blockquote>
      <cite>{{ $c->text('director_name') }}</cite>
    </div>
    <a class="btn btn-primary btn-sm" href="{{ route('about') }}#people" style="margin-top:28px">{{ $c->text('director_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
  </div>
</section>

<!-- LIFE AT ANANYA -->
<section class="sec tight" id="home-life" aria-labelledby="life-title">
  <div class="container">
    <div class="split-head rv" style="align-items:flex-end">
      <h2 class="h2" id="life-title">{{ $c->title('life_title') }}</h2>
      <div class="side"><p class="lead">{{ $c->text('life_text') }}</p><div class="btn-row"><a class="btn btn-outline" href="{{ route('news-gallery') }}">{{ $c->text('life_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a></div></div>
    </div>
  </div>
  @if ($homeGalleries->isNotEmpty())
  <div class="marquee rv" style="margin-top:36px">
    <div class="marquee-track">
@foreach ($homeGalleries as $gallery)
      <figure><img src="{{ $gallery->listImageUrl() }}" alt="{{ $gallery->name }}" width="596" height="400" loading="lazy"><figcaption>{{ $gallery->name }}</figcaption></figure>
@endforeach
    </div>
  </div>
  @endif
</section>

@if ($testimonials->isNotEmpty())
<!-- PARENT TESTIMONIALS -->
<section class="sec paper" id="testimonials" aria-labelledby="testi-title">
  <div class="container">
    <div class="sec-head rv">
      <span class="kicker">{{ $c->text('testi_kicker') }}</span>
      <h2 class="h2" id="testi-title">{{ $c->title('testi_title') }}</h2>
      <p class="lead">{{ $c->text('testi_text') }}</p>
    </div>
    <div class="testi-slider rv">
    <div class="testi-track" id="testi-track" tabindex="0" aria-label="Parent reviews">
      @foreach ($testimonials as $testimonial)
      <figure class="testi testi-{{ ($loop->index % 5) + 1 }}">
        <div class="stars" role="img" aria-label="{{ $testimonial->star }} out of 5 stars">@for ($i = 0; $i < $testimonial->star; $i++)<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5 7.5-.7z"/></svg>@endfor</div>
        <blockquote>{!! $testimonial->description !!}</blockquote>
        <figcaption class="who"><span><strong>{{ $testimonial->name }}</strong>@if ($testimonial->reviewer_category)<span>{{ $testimonial->reviewer_category }}</span>@endif</span></figcaption>
      </figure>
      @endforeach
    </div>
    <div class="testi-ctrl">
      <button class="testi-btn" type="button" id="testi-prev" aria-label="Previous review"><svg viewBox="0 0 24 24"><path d="M15 5l-7 7 7 7"/></svg></button>
      <div class="testi-dots" id="testi-dots"></div>
      <button class="testi-btn" type="button" id="testi-next" aria-label="Next review"><svg viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg></button>
    </div>
    </div>
    <p class="testi-cta rv"><a class="btn btn-outline" href="{{ route('contact') }}">{{ $c->text('testi_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
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
@endif

<!-- ADMISSIONS STEPS PREVIEW -->
<section class="sec bg-peach" aria-labelledby="steps-title">
  <div class="container">
    <div class="sec-head rv">
      <span class="kicker">{{ $c->text('steps_kicker') }}</span>
      <h2 class="h2" id="steps-title">{{ $c->title('steps_title') }}</h2>
    </div>
    <ol class="steps-path anim" data-stagger>
      <li class="step-c"><span class="dot">1</span><h3>{{ $c->text('step_1_title') }}</h3><p>{{ $c->text('step_1_text') }}</p></li>
      <li class="step-c"><span class="dot">2</span><h3>{{ $c->text('step_2_title') }}</h3><p>{{ $c->text('step_2_text') }}</p></li>
      <li class="step-c"><span class="dot">3</span><h3>{{ $c->text('step_3_title') }}</h3><p>{{ $c->text('step_3_text') }}</p></li>
      <li class="step-c"><span class="dot">4</span><h3>{{ $c->text('step_4_title') }}</h3><p>{{ $c->text('step_4_text') }}</p></li>
      <li class="step-c"><span class="dot">5</span><h3>{{ $c->text('step_5_title') }}</h3><p>{{ $c->text('step_5_text') }}</p></li>
    </ol>
    <p class="rv" style="text-align:center;margin-top:40px"><a class="btn btn-primary" href="{{ route('admissions') }}#process">{{ $c->text('steps_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a></p>
  </div>
</section>

<!-- ENQUIRY -->
<section class="enquiry paper" id="contact" aria-labelledby="enq-title">
  <div class="container enquiry-grid">
    <div class="enquiry-copy rv" data-rv="left">
      <h2 class="h2" id="enq-title">{{ $c->text('enq_title_line_1') }}<br>{{ $c->title('enq_title_line_2') }}</h2>
      <p class="lead">{{ $c->text('enq_text') }}</p>
      <div class="btn-row">
        <a class="btn btn-outline" href="{{ route('admissions') }}#faq">{{ $c->text('enq_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></a>
      </div>
      <img class="family" src="{{ $c->image('enq_image') }}" alt="{{ $c->text('enq_image_alt') }}" width="1154" height="478" loading="lazy">
      <span class="callout-o" aria-hidden="true">{{ $c->text('enq_callout_line_1') }}<br>{{ $c->text('enq_callout_line_2') }}</span>
    </div>
    <div class="form-card rv" data-rv="right" id="enquiry-form">
      <h2>{{ $c->text('enq_form_title') }}</h2>
      <form class="js-form" action="{{ route('inquiries.store', 'enquire') }}" method="POST" data-thanks="Thank you. Our admissions team will reach out to you shortly." novalidate>
        <input type="hidden" name="source" value="home">
        <label class="sr-only" for="h-parent">Parent's name</label><input class="field" id="h-parent" name="parent" placeholder="Parent’s Name*" required autocomplete="name">
        <label class="sr-only" for="h-mobile">Mobile number</label><input class="field" id="h-mobile" name="mobile" type="tel" placeholder="Mobile Number*" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}">
        <label class="sr-only" for="h-email">Email</label><input class="field" id="h-email" name="email" type="email" placeholder="Email*" required autocomplete="email">
        <label class="sr-only" for="h-child">Child's name</label><input class="field" id="h-child" name="child" placeholder="Child’s Name*" required>
        <label class="sr-only" for="h-class">Class applying for</label>
        <select class="field" id="h-class" name="class" required><option value="" disabled selected hidden>Class Applying For*</option><option>Class 1</option><option>Class 2</option><option>Class 3</option><option>Class 4</option><option>Class 5</option><option>Class 6</option><option>Class 7</option><option>Class 8</option></select>
        <label class="sr-only" for="h-date">Preferred campus visit date</label><input class="field" id="h-date" name="visit_date" type="text" placeholder="Preferred Campus Visit Date (optional)" onfocus="this.type='date'">
        <label class="consent"><input type="checkbox" id="h-consent" name="consent" required> {{ $c->text('enq_consent') }}</label>
        <button class="btn btn-apply" type="submit">{{ $c->text('enq_form_button') }} <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
  </div>
</section>
@endsection
