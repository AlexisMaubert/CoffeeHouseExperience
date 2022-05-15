$(function () {
    $(document).scroll(function () {
      var $but = $(".volver");
      $but.toggleClass('scrolled', $(this).scrollTop() > $but.height());
    });
  });
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});