
$(document).ready(function(){

  $('#datetimepicker1').datetimepicker({
    format: 'MM/DD/YYYY' 
  });

  $('input[name="order_type"]').each(function(){
    $(this).change(function(){
      var value = $(this).val();
      // clear all values
      $(this).parent().parent().siblings('.hidden-fields').find('span').text("");
      $(this).parent().parent().siblings('.hidden-fields').find('input').val("");
      // hide everything and remove required
      $('.hidden-fields').hide();
      $('.hidden-fields input').prop('required',false);
      // make correct input requried
      $('#'+value+'-fields').show();
      $('#'+value+'-fields input').prop('required',true);
    });
  });

  $('input[name="litres_amount"]').on('change keyup keydown input',function(){
    var value = $(this).val();
    var price = $('input[name="daily_price"]').val();
    var span_sub_total = $(this).parent().siblings('.form-group').find('span.sub-total');
    var span_tax = $(this).parent().siblings('.form-group').find('span.tax');
    var span_total = $(this).parent().siblings('.form-group').find('span.total');

    // generate subtotal
    var sub_total = value * price;

    // tax
    var tax = sub_total * .05;

    // total
    var total = sub_total + tax;

    if (value >= 0){
      span_sub_total.text('$'+sub_total.toFixed(2));
      span_tax.text('$'+tax.toFixed(2));
      span_total.text('$'+total.toFixed(2));
    }
  });

  $('input[name="amount"]').on('change keyup keydown input',function(){
    var value = $(this).val();
    var price = $('input[name="daily_price"]').val();
    var span_sub_total = $(this).parent().siblings('.form-group').find('span.sub-total');
    var span_tax = $(this).parent().siblings('.form-group').find('span.tax');
    var span_total = $(this).parent().siblings('.form-group').find('span.total');

    // get divisor of 5% tax rate
    var diviser = (5/100) + 1;

    var sub_total = value/diviser;
    
    var tax = value-sub_total;

    var total = sub_total/price;

    if (value >= 0){
      span_sub_total.text('$'+sub_total.toFixed(2));
      span_tax.text('$'+tax.toFixed(2));
      span_total.text(total.toFixed(2) + 'L');
    }
  });

  $('.payment-method input').on('change', function(){
    if ( !$('#credit_payment_methods').hasClass('hidden')){
      $('#credit_payment_methods').addClass('hidden');
      $('#credit_payment_methods select').prop('required',false); 
    }
  });

  $(':radio[value="Credit Card"]').on('change', function(){ 
    $('#credit_payment_methods').toggleClass('hidden'); 
    $('#credit_payment_methods select').prop('required',true); 
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


  // Additional Delivery Form Validation
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#delivery-submit").on('click', function(event){

      // prevent submission
      event.preventDefault();

      //check fields
      var fields_array = ['order_type', 
                          'date', 
                          'first_name',
                          'last_name', 
                          'address', 
                          'city', 
                          'postal_code', 
                          'email', 
                          'phone',
                          'payment_method',
                          'location',
                        ];

      var errors = [];

      // iterate our fields to validate
      for (var x=0; x < fields_array.length; x++) {

        var input = $("input[name='" + fields_array[x] + "']");

        if (input.attr('type') === 'radio'){

          if($("input[name='" + fields_array[x] + "']:checked").length <=0) {
            errors.push(fields_array[x]);
          }

        } else {

          if ( !input.val() ) {
            // add it to errors list
            input.css('border', '1px solid red');
            errors.push(fields_array[x]);
          }

        }

      }

      // if there are errors present
      if ( errors.length > 0 ) {

       

        // prepare message
        var message = "<p>Oops, looks you missed some required information. Please fill out the field(s) listed below.</p>";

        // create list of fields
        message += "<ul>"
        for ( var x=0; x < errors.length ; x++) {
          var field_title = toTitleCase( errors[x].replace("_", " ") );
          message += "<li>" + field_title + "</li>";
        }
        message += "</ul>";

        if ( $(".page-content .alert.alert-danger").length > 0){
          $(".page-content .alert.alert-danger").remove();
        }

        $(".page-content").prepend("<div class='alert alert-danger'>" + message + "</div>");

        $('html,body').animate({
          scrollTop: $('.alert.alert-danger').offset().top},
          'slow');

        return false;

      } else {
        console.log(errors.length);
        $("#delivery-form").submit();
      
      }

     
    });


    function toTitleCase(str)
    {
      return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
});