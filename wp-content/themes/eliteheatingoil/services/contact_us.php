<?php
$template_direcotry = get_template_directory();

// require_once($template_direcotry . '/services/recaptchalib.php');



// $recaptcha_html = recaptcha_get_html($publickey);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $publickey = "6Lfp1jEUAAAAAIl0IET0Vkjr0v-gub9m2QCpW5Tq";
    $privatekey = "6Lfp1jEUAAAAAIiAii6t4ahXE3iUc9l84bUXvx0g";

    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $privatekey . "&response=".$recaptchaResponse);
    $resp = json_decode($response);

    if ($resp->success != true) {
        // What happens when the CAPTCHA was entered incorrectly
        die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." );
    } else {
	
        function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:");
        return str_replace($bad,"",$string);
        }
        
        $first_name    = stripslashes(trim($_POST['first_name']));
        $last_name    = stripslashes(trim($_POST['last_name']));
        $email   = stripslashes(trim($_POST['email']));
        $phone   = stripslashes(trim($_POST['phone']));
        $subject    = stripslashes(trim($_POST['subject']));
        $special_instructions = nl2br(stripslashes(trim($_POST['special_instructions'])));

        $subject = 'Contact Message';    
        $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

        if (preg_match($pattern, $first_name) || preg_match($pattern, $last_name) || preg_match($pattern, $email)) {
            die("Header injection detected");
        }

        $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($first_name && $last_name && $email && $special_instructions) {
            $logo_path = get_bloginfo( 'template_directory' ) . '/images/blue_long_logo.png';
            
            $email_to = $email; // your email address send TO
            $email_from = "support@eliteheatingoil.ca"; // your email address send FROM

            $body = "
            <!doctype html>
            <html>
            <head>
                <meta name='viewport' content='width=device-width' />
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                <title>Contact Us</title>
                <style>
                body,table td{font-family:sans-serif;color:#303030;}.body,body{background-color:#f6f6f6}.btn,.btn a,.content,.wrapper{box-sizing:border-box}.btn a,h1{text-transform:capitalize}.align-center,.btn table td,.footer,h1{text-align:center}.clear,.footer{clear:both}.first,.mt0{margin-top:0}.last,.mb0{margin-bottom:0}img{border:none;-ms-interpolation-mode:bicubic;max-width:100%}body{-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.body,table td{font-size:16px}.container,.content{display:block;max-width:580px;padding:10px}table{border-collapse:separate;mso-table-lspace:0;mso-table-rspace:0;width:100%}table td{vertical-align:top}.body{width:100%}.btn a,.btn table td{background-color:#fff}.container{Margin:0 auto!important;width:580px}.btn,.footer,.main{width:100%}.content{Margin:0 auto}.main{background:#fff;border-radius:3px}.wrapper{padding:20px}.content-block{padding-bottom:10px;padding-top:10px}.footer{Margin-top:10px}h1,h2,h3,h4,ol,p,ul{font-family:sans-serif;margin:0}.footer a,.footer p,.footer span,.footer td{color:#999;font-size:12px;text-align:center}h1,h2,h3,h4{color:#000;font-weight:400;line-height:1.4;Margin-bottom:30px}.btn a,a{color:#3498db}h1{font-size:35px;font-weight:300}.btn a,ol,p,ul{font-size:16px}ol,p,ul{font-weight:400;Margin-bottom:15px}ol li,p li,ul li{list-style-position:inside;margin-left:5px}a{text-decoration:underline}.btn a,.powered-by a{text-decoration:none}.btn>tbody>tr>td{padding-bottom:15px}.btn table{width:auto}.btn table td{border-radius:5px}.btn a{border:1px solid #3498db;border-radius:5px;cursor:pointer;display:inline-block;font-weight:700;margin:0;padding:12px 25px}.btn-primary a,.btn-primary table td{background-color:#3498db}.btn-primary a{border-color:#3498db;color:#fff}.align-right{text-align:right}.align-left{text-align:left}.preheader{color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0}hr{border:0;border-bottom:1px solid #f6f6f6;Margin:20px 0}td.bullet{padding:0 0 0 15px}@media only screen and (max-width:620px){table[class=body] h1{font-size:28px!important;margin-bottom:10px!important}table[class=body] a,table[class=body] ol,table[class=body] p,table[class=body] span,table[class=body] td,table[class=body] ul{font-size:16px!important}table[class=body] .article,table[class=body] .wrapper{padding:10px!important}table[class=body] .content{padding:0!important}table[class=body] .container{padding:0!important;width:100%!important}table[class=body] .main{border-left-width:0!important;border-radius:0!important;border-right-width:0!important}table[class=body] .btn a,table[class=body] .btn table{width:100%!important}table[class=body] .img-responsive{height:auto!important;max-width:100%!important;width:auto!important}}@media all{.btn-primary a:hover,.btn-primary table td:hover{background-color:#34495e!important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}.apple-link a{color:inherit!important;font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;text-decoration:none!important}.btn-primary a:hover{border-color:#34495e!important}}.table-contact{margin-bottom:20px;padding:10px 10px 10px 10px;background-color: #f6f6f6;}.label{text-decoration:underline}.total{font-weight:700}
                </style>
            </head>
            <body class=''>
                <table border='0' cellpadding='0' cellspacing='0' class='body'>
                <tr>
                    <td>&nbsp;</td>
                    <td class='container'>
                    <div class='content'>

                        <!-- START CENTERED WHITE CONTAINER -->
                        <table class='main'>

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class='wrapper'>
                            <table border='0' cellpadding='0' cellspacing='0'>
                                <tr>
                                <td>
                                    <img src='{$logo_path}' alt='logo'>
                                    <h1>New Contact Message</h1>
                                    <p>A customer has submitted a new Contact Message, see the details below.</p>
                                    <table border='0' cellpadding='0' cellspacing='0' class='table-contact'>
                                    <tbody>
                                        <tr>
                                        <td align='left'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                            <tbody>
                                                <tr><td class='label'>Contact Information: </td></tr>
                                                <tr><td class='bullet'>&bull; Name: {$first_name} {$last_name}</td></tr>
                                                <tr><td class='bullet'>&bull; Email: {$email}</td></tr>
                                                <tr><td class='bullet'>&bull; Phone: {$phone}</td></tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                    </tbody>
                                    </table>

                                    <table border='0' cellpadding='0' cellspacing='0' class='table-contact'>
                                    <tbody>
                                        <tr>
                                        <td align='left'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                            <tbody>
                                                <tr><td class='label'>Subject: </td></tr>
                                                <tr><td>{$subject}</td></tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                        <tr><td></br></td></tr>
                                        <tr>
                                        <td align='left'>
                                            <table border='0' cellpadding='0' cellspacing='0'>
                                            <tbody>
                                                <tr><td class='label'>Message: </td></tr>
                                                <tr><td>{$special_instructions}</td></tr>
                                            </tbody>
                                            </table>
                                        </td>
                                        </tr>                                        
                                    </tbody>
                                    </table>

                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>

                        <!-- END MAIN CONTENT AREA -->
                        </table>

                        <!-- START FOOTER -->
                        <div class='footer'>
                        <table border='0' cellpadding='0' cellspacing='0'>
                            <tr>
                            <td class='content-block'>
                                <span class='apple-link'>Elite Heating Oil Ltd, PO Box 28134 Tacoma, Dartmouth NS B2W3E0</span>
                            </td>
                            </tr>
                        </table>
                        </div>
                        <!-- END FOOTER -->

                    <!-- END CENTERED WHITE CONTAINER -->
                    </div>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </table>
            </body>
            </html>";
            
            $email_message .= "Full Name: " . clean_string($first_name) . clean_string($last_name) ."\r\n";
            $email_message .= "Reply-To: ".clean_string($email)."\r\n";

            $headers .= 'From: '.$email_from."\r\n";
            $headers .= 'Reply-To: '.$email."\r\n" ;
            $headers = "Cc: jrw2012@me.com, \r\n" ;
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