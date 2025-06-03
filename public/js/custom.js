document.querySelectorAll('dropdown-helper-link').forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault(); // stops the page from jumping
    // trigger dropdown or whatever
  });
});