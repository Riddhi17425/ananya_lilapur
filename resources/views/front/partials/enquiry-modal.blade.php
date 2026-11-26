<button class="tiger-help" type="button" data-enquire data-source="mascot-helper" aria-label="Questions? Ask our admissions team"><span class="bubble">Questions? <b>Ask me!</b></span><img src="{{ asset('frontend/assets/mascot/tiger-head.webp') }}" alt="" width="333" height="300"></button>

<a class="mobile-apply" href="{{ route('admissions') }}#enquire">Apply for Admission <svg class="arrow"><use href="#i-arrow"/></svg></a>

<div class="modal" id="enquiry-modal" hidden>
  <div class="modal-scrim" data-close></div>
  <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="m-title">
    <button class="modal-x" type="button" data-close aria-label="Close">×</button>
    <img class="modal-tiger" src="{{ asset('frontend/assets/mascot/tiger-head.webp') }}" alt="" width="333" height="300">
    <h2 id="m-title" data-m-title>Plan Your Child’s Journey With Ananya</h2>
    <p class="m-text" data-m-text>Share a few details and our admissions team will call you within one working day to answer your questions and arrange a campus visit.</p>
    <form class="js-form" action="{{ route('inquiries.store', 'enquire') }}" method="POST" data-thanks="Thank you. Our admissions team will reach out to you shortly." novalidate>
      <input type="hidden" name="source" value="popup" data-m-source>
      <div class="f-grid">
        <label class="fl"><span>Parent’s Name*</span><input class="field" id="m-parent" name="parent" required autocomplete="name"></label>
        <label class="fl"><span>Mobile Number*</span><input class="field" id="m-mobile" name="mobile" type="tel" required autocomplete="tel" pattern="[0-9+\-\s]{10,15}"></label>
        <label class="fl"><span>Email*</span><input class="field" id="m-email" name="email" type="email" required autocomplete="email"></label>
        <label class="fl"><span>Child’s Name*</span><input class="field" id="m-child" name="child" required></label>
        <label class="fl"><span>Class Applying For*</span><select class="field" id="m-class" name="class" required>
          <option value="" disabled selected hidden>Select a class</option>
           <option>Class 1</option><option>Class 2</option><option>Class 3</option><option>Class 4</option><option>Class 5</option><option>Class 6</option><option>Class 7</option><option>Class 8</option><option data-notify hidden>Class 9 to 12 (notify me)</option>
        </select></label>
        <label class="fl"><span>Preferred Campus Visit Date (optional)</span><input class="field" id="m-date" name="visit_date" type="date"></label>
      </div>
      <label class="consent"><input type="checkbox" id="m-consent" name="consent" required> I agree to be contacted by Ananya International School, Lilapur.</label>
      <button class="btn btn-apply" type="submit">Request a Call Back <svg class="arrow"><use href="#i-arrow"/></svg></button>
      <p class="form-note" role="status" aria-live="polite"></p>
    </form>
  </div>
</div>


