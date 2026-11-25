// Open / close the sidebar on small screens
document.querySelectorAll('[data-sidebar-toggle]').forEach(function (el) {
  el.addEventListener('click', function () {
    document.body.classList.toggle('sidebar-open');
  });
});
