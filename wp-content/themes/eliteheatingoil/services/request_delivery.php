<?php

require_once './vendor/autoload.php';

$helperLoader = new SplClassLoader('Helpers', './vendor');
$mailLoader   = new SplClassLoader('SimpleMail', './vendor');

$helperLoader->register();
$mailLoader->register();

use Helpers\Config;
use SimpleMail\SimpleMail;

$config = new Config;
$config->load('./config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name    = stripslashes(trim($_POST['first_name']));
    $last_name    = stripslashes(trim($_POST['last_name']));
    $email   = stripslashes(trim($_POST['email']));
    $phone   = stripslashes(trim($_POST['phone']));
    $subject = 'Delivery Request';
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    if (preg_match($pattern, $first_name) || preg_match($pattern, $last_name) || preg_match($pattern, $email)) {
        die("Header injection detected");
    }
    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($first_name && $last_name && $email && $emailIsValid && $subject && $message) {
        $mail = new SimpleMail();
        $mail->setTo('kcogswell26@gmail.com');
        $mail->setFrom('web@eliteheatingoil.ca');
        $mail->setSender($first_name . ' ' . $last_name);
        $mail->setSenderEmail($email);
        $mail->setSubject($subject);
        $body = "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
        <html>
            <head>
                <meta charset=\"utf-8\">
            </head>
            <body>
                <h1>{$subject}</h1>
                <p><strong>{$config->get('fields.name')}:</strong> {$name}</p>
                <p><strong>{$config->get('fields.email')}:</strong> {$email}</p>
                <p><strong>{$config->get('fields.phone')}:</strong> {$phone}</p>
                <p><strong>{$config->get('fields.message')}:</strong> {$message}</p>
            </body>
        </html>";
        $mail->setHtml($body);
        $mail->send();
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>