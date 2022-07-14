<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';


//Load Composer's autoloader
require 'vendor/autoload.php';

// gera random token de 50 caracteres
function criar_token()
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz-"), 0, 50);
}

function gerar_token_user($iduser)
{
    require 'bd.php';
    // cria key
    $token = criar_token();
    //verifica se essa key ja existe se exisitir cria uma nova até não existir outra igual
    while ($conn->query('select * from users where vkey = "' . $token . '"')->num_rows > 0) {
        $token = criar_token();
    }
// insere essa key ao user
    $conn->query('update users set vkey = "' . $token . '" where id_user = "' . $iduser . '"');

    return $token;
}

function confirmaremail($user)
{
    $token = gerar_token_user($user['id_user']);
    $link = gerar_link_confirm_email($token);
    $email_conteudo = corpo_email($link);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'mail.social-bubble.pt';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'noreply@social-bubble.pt';                     //SMTP username
        $mail->Password = 'auto_social';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreply@social-bubble.pt', 'Bubble');
        $mail->addAddress('submica99@gmail.com', 'Bubble user');     //Add a recipient
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
        $mail->Body = $email_conteudo;
        $mail->AltBody = 'É necessário confirmares o teu e-mail antes de fazeres login :)';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//confirmaremail(1,1);

// gera o link que vai ser enviado no email para confirmar o email
function gerar_link_confirm_email($token)
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
// Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
    $url .= $_SERVER['REQUEST_URI'];

    $url = explode('/', $url);
    array_pop($url);
    $link = implode('/', $url) . '/confirmar_email.php?token=' . $token;
    return $link;
}

// gera e devolve o corpo do email
function corpo_email($link, $user)
{

    return <<<HTML
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirma o teu email</title>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="640" align="center" border="0"
       style="background-color: #1C1C1C; padding: 30px; color: white; border-radius: 10px">
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0" width="640" align="left" border="0">
                <tr>
                    <td align="center" margin-top="20px">
                        <img width="250px" src="./img/header/logo_bubble.svg" alt="">
                    </td>
                </tr>
                <tr align="center">
                    <td><h1 style="margin-top: 20px; color: white">Confirma o teu e-mail</h1></td>
                </tr>
                 <tr align="center">
                    <td><p style="margin-top: 20px; color: white">
                    Olá {$user['nome']}, bem-vindo ao mundo do bubble. Temos todo o gosto em receber-te! 
</p></td>
                </tr>
                <tr>
                    <td align="center">
                        <a
                                style="margin-top: 20px; text-decoration: none; font-size: 20px; padding: 10px; color: white; background-color: #00d372; border-radius: 8px"
                                href="'{$link}'">Clica aqui para confirmares a tua conta</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
HTML
        ;
}

?>


<style>

</style>


