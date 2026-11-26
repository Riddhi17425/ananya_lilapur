// Website forms (every <form class="js-form">):
// 1. jQuery Validation checks the fields in the browser and shows a message under each one.
// 2. If all is fine, the form is sent with ajax. The server validates again (Laravel) and,
//    when it finds a problem, its message is shown under the same field.
// 3. On success the visitor goes to the thank you page.
// Rules come from the HTML: required, type="email", min / max, maxlength, data-rule-* attributes.
$(function () {
  // Name of a field for the messages: its label, or the placeholder (without the * mark).
  function fieldName(element) {
    var $el = $(element);
    var text = $('label[for="' + element.id + '"]').first().text() ||
               $el.closest('label').find('span').first().text() ||
               $el.attr('placeholder') || element.name;
    return text.replace('*', '').replace('(optional)', '').trim().toLowerCase();
  }
  function isSelect(element) { return element.tagName === 'SELECT'; }

  $.extend($.validator.messages, {
    required: function (params, element) {
      if (element.type === 'checkbox') { return 'Please tick the consent box so we can contact you.'; }
      return (isSelect(element) ? 'Please select ' : 'Please enter ') + fieldName(element) + '.';
    },
    email: 'Please enter a valid email address.',
    maxlength: function (params, element) { return 'Please use no more than ' + params + ' characters for ' + fieldName(element) + '.'; },
    min: function (params, element) { return 'Please enter ' + fieldName(element) + ' of at least ' + params + '.'; },
    max: function (params, element) { return 'Please enter ' + fieldName(element) + ' of at most ' + params + '.'; },
    number: 'Please enter a number.'
  });

  // Mobile number: 10 to 15 digits, may contain + - and spaces (same as the server rule).
  $.validator.addMethod('mobile', function (value, element) {
    return this.optional(element) || /^[0-9+\-\s]{10,15}$/.test(value);
  }, 'Please enter a valid mobile number (10 to 15 digits).');

  // Visit date: today or later.
  $.validator.addMethod('notpast', function (value, element) {
    if (this.optional(element)) { return true; }
    var day = new Date(value);
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    return isNaN(day) || day >= today;
  }, 'Please choose today or a future date.');

  // Résumé: PDF, DOC or DOCX, up to 5 MB (same as the server rule).
  $.validator.addMethod('resume', function (value, element) {
    if (this.optional(element) || !element.files || !element.files.length) { return true; }
    var file = element.files[0];
    return /\.(pdf|docx?)$/i.test(file.name) && file.size <= 5 * 1024 * 1024;
  }, 'Please upload a PDF, DOC or DOCX file up to 5 MB.');

  function remember() { try { sessionStorage.setItem('ananya-enquired', '1'); } catch (e) {} }

  $('form.js-form').each(function () {
    var $form = $(this);
    var $note = $form.find('.form-note');
    var $button = $form.find('[type="submit"]');

    // Rules that are not plain HTML attributes.
    $form.find('input[type="tel"]').attr('data-rule-mobile', 'true');
    $form.find('input[type="date"], input[name="visit_date"], input[type="datetime-local"]').attr('data-rule-notpast', 'true');
    $form.find('input[type="file"]').attr('data-rule-resume', 'true');

    function showNote(message) {
      $note.css('color', '#b23b37').text(message);
      $button.prop('disabled', false);
    }

    var validator = $form.validate({
      errorElement: 'p',
      errorClass: 'field-error',
      validClass: '',
      errorPlacement: function (error, element) {
        // A checkbox sits inside its label, so put the message after the label.
        error.insertAfter(element.is(':checkbox') ? element.closest('label') : element);
      },
      highlight: function (element) { $(element).addClass('is-bad'); },
      unhighlight: function (element) { $(element).removeClass('is-bad'); },
      invalidHandler: function () { $note.text(''); },

      // Runs only when the browser-side check passes.
      submitHandler: function (form) {
        $button.prop('disabled', true);
        $note.text('');

        $.ajax({
          url: form.action,
          method: 'POST',
          data: new FormData(form),
          processData: false,
          contentType: false,
          dataType: 'json',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        }).done(function (response) {
          remember();
          window.location.href = response.redirect;
        }).fail(function (xhr) {
          $button.prop('disabled', false);

          if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
            // Server-side validation failed: show each message under its field.
            var messages = {};
            $.each(xhr.responseJSON.errors, function (field, list) { messages[field] = list[0]; });
            validator.showErrors(messages);
            var $first = $form.find('.is-bad').first();
            if ($first.length) { $first.trigger('focus'); } else { showNote(Object.values(messages)[0]); }
          } else if (xhr.status === 429) {
            showNote('Too many attempts. Please wait a minute and try again.');
          } else if (xhr.status === 419) {
            showNote('This page has expired. Please refresh the page and try again.');
          } else if (xhr.status === 0) {
            showNote('Could not send. Please check your internet connection and try again.');
          } else {
            showNote('Something went wrong. Please try again in a moment.');
          }
        });
      }
    });

    // Fresh start when the form is reset (the pop-up reuses the same form).
    $form.on('reset', function () {
      validator.resetForm();
      $form.find('.is-bad').removeClass('is-bad');
      $note.text('');
    });
  });
});
