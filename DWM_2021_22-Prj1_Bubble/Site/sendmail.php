<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';


//Load Composer's autoloader
require 'vendor/autoload.php';


function confirmaremail($user, $token){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.social-bubble.pt';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'noreply@social-bubble.pt';                     //SMTP username
        $mail->Password   = 'auto_social';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('submica99@gmail.com', 'Mailer');
        $mail->addAddress('submica99@gmail.com', 'Joe User');     //Add a recipient
        /* $mail->addAddress('ellen@example.com');               //Name is optional
         $mail->addReplyTo('info@example.com', 'Information');
         $mail->addCC('cc@example.com');
         $mail->addBCC('bcc@example.com');*/

        //Attachments
        /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
*/
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Bubble | Confirma o teu endereço e-mail';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'É necessário confirmares o teu e-mail antes de fazeres login :)';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//confirmaremail(1,1);



function gerar_link_confirm_email($token){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
// Append the host(domain name, ip) to the URL.
    $url.= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
    $url.= $_SERVER['REQUEST_URI'];

    $url = explode('/', $url);
    array_pop($url);
    $link =  implode('/', $url).'/confirmar_email.php?token='.$token;
    return;
}