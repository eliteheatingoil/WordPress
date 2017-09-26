
$(document).ready(function(){
  /// HERO SLIDER ///
  $('.hero-slider').slick({
    dots: true,
    infinite: false,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 3000,
  });

  $('#datetimepicker1').datetimepicker({
    format: 'DD/MM/YYYY'
  });

  $('input[name="order_type"]').each(function(){
    $(this).change(function(){
      var value = $(this).val();
      $('.hidden-fields').hide();
      $('#'+value+'-fields').show();
    });
  });

  $('input[name="liters_amount"]').on('change keyup keydown',function(){
    var value = $(this).val();
    var price = $('input[name="daily_price"').val();
    var total = value * price;
    var span = $(this).parent().siblings('.form-group').find('span.total');
    if (value >= 0){
      span.text(total.toFixed(2) + 'Litres');
    }
  });

  $('input[name="amount"]').on('change keyup keydown',function(){
    var value = $(this).val();
    var price = $('input[name="daily_price"').val();
    var total = value/price;
    var span = $(this).parent().siblings('.form-group').find('span.total');
    if (value >= 0){
      span.text(total.toFixed(2) + 'Litres');
    }
  });

  $(':radio[value=credit]').on('change', function(){
    $('#credit_payment_methods').toggleClass('hidden'); 
  });

  $('.payment-method input').on('click', function(){
    if ( !$('#credit_payment_methods').hasClass('hidden')){
      $('#credit_payment_methods').addClass('hidden');
    }
  });

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