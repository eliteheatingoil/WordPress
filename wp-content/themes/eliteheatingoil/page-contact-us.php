<?php include(get_template_directory() . '/services/contact_us.php'); ?>

<?php get_header(); ?>
<?php get_template_part('partials/hero'); ?>
<?php get_template_part('partials/todays-price'); ?>
<div class="container">

<div class="page-content col-xs-12 col-sm-10 col-sm-offset-1">

    <?php if($emailSent): ?>
        <div class="alert alert-success">
            Your message has been submitted!

            We will get back to you as soon as we can.
        </div>
    <?php elseif ($emailFailed): ?>
        <div class="alert alert-danger">
            There was an error submitting your contact message. Please try again.
        </div>
    <?php endif; ?>

    <?php if($hasError): ?>
        <div class="alert alert-warning">
            There was an error submitting your contact message. Please try again.
        </div>
    <?php endif; ?>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li class="breadcrumb-item active">Contact Us</li>
    </ol>

    <div class="page-title">
        <h1>Contact Us</h1>
    </div>

    <div class="page-body">

        <form method="POST" action="<?php echo esc_url( home_url( '/' ) ); ?>contact-us">

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
                <div class="col-sm-6 form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" name="email" value="" class="form-control" required>
                </div>
                <div class="col-sm-6 form-group">
                    <label for="phone">Phone<span class="text-muted">(&times;&times;&times;-&times;&times;&times;-&times;&times;&times;&times;)</span></label>
                    <input type="tel" pattern="^\d{3}-\d{3}-\d{4}$" name="phone" value="" class="form-control">
                </div>
            <div style="clear:both;"></div>
            </div>

            <h4>Message <span class="required">*</span></h4>
            <div class="form-section">
            <div class="form-group">
                <label for="special_instructions" class="sr-only">Special Instructions</label>
                <textarea class="form-control" name="special_instructions" required></textarea>
            </div>
            </div>
            <div style="clear:both;"></div>

            <div class="g-recaptcha-wrapper">
<div class="g-recaptcha" data-sitekey="6Lfp1jEUAAAAAIl0IET0Vkjr0v-gub9m2QCpW5Tq" style="transform:scale(0.8);-webkit-transform:scale(0.8);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-orange form-orange" value="Submit">
            </div>
        </form>

    </div>
</div>

</div>

<?php get_footer(); ?>