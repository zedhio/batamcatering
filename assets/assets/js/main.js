$(document).ready(function () {

  $(".testimonial__slider").owlCarousel({
    loop: true,
    dots: true,
    nav: false,
    autoplay: true,
    slideSpeed: 300,
    paginationSpeed: 500,
    items: 1,
  });

});

//  scroll
var pxShow = 400;
var fadeInTime = 400;
var fadeOutTime = 400;
var scrollSpeed = 400;
$(window).scroll(function () {
  if ($(window).scrollTop() >= pxShow) {
    $("#backtotop").fadeIn(fadeInTime);
  } else {
    $("#backtotop").fadeOut(fadeOutTime);
  }
});

$("#backtotop a").click(function () {
  $("html, body").animate(
    {
      scrollTop: 0,
    },
    scrollSpeed
  );
  return false;
});

$("#paketTab .paket-selector").on("click", function (e) {
  e.preventDefault();
  $(this).tab("show");
});
