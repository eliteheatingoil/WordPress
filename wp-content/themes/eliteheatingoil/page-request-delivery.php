<?php get_header(); ?>
<?php get_template_part('partials/hero'); ?>
<div class="container">

<div class="page-content col-xs-12 col-sm-10 col-sm-offset-1">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li class="breadcrumb-item active"><?php the_title(); ?></li>
    </ol>

    <div class="page-title">
        <h1>Request a Delivery</h1>
    </div>
    <div class="page-body">
        <form action="POST" action="<?php echo get_bloginfo( 'template_directory' );?>/services/request_delivery.php">
            <h4>Order Type<span class="required">*</span></h4>
            <div class="form-section">
                <div class="col-sm-4">
                    <label for="fill"><input type="radio" name="fill" value="">Fill</label>
                </div>
                <div class="col-sm-4">
                    <label for="liters"><input type="radio" name="liters" value="">Liters</label>
                </div>
                <div class="col-sm-4">
                    <label for="amount"><input type="radio" name="amount" value="">Amount ($)</label>
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
                    <input type="text" name="first_name" value="" class="form-control" required>
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
                    <label for="phone">Phone<span class="required">*</span></label>
                    <input type="tel" name="phone" value="" class="form-control" required>
                </div>
            </div>
            <div style="clear:both;"></div>

            <h4>Payment Information</h4>
            <div class="form-section">
                <div class="col-sm-12 form-group payment-method">
                    <p>Please choose your payment method below.</p>
                    
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="" required>Visa (on file)
                    </label>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="" required>Mastercard (on file)
                    </label>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="" required>Debit
                    </label>
                    <label for="payment_method">
                        <input type="radio" name="payment_method" value="" required>Email Money Transfer
                    </label>
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