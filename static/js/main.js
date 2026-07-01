document.addEventListener('DOMContentLoaded', function () {
  /* Email obfuscation */
  var el = document.getElementById('ab-contact');
  if (el) {
    var u = 'info', d = 'altrabolletta.it';
    el.href = 'mailto:' + u + '@' + d;
    el.textContent = u + '@' + d;
  }
});
