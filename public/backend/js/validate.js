// Client-side validation (jQuery Validation) for every <form class="js-validate">.
// Rules are written in the HTML as attributes, e.g. required, maxlength="255",
// type="email", data-rule-minlength="8", data-rule-equalto="#password".
// Laravel still validates again on the server, so this is only for a faster UX.
$(function () {
  // At least 1 lowercase, 1 uppercase and 1 number (same as the server rule).
  $.validator.addMethod('strongpassword', function (value, element) {
    return this.optional(element) || (/[a-z]/.test(value) && /[A-Z]/.test(value) && /\d/.test(value));
  }, 'Use upper and lower case letters and a number.');

  $('form.js-validate').each(function () {
    $(this).validate({
      errorElement: 'p',
      errorClass: 'field__error',
      validClass: '',
      // Place the message under the input (after the password toggle wrapper).
      errorPlacement: function (error, element) {
        error.insertAfter(element.closest('.field__wrap').length ? element.closest('.field__wrap') : element);
      },
      highlight: function (element) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element) {
        $(element).removeClass('is-invalid');
      },
      // Runs only when the form is valid: stop double submits, then submit.
      submitHandler: function (form) {
        $(form).find('button[type="submit"]').prop('disabled', true).addClass('is-loading');
        form.submit();
      }
    });

    // Clear the error sent by Laravel as soon as the user edits that field.
    $(this).on('input change', 'input, textarea, select', function () {
      $(this).removeClass('is-invalid').closest('.field').find('.field__error--server').remove();
    });
  });

  // Show / hide password (kept here so it works on every page that has the toggle).
  $(document).on('click', '[data-toggle-password]', function () {
    var $button = $(this);
    var $input = $button.siblings('input');
    var show = $input.attr('type') === 'password';

    $input.attr('type', show ? 'text' : 'password');
    $button.toggleClass('is-visible', show).attr('aria-label', show ? 'Hide password' : 'Show password');
  });
});
