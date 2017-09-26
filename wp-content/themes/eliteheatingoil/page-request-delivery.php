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
<div class="container">

<div class="page-content col-xs-12 col-sm-10 col-sm-offset-1">

    <?php if($emailSent): ?>
        <div class="alert alert-success">
            email sent
        </div>
    <?php elseif ($emailFailed): ?>
        <div class="alert alert-danger">
            email not sent
        </div>
    <?php endif; ?>

    <?php if($hasError): ?>
        <div class="alert alert-warning">
            error
        </div>
    <?php endif; ?>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li class="breadcrumb-item active"><?php the_title(); ?></li>
    </ol>

    <div class="page-title">
        <h1>Request a Delivery</h1>
    </div>

    <div class="page-body">

        <form method="POST" action="<?php echo esc_url( home_url( '/' ) ); ?>request-delivery">
            <input type="hidden" name="daily_price" value="<?php echo $price ?>">
            <h4>Order Type<span class="required">*</span></h4>
            <div class="form-section">
                <div class="col-sm-4">
                    <label for="fill"><input type="radio" name="order_type" value="fill">Fill</label>
                </div>
                <div class="col-sm-4">
                    <label for="liters"><input type="radio" name="order_type" value="liters">Litres</label>
                </div>
                <div class="col-sm-4">
                    <label for="amount"><input type="radio" name="order_type" value="amount">Amount ($)</label>
                </div>
                <div class="row hidden-fields" id="liters-fields">
                    <div class="liters_amount form-group col-sm-6">
                        <label for="liters_amount">Quantity:</label>
                        <input type="number" name="liters_amount" value="" class="form-control"><span> &times; $<?php echo $price ?> </span>
                    </div>
                    <div class="form-group col-sm-12">
                        <p>Total: <span class="total"><p>
                    </div>
                </div>
                <div class="row hidden-fields" id="amount-fields">
                    <div class="liters_amount form-group col-sm-6">
                        <label for="liters_amount">Dollars:</label>
                        $<input type="number" min="1" name="amount" value="" class="form-control">
                    </div>
                    <div class="form-group col-sm-12">
                        <p>Total: <span class="total"><p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group delivery-date">
                        <label for="date">Requested Delivery Date <span class="required">*</span></label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="date"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>

            <h4>Contact Information</h4>
            <div class="form-section">
                <div class="col-sm-6 form-group">
                    <label for="first_name">First Name <span class="required">*</span></label>
                    <input type="text" name="first_name" value="" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="last_name">Last Name<span class="required">*</span></label>
                    <input type="text" name="last_name" value="" class="form-control" required>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="address">Street Address<span class="required">*</span></label>
                    <input type="text" name="address" value="" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="city">City<span class="required">*</span></label>
                    <input type="text" name="city" value="" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="postal_code">Postal Code<span class="required">*</span></label>
                    <input type="text" name="postal_code" value="" class="form-control" required>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="email">Email<span class="required">*</span></label>
                    <input type="email" name="email" value="" class="form-control" required>
                </div>
                <div class="col-sm-12 form-group">
                    <label for="phone">Phone<span class="required">*</span> <span class="text-muted">(&times;&times;&times;-&times;&times;&times;-&times;&times;&times;&times;)</span></label>
                    <input type="tel" pattern="^\d{3}-\d{3}-\d{4}$" name="phone" value="" class="form-control" required>
                </div>
            </div>
            <div style="clear:both;"></div>

            <h4>Payment Information</h4>
            <div class="form-section">
                <div class="col-sm-12 form-group payment-method">
                    <p>Please choose your payment method below.</p>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="cash" required>Cash (at the door)
                    </label>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="debit" required>Debit (at the door)
                    </label>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="credit" required>Credit Card (Visa & Mastercad)
                    </label>
                    <div class="col-sm-4 hidden" id="credit_payment_methods">
                        <select class="form-control">
                            <option value="">--- Select an option ---</option>
                            <option value="at_the_door">At the door</option>
                            <option value="over_the_phone">Over the phone</option>
                        </select>
                    </div>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="interac" required>Interac E-Transfer (2 cents per litre discount)
                    </label>
                </div>
            </div>
            <div style="clear:both;"></div>

            <h4>Tank Location</h4>
            <div class="form-section">
                <div class="location-widget">
                    <div class="location-wrapper location-back">
                        <input type="radio" name="location" value="back">
                    </div>
                    <div class="location-wrapper location-left">
                        <input type="radio" name="location" value="left">
                    </div>
                    <div class="home"><span>Home</span></div>
                    <div class="location-wrapper location-right">
                        <input type="radio" name="location" value="right">
                    </div>
                    <div class="location-wrapper location-front">
                        <input type="radio" name="location" value="front">
                    </div>
                    <div class="location-wrapper street">
                        <span> <span class="road-dots">- - -</span> ROAD <span class="road-dots">- - -</span></span>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>

            <div class="g-recaptcha" data-sitekey="6Lfp1jEUAAAAAIl0IET0Vkjr0v-gub9m2QCpW5Tq"></div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>

    </div>
</div>

</div>

<?php get_footer(); ?>