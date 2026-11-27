// Client-side validation (jQuery Validation) for every <form class="js-validate">.
// Rules are written in the HTML as attributes, e.g. required, maxlength="255",
// type="email", data-rule-minlength="8", data-rule-equalto="#password".
// Laravel still validates again on the server, so this is only for a faster UX.
$(function () {
  // Field name used in messages, taken from the field label (without the * mark).
  function fieldName(element) {
    var text = $('label[for="' + element.id + '"]').first().text().replace('*', '').trim().toLowerCase();
    return text || element.name;
  }

  // Messages in the same style as Laravel, e.g. "The email address field is required."
  $.extend($.validator.messages, {
    required: function (params, element) { return 'The ' + fieldName(element) + ' field is required.'; },
    email: function (params, element) { return 'The ' + fieldName(element) + ' must be a valid email address.'; },
    maxlength: function (params, element) { return 'The ' + fieldName(element) + ' must not be greater than ' + params + ' characters.'; },
    minlength: function (params, element) { return 'The ' + fieldName(element) + ' must be at least ' + params + ' characters.'; },
    equalTo: function (params, element) { return 'The ' + fieldName(element) + ' must match the ' + fieldName($(params)[0]) + '.'; }
  });
  // At least 1 lowercase, 1 uppercase and 1 number (same as the server rule).
  $.validator.addMethod('strongpassword', function (value, element) {
    return this.optional(element) || (/[a-z]/.test(value) && /[A-Z]/.test(value) && /\d/.test(value));
  }, function (params, element) {
    return 'The ' + fieldName(element) + ' must contain an upper case letter, a lower case letter and a number.';
  });

  // One of two files is needed (photo gallery: list image or inner image).
  $.validator.addMethod('requiredwithout', function (value, element, other) {
    return value !== '' || $(other).val() !== '';
  }, 'Please upload a list image or an inner image.');

  // Image upload: JPG, PNG or WEBP, up to 2 MB (same as the server rule).
  $.validator.addMethod('imagefile', function (value, element) {
    if (this.optional(element) || !element.files || !element.files.length) { return true; }
    var file = element.files[0];
    return /\.(jpe?g|png|webp)$/i.test(file.name) && file.size <= 2 * 1024 * 1024;
  }, function (params, element) {
    return 'The ' + fieldName(element) + ' must be a JPG, PNG or WEBP file up to 2 MB.';
  });

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
