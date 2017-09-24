<?php
$template_direcotry = get_template_directory();

// require_once($template_direcotry . '/services/recaptchalib.php');



// $recaptcha_html = recaptcha_get_html($publickey);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $publickey = "6Lfp1jEUAAAAAIl0IET0Vkjr0v-gub9m2QCpW5Tq";
    $privatekey = "6Lfp1jEUAAAAAIiAii6t4ahXE3iUc9l84bUXvx0g";

    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverifysecret=" . $privatekey . "&response=".$recaptchaResponse);
    $resp = json_decode($response);

    if ($resp->success != true) {
        // What happens when the CAPTCHA was entered incorrectly
        die ("The reCAPTCHA wasn't entered correctly. Go back and try it again. (" . $recaptchaResponse . ")" );
    } else {
	
        function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:");
        return str_replace($bad,"",$string);
        }
        
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
                    <p>Name: {$first_name} {$last_name}</p>
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
  }
?>