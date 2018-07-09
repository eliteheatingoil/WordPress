<?php include(get_template_directory() . '/services/request_delivery.php'); ?>
<?php
$the_query = new WP_Query(array(
  'post_type'			=> 'oil_price',
  'posts_per_page'	=> 1,
  'order'				=> 'DESC'
));
?>

<?php if( $the_query->have_posts() ): ?>
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
        $price = get_field('price');
    endwhile;
endif;
?>

<?php get_header(); ?>
<?php get_template_part('partials/hero'); ?>
<?php get_template_part('partials/todays-price'); ?>
<div class="container">

<div class="page-content col-xs-12 col-sm-10 col-sm-offset-1">

    <?php if($emailSent): ?>
        <div class="alert alert-success">
            Your delivery request has been submitted!
        </div>
    <?php elseif ($emailFailed): ?>
        <div class="alert alert-danger">
            There was an error submitting your delivery request. Please try again.
        </div>
    <?php endif; ?>

    <?php if($hasError): ?>
        <div class="alert alert-warning">
            There was an error submitting your delivery request. Please try again.
        </div>
    <?php endif; ?>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li class="breadcrumb-item active">Request a Delivery</li>
    </ol>

    <div class="page-title">
        <h1>Request a Delivery</h1>
    </div>

    <div class="page-body">

        <form method="POST" action="<?php echo esc_url( home_url( '/' ) ); ?>request-delivery" id="delivery-form">
            <input type="hidden" name="daily_price" value="<?php echo $price ?>">
            <h4>Order Type <span class="required">*</span></h4>
            <div class="form-section">
                <div class="col-sm-4">
                    <label for="fill"><input type="radio" name="order_type" id="fill" value="fill" required>Fill</label>
                </div>
                <div class="col-sm-4">
                    <label for="litres"><input type="radio" name="order_type" id="litres" value="litres" required>Litres</label>
                </div>
                <div class="col-sm-4">
                    <label for="amount"><input type="radio" name="order_type" id="amount" value="amount" required>Amount ($)</label>
                </div>
                <div class="row hidden-fields" id="litres-fields">
                    <div class="litres_amount form-group col-sm-12">
                        <label for="litres_amount">Quantity: <span class="required">*</span></label>
                        <input type="number" name="litres_amount" value="" class="form-control"><span> &times; $<?php echo $price ?> </span>
                    </div>
                    <div class="form-group col-xs-4">
                        <p>Subtotal: <span class="sub-total"></span></p>
                    </div>
                    <div class="form-group col-xs-4">
                        <p>Tax (5%): <span class="tax"></span></p>
                    </div>                                        
                    <div class="form-group col-xs-4">
                        <p>Total: <span class="total"></span></p>
                    </div>
                </div>
                <div class="row hidden-fields" id="amount-fields">
                    <div class="litres_amount form-group col-sm-12">
                        <label for="amount">Dollars: <span class="required">*</span></label>
                        $ <input type="number" min="1" name="amount" value="" class="form-control">
                    </div>
                    <div class="form-group col-xs-4">
                        <p>Subtotal: <span class="sub-total"></span></p>
                    </div>
                    <div class="form-group col-xs-4">
                        <p>Tax (5%): <span class="tax"></span></p>
                    </div>                                        
                    <div class="form-group col-xs-4">
                        <p>Total Litres: <span class="total"></span></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group delivery-date">
                        <label for="date">Requested Delivery Date <span class="required">*</span></label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="date" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            <div style="clear:both;"></div>
            </div>

            <h4>Contact Information</h4>
            <div class="form-section">
                <div class="col-sm-6 form-group">
                    <label for="first_name">First Name <span class="required">*</span></label>
                    <input type="text" name="first_name" value="" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="last_name">Last Name <span class="required">*</span></label>
                    <input type="text" name="last_name" value="" class="form-control" required>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="address">Street Address <span class="required">*</span></label>
                    <input type="text" name="address" value="" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="city">City <span class="required">*</span></label>
                    <input type="text" name="city" value="" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="postal_code">Postal Code <span class="required">*</span></label>
                    <input type="text" name="postal_code" value="" class="form-control" required>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="text" name="email" value="" class="form-control" required>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="phone">Phone <span class="required">*</span> <span class="text-muted">(&times;&times;&times;-&times;&times;&times;-&times;&times;&times;&times;)</span></label>
                    <input type="tel" name="phone" value="" class="form-control" required>
                </div>
            <div style="clear:both;"></div>
            </div>

            <h4>Payment Information <span class="required">*</span></h4>
            <div class="form-section">
                <div class="col-sm-12 form-group payment-method">
                    <p class="text-muted">Please choose your payment method below.</p>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="Cash (at the door)" required>Cash (at the door)
                    </label>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="Debit Card (at the door)" required>Debit (at the door)
                    </label>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="Credit Card" required>Credit Card (Visa, Mastercard, and American Express)
                    </label>
                    <div class="col-sm-4 hidden" id="credit_payment_methods">
                        <select class="form-control" name="credit_options">
                            <option value="">--- Select an option ---</option>
                            <option value="At the door">At the door</option>
                            <option value="Over the phone">Over the phone</option>
                            <option value="Information on file">Information on file</option>
                        </select>
                    </div>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="interac" required>Interac E-Transfer (2 cents per litre discount)
                    </label>
                </div>
            <div style="clear:both;"></div>
            </div>

            <h4>Tank Location <span class="required">*</span></h4>
            <div class="form-section">
                <div class="location-widget">
                    <div class="location-wrapper location-back">
                        <input type="radio" name="location" value="Back Left" required>
                    </div>
                    <div class="location-wrapper location-back">
                        <input type="radio" name="location" value="Back Right" required>
                    </div>
                    <div class="location-wrapper location-left">
                        <input type="radio" name="location" value="Left Side" required>
                    </div>
                    <div class="home"><span>Home</span></div>
                    <div class="location-wrapper location-right">
                        <input type="radio" name="location" value="Right Side" required>
                    </div>
                    <div class="location-wrapper location-front">
                        <input type="radio" name="location" value="Front Left" required>
                    </div>
                    <div class="location-wrapper location-front">
                        <input type="radio" name="location" value="Front Right" required>
                    </div>
                    <div class="location-wrapper street">
                        <span> <span class="road-dots">- - -</span> ROAD <span class="road-dots">- - -</span></span>
                    </div>
                </div>
            <div style="clear:both;"></div>
            </div>

            <h4>Special Instructions</h4>
            <div class="form-section">
            <div class="form-group">
                <label for="special_instructions" class="sr-only">Special Instructions</label>
                <textarea class="form-control" name="special_instructions"></textarea>
            </div>
            </div>
            <div style="clear:both;"></div>

            <div class="g-recaptcha-wrapper">
<div class="g-recaptcha" data-sitekey="6Lfp1jEUAAAAAIl0IET0Vkjr0v-gub9m2QCpW5Tq" style="transform:scale(0.8);-webkit-transform:scale(0.8);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-orange form-orange" id="delivery-submit" value="Submit">
            </div>
        </form>

    </div>
</div>

</div>

<?php get_footer(); ?>