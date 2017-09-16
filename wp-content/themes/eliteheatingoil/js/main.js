
$(document).ready(function(){
  /// HERO SLIDER ///
  $('.hero-slider').slick({
    dots: true,
    infinite: false,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 3000,
  });

  // /// ANIMATE CARDS ON LOAD ///
  // $(".card").each(function() {
  //   if ($(this).isOnScreen()) {
  //     $(this).addClass("animated fadeInUp");
  //     $(this).css('visibility', 'visible');
  //   }
  // });

  // /// ANIMATE SPECIAL OFFER ON LOAD ///
  // if ($('.special-offer').isOnScreen()) {
  //   $('.special-offer').addClass("animated fadeIn");
  //   $('.special-offer').css('visibility', 'visible');
  // }


  // /// ANIMATE CARDS AND SPECIAL OFFER ON SCROLL ///
  // $(window).on('scroll', function() {
  //   $(".card").each(function() {
  //       if (isScrolledIntoView($(this))) {
  //         if (!$(this).hasClass('animated')){
  //           $(this).addClass("animated fadeInUp");
  //           $(this).css('visibility', 'visible');
  //         }
  //       }
  //   });

  //   if (isScrolledIntoView($('.special-offer'))) {
  //     if( !$('.special-offer').hasClass('animated')){
  //       $('.special-offer').addClass("animated fadeIn");
  //       $('.special-offer').css('visibility', 'visible');
  //     }
  //   }
  // });

  /// BURGER MENU CHANGE ///
  $('.burger-menu-btn').click(function(){
      if ( $(this).hasClass('is-active') ){
        $(this).removeClass('is-active');
        $('.mobile-nav').removeClass('open');
      } else {
        $(this).addClass('is-active');
        $('.mobile-nav').addClass('open');
      }

      $(this).addClass('burger-disabled');
      setTimeout(function() {
          $('.burger-menu-btn').removeClass('burger-disabled');
      }, 200);

  });

});


// function isScrolledIntoView(elem) {
//   var docViewTop = $(window).scrollTop();
//   var docViewBottom = docViewTop + $(window).height();

//   var elemTop = $(elem).offset().top;
//   var elemBottom = elemTop + $(elem).height();

//   return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
// }

// $.fn.isOnScreen = function(){
//     var viewport = {};
//     viewport.top = $(window).scrollTop();
//     viewport.bottom = viewport.top + $(window).height();
//     var bounds = {};
//     bounds.top = this.offset().top;
//     bounds.bottom = bounds.top + this.outerHeight();
//     return ((bounds.top <= viewport.bottom) && (bounds.bottom >= viewport.top));
// };