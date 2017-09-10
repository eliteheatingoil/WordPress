
$(document).ready(function(){
  $('.hero-slider').slick({
    dots: true,
    infinite: false,
    speed: 300,
  });

  $(".card").each(function() {
    if ($(this).isOnScreen()) {
      $(this).addClass("animated fadeInUp");
      $(this).css('visibility', 'visible');
    } else {
      $(window).on('scroll', function() {
        $(".card").each(function() {
            if (isScrolledIntoView($(this))) {
              $(this).addClass("animated fadeInUp");
              $(this).css('visibility', 'visible');
            }
        });
      });
    }
  });


});

function isScrolledIntoView(elem) {
  var docViewTop = $(window).scrollTop();
  var docViewBottom = docViewTop + $(window).height();

  var elemTop = $(elem).offset().top;
  var elemBottom = elemTop + $(elem).height();

  return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$.fn.isOnScreen = function(){
    var viewport = {};
    viewport.top = $(window).scrollTop();
    viewport.bottom = viewport.top + $(window).height();
    var bounds = {};
    bounds.top = this.offset().top;
    bounds.bottom = bounds.top + this.outerHeight();
    return ((bounds.top <= viewport.bottom) && (bounds.bottom >= viewport.top));
};