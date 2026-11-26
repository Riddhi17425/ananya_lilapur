// Open / close the sidebar on small screens
document.querySelectorAll('[data-sidebar-toggle]').forEach(function (el) {
  el.addEventListener('click', function () {
    document.body.classList.toggle('sidebar-open');
  });
});

// Rich text editor (Summernote) for any <textarea class="js-editor">.
$(function () {
  $('textarea.js-editor').summernote({
    height: 200,
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link']],
      ['view', ['codeview']]
    ],
    callbacks: {
      onChange: function (contents) { $(this).val(contents); }
    }
  });
});
