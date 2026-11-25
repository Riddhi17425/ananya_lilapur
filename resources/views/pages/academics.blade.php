@extends('layouts.app')

@section('title', 'Academics · Ananya International School, Lilapur')
@section('description', 'CBSE curriculum, QUEST pedagogy and learning from the Foundational Stage to Middle School.')

@push('page-styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/pages.css') }}">
@endpush

@section('content')
<section class="ph ph-acad" aria-labelledby="acad-title">
  <div class="stage">
    <div class="ph-copy intro">
      <nav class="crumbs" aria-label="Breadcrumb" style="--d:0"><a href="{{ route('home') }}">Home</a><span>/</span><span aria-current="page">Academics</span></nav>
      <h1 class="h1x word-pop" id="acad-title" style="--d:1">Learning That Goes <span class="accent">Beyond the Textbook</span></h1>
      <p class="copy-18" style="--d:2">Our academic programme follows the CBSE framework and brings it to life through the QUEST approach. The result is a classroom where children think, question, create and understand, and where strong results follow naturally.</p>
      <div class="btn-row" style="--d:3">
        <a class="btn btn-primary" href="#stages">Explore Our Programmes <svg class="arrow"><use href="#i-arrow"/></svg></a>
        <a class="btn btn-outline" href="#quest">How QUEST Works</a>
      </div>
    </div>
    <div class="ph-art intro-art"><img src="{{ asset('frontend/assets/acad-hero.png') }}" alt="Ananya students walking out of the school building" width="765" height="492" fetchpriority="high"></div>
  </div>
</section>

<section class="sec" id="cbse" aria-labelledby="cbse-title">
  <img class="deco" src="{{ asset('frontend/assets/acad-blob-left.png') }}" alt="" width="245" height="286" loading="lazy" style="position:absolute;left:0;top:0;width:110px;z-index:0">
  <div class="stage msplit">
    <div class="copy rv" data-rv="left">
      <span class="kicker">Curriculum &amp; CBSE Framework</span>
      <h2 class="h2" id="cbse-title">A Strong <span class="accent">CBSE Foundation</span></h2>
      <p class="copy-18">The CBSE framework provides the academic foundation for learning at Ananya. Our approach brings curriculum expectations together with meaningful classroom experiences, helping children understand concepts rather than rely only on memorisation. We aim to develop subject knowledge, language and mathematical proficiency, scientific thinking and the ability to apply learning in different contexts.</p>
      <h3 class="mini-h">What our curriculum offers</h3>
      <ul class="ticks">
        <li>A 5+3+3+4 learning structure, with a play-based Foundational Stage followed by Primary and Middle School</li>
        <li>Languages: English, Hindi and Gujarati. </li>
        <li>Core subjects: Mathematics, Science, Social Science and Computer Education</li>
        <li>Integrated learning through projects, field visits and cross-subject activities</li>
        <li>Strong emphasis on reading, writing, numeracy and communication</li>
      </ul>
    </div>
    <div class="media rv" data-rv="right">
      <img src="{{ asset('frontend/assets/academics/cbse-curriculum.webp') }}" alt="Students working on a water cycle science model with Science, Mathematics and Social Science books" width="1120" height="1276" loading="lazy">
      <aside class="callout-card float-2">
        <h3>Why CBSE?</h3>
        <p>CBSE is recognised across India and is a preferred pathway for competitive exams, school transfers and higher education. Families moving between cities can be confident that their child’s learning will continue without a break.</p>
      </aside>
    </div>
  </div>
</section>

<section class="sec bg-navy qp" id="quest" aria-labelledby="quest-title">
  <div class="stage">
    <div class="sec-head rv qp-head">
      <span class="kicker" style="color:#ffb48a">QUEST Pedagogy</span>
      <h2 class="h2" id="quest-title">Teaching-Learning <span class="accent">Methodologies</span></h2>
      <p class="qp-sub">Learning that builds understanding.</p>
      <p class="copy-18">Academic learning at Ananya is designed to help children build strong foundations, make connections and apply what they know. We combine the structure of the CBSE curriculum with teaching approaches that encourage inquiry, participation and independent thinking. As children progress through the school, they are supported in developing the knowledge, skills and confidence needed for increasingly complex learning.</p>
    </div>
    <h3 class="qp-title rv">QUEST: Five stages. <span>One meaningful learning journey.</span></h3>
    <div class="qp-grid" data-stagger>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">Q</span>
          <h3>Question</h3>
          <p class="qp-tag">Curiosity sparks learning.</p>
          <p class="qp-body">Every meaningful discovery begins with a question. Children meet stories, situations and real-life experiences that invite them to think, predict and connect new concepts with their own experiences.</p>
          <p class="qp-method">Story-based learning · Inquiry-based learning</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">U</span>
          <h3>Understand</h3>
          <p class="qp-tag">Build meaning, not just memory.</p>
          <p class="qp-body">Children make sense of new ideas by connecting them with prior knowledge, discussing possibilities and identifying patterns, so they understand the “why” behind the “what”.</p>
          <p class="qp-method">Visual learning · Concrete-to-abstract learning</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">E</span>
          <h3>Explore</h3>
          <p class="qp-tag">Discover through experience.</p>
          <p class="qp-body">Children investigate, experiment, create, observe and try different approaches to deepen their understanding.</p>
          <p class="qp-method">Experiential learning · Learning by doing</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">S</span>
          <h3>Share</h3>
          <p class="qp-tag">Express and reflect.</p>
          <p class="qp-body">Children explain their thinking, listen to others and learn through discussion and collaboration. Sharing builds empathy, vocabulary and confidence in their own voice.</p>
          <p class="qp-method">Discussion · Collaboration</p>
        </article>
        <article class="qp-card tilt-hover">
          <span class="qp-letter" aria-hidden="true">T</span>
          <h3>Transform</h3>
          <p class="qp-tag">Apply knowledge to the real world.</p>
          <p class="qp-body">Learning moves beyond the lesson as children apply what they have understood, reflect on their progress and use their knowledge in new situations.</p>
          <p class="qp-method">Project-based learning · Problem-based learning</p>
        </article>
    </div>
  </div>
  <svg class="wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" style="bottom:-1px;height:70px"><path d="M0 62c260-30 520-28 760-4s460 26 680-8V90H0Z" fill="#fbf8f1"/></svg>
</section>

<section class="sec stage-tabs" id="stages" data-tabs aria-labelledby="stages-title">
  <img class="deco wiggle" src="{{ asset('frontend/assets/acad-star.png') }}" alt="" width="132" height="122" loading="lazy" style="position:absolute;left:5%;top:120px;width:100px">
  <img class="deco float" src="{{ asset('frontend/assets/acad-sun.png') }}" alt="" width="150" height="128" loading="lazy" style="position:absolute;right:6%;top:60px;width:130px">
  <div class="stage">
    <div class="g-head rv">
      <h2 class="h2" id="stages-title">Where the joy of <span class="accent br">learning begins.</span></h2>
      <p class="copy-18">The early years shape how children experience the world, build relationships and approach learning.</p>
      <div class="tabs" role="tablist" aria-label="School stages">
        <button role="tab" id="tab-foundational" aria-controls="panel-foundational" aria-selected="true">Foundational</button>
        <button role="tab" id="tab-primary" aria-controls="panel-primary" aria-selected="false" tabindex="-1">Primary</button>
        <button role="tab" id="tab-middle" aria-controls="panel-middle" aria-selected="false" tabindex="-1">Middle</button>
        <button role="tab" id="tab-secondary" aria-controls="panel-secondary" aria-selected="false" tabindex="-1">Secondary</button>
      </div>
    </div>
    <div class="panel" id="panel-foundational" role="tabpanel" aria-labelledby="tab-foundational">
      <img src="{{ asset('frontend/assets/academics/stage-foundational.webp') }}" alt="Young learners reading a storybook and playing with ABC blocks in a bright classroom" width="1120" height="1276" loading="lazy" style="max-width:340px;margin:0 auto">
      <div class="copy">
        <span class="kicker">Foundational Stage · Play School to Class 2</span>
        <h3>Where Little Learners Take Their First Steps</h3>
        <p class="copy-18">At Ananya, the Foundational Stage focuses on language, early numeracy, movement, play, imagination and social-emotional development. Stories, conversations, games, music and hands-on activities help children make sense of the world around them. We give young learners opportunities to explore at their own pace, express themselves and develop the confidence to try something new.</p>
        <ul class="ticks cols"><li>Play-based and activity-based learning</li><li>Early language, number sense and motor skills</li><li>Storytelling, rhymes, music, movement and art</li><li>Sensory and outdoor play</li><li>Social and emotional learning: sharing, kindness and confidence</li></ul>
        <ul class="chips" aria-label="Classes"><li>Play School</li><li>Nursery</li><li>Jr. KG</li><li>Sr. KG</li><li>Class 1</li><li>Class 2</li></ul>
      </div>
    </div>
    <div class="panel" id="panel-primary" role="tabpanel" aria-labelledby="tab-primary" hidden>
      <img src="{{ asset('frontend/assets/academics/stage-primary.webp') }}" alt="Students exploring a plant and reading a science book together" width="765" height="492" loading="lazy" style="max-width:340px;margin:0 auto">
      <div class="copy">
        <span class="kicker">Primary School (Grades 3 to 5)</span>
        <h3>From discovering ideas to making connections.</h3>
        <p class="copy-18">The primary years are a time when curiosity grows into deeper understanding. Children strengthen their reading, writing and mathematical skills while exploring science, the environment, people and the world around them. Through discussions, activities, projects and collaborative tasks, they learn to connect ideas and express their thinking. Alongside academic progress, we encourage independence, responsibility, kindness and a willingness to learn from mistakes.</p>
      </div>
    </div>
    <div class="panel" id="panel-middle" role="tabpanel" aria-labelledby="tab-middle" hidden>
      <img src="{{ asset('frontend/assets/academics/stage-middle.webp') }}" alt="Middle school students discussing ideas over books and a laptop" width="1120" height="1276" loading="lazy" style="max-width:300px;margin:0 auto">
      <div class="copy">
        <span class="kicker">Middle School (Grades 6 to 8)</span>
        <h3>Thinking deeper. Looking wider.</h3>
        <p class="copy-18">As children grow, their questions become more complex and their perspectives begin to widen. Middle school learning encourages students to analyse information, consider different viewpoints, investigate problems and work with greater independence. Subject knowledge is strengthened through application, discussion, research and interdisciplinary connections. Students also begin to understand their interests, recognise their strengths and take greater ownership of their learning.</p>
      </div>
    </div>
    <div class="panel" id="panel-secondary" role="tabpanel" aria-labelledby="tab-secondary" hidden>
      <img src="{{ asset('frontend/assets/academics/stage-secondary.webp') }}" alt="Senior students with Physics, Chemistry and Mathematics books, working with their teacher" width="1120" height="1276" loading="lazy" style="max-width:300px;margin:0 auto;border-radius:150px 150px 20px 20px">
      <div class="copy">
        <span class="soon-badge">Coming soon</span>
        <span class="kicker">Secondary &amp; Senior Secondary School</span>
        <h3>Preparing for the choices ahead.</h3>
        <p class="copy-18">Coming soon: programme details and grade availability will be announced soon. The next chapter of the Ananya learning journey is taking shape.</p>
        <button class="btn btn-apply" type="button" data-enquire data-notify-me data-source="notify-secondary" data-title="Notify Me When Available" data-text="Leave your details and we will let you know as soon as Classes 9 to 12 open for admission.">Notify Me When Available <svg class="arrow"><use href="#i-arrow"/></svg></button>
      </div>
    </div>
  </div>
</section>

<section class="sec bg-sky as" id="assessment" aria-labelledby="assess-title">
  <div class="stage">
    <div class="sec-head rv as-head">
      <span class="kicker">Assessment &amp; Evaluation</span>
      <h2 class="h2" id="assess-title">Assessment <span class="accent">@@Ananya</span></h2>
      <p class="copy-18">Assessment at Ananya is intended to do more than measure performance. It helps teachers understand what children have learnt, where they need support and what the next step should be. Through appropriate assessments, classroom observations, assignments, projects and feedback, we aim to make learning progress visible.</p>
    </div>
    <ol class="as-steps" data-stagger aria-label="How we assess">
        <li class="as-step">
          <span class="as-num" aria-hidden="true">01</span>
          <h3>Observe.</h3>
          <p>How the child participates, explains and approaches a task.</p>
        </li>
        <li class="as-step">
          <span class="as-num" aria-hidden="true">02</span>
          <h3>Look at evidence.</h3>
          <p>Class work, conversations, activities, projects and demonstrations.</p>
        </li>
        <li class="as-step">
          <span class="as-num" aria-hidden="true">03</span>
          <h3>Give feedback.</h3>
          <p>Identify what is going well and what the child can try next.</p>
        </li>
        <li class="as-step">
          <span class="as-num" aria-hidden="true">04</span>
          <h3>Plan next steps.</h3>
          <p>Use what teachers notice to guide further practice or challenge.</p>
        </li>
    </ol>
    <p class="as-close rv">Children are encouraged to reflect on their work, recognise areas for improvement and understand that progress comes through effort, practice and guidance.</p>
  </div>
</section>

<section class="brighter" aria-labelledby="bright-title">
  <div class="stage" style="height:100%">
    <div class="copy rv" data-rv="left">
      <h2 class="h2" id="bright-title">Give Your Child a <span class="br">Brighter <span class="accent">Tomorrow.</span></span></h2>
      <p class="copy-dm">Admissions are open for the academic year starting April 2027. Talk to our team about the right class for your child.</p>
      <div class="btn-row"><a class="btn btn-apply" href="{{ route('admissions') }}#enquire">Apply for Admission <svg class="arrow"><use href="#i-arrow"/></svg></a><a class="btn btn-outline" href="{{ route('admissions') }}#visit">Book a Campus Visit</a></div>
    </div>
    <img class="art rv" data-rv="right" src="{{ asset('frontend/assets/give-child.png') }}" alt="Parents and their daughter reviewing admission material with an Ananya counsellor" width="817" height="413" loading="lazy">
  </div>
</section>
@endsection
