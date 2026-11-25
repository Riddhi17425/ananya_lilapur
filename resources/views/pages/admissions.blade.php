@extends('layouts.app')

@section('title', 'Admissions · Ananya International School, Lilapur')
@section('description', 'Admissions open for April 2027: process, eligibility, fees, FAQs, enquiry and campus visits.')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-adm" aria-labelledby="adm-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">Admissions</span></nav>
      <p class="badge" style="--d:0;margin-top:18px"><b>Now open</b> Academic year starting April 2027</p>
      <h1 class="h1x word-pop" id="adm-title" style="--d:1;margin-top:16px">Admissions Open <span class="accent">for April 2027</span></h1>
      <p class="copy-18" style="--d:2">We are delighted that you are considering Ananya for your child. Our admissions process is simple, transparent and friendly, and our team is happy to guide you at every step.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-apply" href="#enquire">Apply for Admission <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#visit">Book a Campus Visit</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ asset('frontend/assets/give-child.png') }}" alt="Parents and their daughter going through admission material with an Ananya counsellor" width="817" height="413" fetchpriority="high"></div>
  </div>
</section>

<nav class="jump" aria-label="On this page"><div class="stage"><a href="#process">Process</a><a href="#eligibility">Eligibility</a><a href="#fees">Fees</a><a href="#faq">FAQs</a><a href="#enquire">Enquire Now</a><a href="#visit">Campus Visit</a></div></nav>

<section class="sec bg-peach" id="process" aria-labelledby="proc-title">
  <div class="stage">
    <div class="sec-head rv">
      <div class="tiger-pal" data-side="right" aria-hidden="true"><img src="{{ asset('frontend/assets/mascot/tiger-point.webp') }}" alt="" width="505" height="760" loading="lazy"><p class="bubble">Just <b>5 easy</b> steps!</p></div>
      <span class="kicker">Admission Process</span>
      <h2 class="h2" id="proc-title">Your journey to Ananya, <span class="accent">step by step.</span></h2>
    </div>
    <img class="rv" src="{{ asset('frontend/assets/admissions/process-counsellor.webp') }}" alt="A counsellor meeting a parent and child in the Ananya school reception" width="1634" height="826" loading="lazy" style="display:block;width:100%;max-width:760px;margin:0 auto 40px;border-radius:24px">
    <ol class="steps-path anim" data-stagger><li class="step-c"><span class="dot">1</span><h3>Make an enquiry.</h3><p>Share your details and the grade you are considering.</p></li><li class="step-c"><span class="dot">2</span><h3>Connect with our team.</h3><p>Learn about the school, our approach and the admission requirements.</p></li><li class="step-c"><span class="dot">3</span><h3>Visit the campus.</h3><p>Experience the environment and have your questions answered.</p></li><li class="step-c"><span class="dot">4</span><h3>Complete the application.</h3><p>Submit the required application form and documents.</p></li><li class="step-c"><span class="dot">5</span><h3>Receive the next steps.</h3><p>Our admissions team will guide you through the remaining formalities and the confirmation process.</p></li></ol>
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
      <span class="kicker">Eligibility &amp; Age Criteria</span>
      <h2 class="h2" id="el-title">Finding the right <span class="accent">starting point.</span></h2>
    </header>
    <div class="el-wrap">
      <figure class="el-art rv">
        <img src="{{ asset('frontend/assets/admissions/eligibility-family.webp') }}" alt="A mother and daughter with an Ananya teacher in front of the school building" width="524" height="640" loading="lazy" style="aspect-ratio:524/430;object-fit:cover;object-position:50% 50%;height:auto">
      </figure>
      <div class="el-card rv">
        <p class="copy-18">Admission eligibility depends on the grade applied for and the applicable age and documentation requirements. Please contact our admissions team for the current grade-wise age criteria, entry requirements and required documents.</p>
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
      <span class="kicker">Preprimary</span>
      <h2 class="h2" id="pp-title">A joyful start to <span class="accent">lifelong learning.</span></h2>
    </header>
    <div class="pp-wrap">
      <div class="pp-copy rv">
        <p class="copy-18 pp-intro">The early years are when children discover how much they love to learn. Our Preprimary programme, from Play School to Sr. KG, gives young learners a warm, safe and joyful space to explore, play, ask questions and grow in confidence every day.</p>
        <ul class="pp-list">
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-bulb"/></svg></span><div><h3>Play-based early learning</h3><p>Hands-on activities, stories and games that make learning feel natural and fun.</p></div></li>
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-book"/></svg></span><div><h3>Strong foundations</h3><p>Early language, phonics, numbers and thinking skills, built step by step.</p></div></li>
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-people"/></svg></span><div><h3>Social and emotional growth</h3><p>Learning to share, take turns, make friends and understand feelings.</p></div></li>
          <li><span class="pp-ic" aria-hidden="true"><svg><use href="#ic-star"/></svg></span><div><h3>Ready for school</h3><p>Independence, routines and listening skills for a confident move to Class 1.</p></div></li>
        </ul>
        <div class="btn-row">
          <a class="btn btn-apply" href="https://ananyatots.org/" target="_blank" rel="noopener">Enquire About Preprimary <svg class="arrow"><use href="#i-arrow"/></svg></a>
        </div>
      </div>
      <figure class="pp-art rv">
        <img src="{{ asset('frontend/assets/preprimary-classroom.png') }}" alt="A teacher guiding young children as they sort coloured shapes and blocks at a table in an Ananya classroom" width="1178" height="784" loading="lazy">
      </figure>
    </div>
  </div>
</section>

<section class="sec bg-sky" id="fees" aria-labelledby="fee-title" hidden>
  <div class="stage">
    <div class="fee-card rv" data-rv="zoom">
      <div class="fee-copy">
        <span class="kicker">Fee Structure</span>
        <h2 class="h2" id="fee-title">Transparent Fees, <span class="accent">No Surprises</span></h2>
        <p class="copy-18">We believe parents should know the full cost before they apply. Our fee schedule is shared clearly and includes everything covered.</p>
        <p class="copy-18" style="font-size:15px;color:#6a737c"><b>Note:</b> Fees are subject to revision as per school policy.</p>
        <div class="btn-row">
          <button class="btn btn-primary" type="button" disabled aria-describedby="fee-pdf-note" style="opacity:.55;cursor:not-allowed">Download Fee Structure (PDF)</button>
          <button class="btn btn-outline" type="button" data-enquire data-source="fees" data-title="Ask About Fees" data-text="Tell us which class you are interested in and our admissions team will share the full fee schedule.">Ask About Fees</button>
        </div>
        <p id="fee-pdf-note" class="form-note" style="color:#8a5a00">The fee PDF will be available once the school shares the final schedule.</p>
      </div>
      <ul class="fee-list" data-stagger>
        <li>Registration fee [Amount]</li><li>Admission fee [Amount]</li><li>Annual fee [Amount]</li><li>Tuition fee (per term) [Amount]</li><li>Transport (by distance) [Amount]</li><li>Optional services [Amount]</li>
      </ul>
    </div>
  </div>
</section>

<section class="sec faq" id="faq" aria-labelledby="faq-title">
  <div class="stage">
    <h2 class="h2 rv" id="faq-title">Frequently Asked <span class="accent">Questions</span></h2>
    <div class="faq-list" data-stagger>
      <details open><summary>Which board does Ananya follow? <i aria-hidden="true"></i></summary><p class="ans">Ananya follows the CBSE curriculum. The affiliation process takes time, and the affiliation number will be shared once it is officially allotted.</p></details>
      <details><summary>What is the class size? <i aria-hidden="true"></i></summary><p class="ans">Each class has 35 students, in a classroom of approximately 650 sq. ft.</p></details>
      <details><summary>Is there an entrance test? <i aria-hidden="true"></i></summary><p class="ans">For Play School to Class 2, we hold a friendly interaction with no written test. For higher classes, a simple assessment helps us place the child in the right class.</p></details>
      <details><summary>Do you provide school transport? <i aria-hidden="true"></i></summary><p class="ans">Yes, we run school buses on planned routes. Please see the <a href="{{ route('campus-facilities') }}#transport">Transport section</a> for details and the enrolment form.</p></details>
      <details><summary>Is there a cafeteria? <i aria-hidden="true"></i></summary><p class="ans">Yes, we offer a hygienic cafeteria.</p></details>
      <details><summary>What are the school timings? <i aria-hidden="true"></i></summary><p class="ans">Please contact our admissions desk for the timings for each stage.</p></details>
      <details><summary>How can I stay in touch with my child’s progress? <i aria-hidden="true"></i></summary><p class="ans">Through monthly parent club interactions, progress reports and our parent portal. You can also approach the school whenever you have a query.</p></details>
      <details><summary>Can I visit the campus before applying? <i aria-hidden="true"></i></summary><p class="ans">Of course. Please <a href="#visit">book a campus visit</a> and we will show you around.</p></details>
      <details><summary>Which sports and activities are available? <i aria-hidden="true"></i></summary><p class="ans">Please see the <a href="{{ route('beyond-academics') }}">Beyond Academics page</a> for the full list.</p></details>
    </div>
  </div>
</section>

<section class="sec paper" aria-label="Enquiry and campus visit forms">
  <div class="stage forms-2">
    <div class="form-panel rv" data-rv="left" id="enquire">
      <span class="kicker">Enquire Now</span>
      <h3>Let Us Help You Take the Next Step</h3>
      <p>Tell us about your child and our admissions team will call you within one working day.</p>
      <form class="js-form" data-thanks="Thank you. Our admissions team will call you within one working day." novalidate>
        <div class="f-grid">
          <label class="fl"><span>Parent’s Name*</span><input class="field" id="e-parent" name="parent" required autocomplete="name"></label>
          <label class="fl"><span>Mobile Number*</span><input class="field" id="e-mobile" name="mobile" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}"></label>
          <label class="fl"><span>Email*</span><input class="field" id="e-email" name="email" type="email" required autocomplete="email"></label>
          <label class="fl"><span>Child’s Name*</span><input class="field" id="e-child" name="child" required></label>
          <label class="fl"><span>Class Applying For*</span><select class="field" id="e-class" name="class" required><option value="" disabled selected hidden>Select a class</option><option>Class 1</option><option>Class 2</option><option>Class 3</option><option>Class 4</option><option>Class 5</option><option>Class 6</option><option>Class 7</option><option>Class 8</option></select></label>
          <label class="fl"><span>Current School (if any)</span><input class="field" id="e-school" name="current_school"></label>
          <label class="fl full"><span>Message (optional)</span><textarea class="field" id="e-msg" name="message"></textarea></label>
        </div>
        <button class="btn btn-apply" type="submit">Submit Enquiry <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
    <div class="form-panel rv" data-rv="right" id="visit">
      <span class="kicker">Book a Campus Visit</span>
      <h3>Come and See Ananya for Yourself</h3>
      <p>A visit lets you walk through classrooms, meet our team and see how your child will learn and play. Visits take about 45 minutes. Mon to Sat, 8:00 am to 4:00 pm</p>
      <form class="js-form" data-thanks="Thank you. We will confirm your campus visit shortly." novalidate>
        <div class="f-grid">
          <label class="fl"><span>Parent’s Name*</span><input class="field" id="v-parent" name="parent" required autocomplete="name"></label>
          <label class="fl"><span>Mobile Number*</span><input class="field" id="v-mobile" name="mobile" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}"></label>
          <label class="fl full"><span>Email*</span><input class="field" id="v-email" name="email" type="email" required autocomplete="email"></label>
          <label class="fl"><span>Preferred Date and Time*</span><input class="field" id="v-date" name="datetime" type="datetime-local" required></label>
          <label class="fl"><span>Number of Visitors*</span><input class="field" id="v-count" name="visitors" type="number" min="1" max="8" value="2" required></label>
          <label class="fl full"><span>Child’s Class*</span><select class="field" id="v-class" name="class" required><option value="" disabled selected hidden>Select a class</option><option>Class 1</option><option>Class 2</option><option>Class 3</option><option>Class 4</option><option>Class 5</option><option>Class 6</option><option>Class 7</option><option>Class 8</option></select></label>
        </div>
        <button class="btn btn-primary" type="submit">Confirm My Visit <svg class="arrow"><use href="#i-arrow"/></svg></button>
        <p class="form-note" role="status" aria-live="polite"></p>
      </form>
    </div>
  </div>
</section>
@endsection
