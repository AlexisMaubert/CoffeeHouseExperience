$(function () {
    $(document).scroll(function () {
      var $but = $(".volver");
      $but.toggleClass('scrolled', $(this).scrollTop() > $but.height());
    });
  });
  