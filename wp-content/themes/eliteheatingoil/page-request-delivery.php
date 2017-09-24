<?php

	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:");
	  return str_replace($bad,"",$string);
	}

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $first_name    = stripslashes(trim($_POST['first_name']));
        $last_name    = stripslashes(trim($_POST['last_name']));
        $email   = stripslashes(trim($_POST['email']));
        $phone   = stripslashes(trim($_POST['phone']));
        $address = stripslashes(trim($_POST['address']));
        $city = stripslashes(trim($_POST['city']));
        $postal_code = stripslashes(trim($_POST['postal_code']));
        $subject = 'Delivery Request';    
        $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

        if (preg_match($pattern, $first_name) || preg_match($pattern, $last_name) || preg_match($pattern, $email)) {
            die("Header injection detected");
        }

        $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($first_name && $last_name && $email && $emailIsValid && $subject && $phone) {
            $email_to = $email; // your email address send TO
            $email_from = "support@eliteheatingoil.ca"; // your email address send FROM

            $body = "
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset=\"utf-8\">
                </head>
                <body>
                    <h1>{$subject}</h1>
                    <p> A new delivery request has been submitted. Please see the details below.</p>
                    <h3> Customer Information</h3>
                    <p>Name: {$name}</p>
                    <p>Email: {$email}</p>
                    <p>Phone: {$phone}</p>
                    <p>Address: {$address}, {$city}, {$postal_code}</p>
                </body>
            </html>";
            
            $email_message .= "Full Name: " . clean_string($first_name) . clean_string($last_name) ."\r\n";
            $email_message .= "Reply-To: ".clean_string($email)."\r\n";

            $headers = 'From: '.$email_from."\r\n";
            $headers = 'Reply-To: '.$email."\r\n" ;
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $a = mail($email_to, $subject, $body, $headers);

            if($a){
                $emailSent = true;
            }else{
                $emailFailed = true;
            }
        }
    }
?>

<?php get_header(); ?>
<?php get_template_part('partials/hero'); ?>
<div class="container">

<div class="page-content col-xs-12 col-sm-10 col-sm-offset-1">
    <?php if($emailSent): ?>
        <div class="alert alert-success">
            "email sent"
        </div>
    <?php elseif ($emailFailed): ?>
        <div class="alert alert-danger">
            "email not sent"
        </div>
    <?php endif; ?>
    <?php if($hasError): ?>
        <div class="alert alert-warning">
            "error"
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
        <form method="POST" action="<?php echo esc_url( home_url( '/' ) ); ?>index.php/request-delivery">
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