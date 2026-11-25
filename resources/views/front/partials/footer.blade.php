<footer class="site-footer">
  <div class="f-waves" aria-hidden="true"><svg class="fw fw-back" viewBox="0 0 2880 70" preserveAspectRatio="none"><path d="M0 0H2880V42Q2520 22 2160 42T1440 42T720 42T0 42Z" fill="currentColor"/></svg><svg class="fw fw-front" viewBox="0 0 2880 70" preserveAspectRatio="none"><path d="M0 0H2880V30Q2700 14 2520 30T2160 30T1800 30T1440 30T1080 30T720 30T360 30T0 30Z" fill="currentColor"/></svg></div>
  <div class="container">
    <div class="statement">
      <p class="h2">Where every child finds <span class="accent">their peak.</span></p>
      <p class="ethos">@yield('footer-ethos', 'Curiosity  |  Character  |  Care')</p>
    </div>
    <div class="info-grid">
      <div class="about">
        <img class="f-logo" src="{{ asset('frontend/assets/logo-white.svg') }}" alt="Ananya International School, Lilapur" width="193" height="50" loading="lazy">
        <p>Ananya International School, Lilapur is a CBSE school for children from Play School to Class 8, designed around curiosity, character and care.</p>
        <p>Opp. Serene 53, Behind Sardar Dham, Lilapur, Ahmedabad-380060, Gujarat.<br><a href="tel:+917990259272">+91 79902 59272</a> · <a href="mailto:admissions@ananyalilapur.org">admissions@ananyalilapur.org</a></p>
      </div>
      <span class="vline"></span>
      <div><h4>Explore</h4><ul><li><a href="{{ route('about') }}">About Us</a></li><li><a href="{{ route('academics') }}">Academics</a></li><li><a href="{{ route('beyond-academics') }}">Beyond Academics</a></li><li><a href="{{ route('campus-facilities') }}">Campus &amp; Facilities</a></li><li><a href="{{ route('careers') }}">Careers</a></li><li><a href="{{ route('contact') }}">Contact Us</a></li></ul></div>
      <span class="vline"></span>
      <div><h4>For Parents</h4><ul><li><a href="{{ route('admissions') }}">Admissions</a></li><li><a href="{{ route('admissions') }}#fees">Fee Structure</a></li><li><a href="{{ route('admissions') }}#faq">FAQs</a></li><li><a href="{{ route('admissions') }}#visit">Book a Campus Visit</a></li><li><a href="{{ route('news-gallery') }}">School News &amp; Gallery</a></li></ul></div>
      <span class="vline dim"></span>
      <div class="visit"><h4>Talk to Us</h4>
        <address>Admissions: <a href="tel:+917990259272">+91 79902 59272</a><br>General enquiries: <a href="tel:+917990259272">+91 79902 59272</a><br>Office hours: Mon to Sat, 8:00 am to 4:00 pm</address>
        <button class="dir enquire-link" type="button" data-enquire>Request a Call Back&nbsp;&nbsp;→</button>
        <a class="ig" href="{{ route('contact') }}#map">Get Directions</a>
      </div>
    </div>
    <div class="hr"></div>
    <div class="legal"><span>© Ananya International School, Lilapur. All rights reserved.</span><span>CBSE · Play School to Class 8</span></div>
  </div>
  <img class="deco sun spin-slow" src="{{ asset('frontend/assets/sun.png') }}" alt="" width="70" height="70" loading="lazy">
  <svg class="deco heart float" style="color:#fff" viewBox="0 0 40 50" aria-hidden="true"><use href="#i-heart"/></svg>
</footer>
