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
    $email_conteudo = corpo_email($link, $user);

    $mail = new PHPMailer(true);

    // tenta enviar o email
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
        $mail->addAddress($user['email'], 'Bubble user');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Bubble | Confirma o teu endereço e-mail';
        $mail->Body = $email_conteudo;
        $mail->AltBody = 'É necessário confirmares o teu e-mail antes de fazeres login :)';

        $mail->send();
        echo 'Email enviado com sucesso';
    }
    // se der erro ou falhar
    catch (Exception $e) {
        echo "Não foi possivel enviar email de confirmação de email, algo inesperado aconteceu, contact a administração
        . Erro: {$mail->ErrorInfo}";
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
                        <img  src="./img/header/logo_bubble.svg" alt="">
                    <svg width="250px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 408.6 100" style="enable-background:new 0 0 408.6 100;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#00FF8A;}
	.st1{fill:#00FF8A;stroke:#1D1D1B;stroke-width:14;stroke-miterlimit:10;}
	.st2{opacity:0.1;fill:#00FF8A;enable-background:new    ;}
</style>
<path class="st0" d="M152.6,34.8v35.9c0,12.8-10.3,23.5-24.1,26.4c-2.4,0.5-5,0.8-7.6,0.8c-17.5,0-31.7-12.2-31.7-27.2V50.1
	c0-4.2,1.7-8,4.5-10.8c2.8-2.8,6.6-4.5,10.8-4.5h0.8v35.9c0,6.1,7.2,11.2,15.7,11.2c2.7,0,5.4-0.5,7.6-1.5c4.8-2,8.1-5.6,8.1-9.8
	V45.8c0-6.1,4.9-11,11-11H152.6z"/>
<path class="st0" d="M311.3,56.9V2.2l0,0c-8.4,0-15.2,7.1-15.2,15.9v38.8c0,22.8,14.2,41.4,31.7,41.4c2.6,0,5.2-0.4,7.6-1.2
	C321.6,92.6,311.3,76.3,311.3,56.9z"/>
<path class="st1" d="M408.6-15.1"/>
<path class="st0" d="M392.8,67c0-2.3-0.2-4.5-0.7-6.6h0c-2.8-12.9-13.8-22.8-27.3-24c-0.5-0.1-1-0.1-1.5-0.1c-0.4,0-0.8,0-1.3,0
	c-0.4,0-0.9,0-1.3,0C344.4,37,331.3,50.5,331.3,67c0,17,13.8,30.7,30.7,30.7c15.5,0,27.9-5.3,30-20.2h-13.9
	c-1.9,7.2-8.4,6.2-16.2,6.2s-14.3-5.3-16.2-12.5h46.6C392.7,69.9,392.8,68.4,392.8,67z M355.4,60.4c-3,0-5.7,1.2-7.7,3.2
	c-1,1-1.9,2.3-2.4,3.6c0-0.1,0-0.1,0-0.2c0-2.3,0.5-4.6,1.4-6.6c0.7-1.7,1.7-3.2,2.9-4.6c3.1-3.4,7.5-5.5,12.4-5.5s9.3,2.2,12.4,5.5
	c1.2,1.4,2.2,2.9,3,4.6H355.4z"/>
<path class="st0" d="M392.8,67c0,1.4-0.1,2.9-0.3,4.2h0C392.7,69.9,392.8,68.4,392.8,67c0-2.3-0.3-4.5-0.7-6.6h0
	C392.6,62.5,392.8,64.7,392.8,67z"/>
<g>
	<path class="st0" d="M49.9,98.1c-0.4,0-0.8,0-1.3-0.1l0,0c-11-0.4-20.6-6.7-25.7-15.8c-2.5-4.5-3.9-9.6-3.9-15.1V2.3
		c8.6,0,15.5,6.3,15.5,12.9v51c0,8.1,6.2,15.8,14.4,16.4c8.7,0.6,16-6,16.5-14.5v-0.9c0-8.3-6.5-15-14.6-15.5h-0.1
		c-0.2,0-0.5,0-0.7,0h-0.1c-8.4,0.1-15.4,7.4-15.4,15.9V40.3c5.2-3,11.5-4.6,18.1-4c15,1.2,27.2,13.5,28.3,28.6
		c1.3,17.7-12.6,32.5-29.8,33.2L49.9,98.1z"/>
	<path class="st0" d="M72.5,80.4c-0.1,0.5-0.2,1-0.4,1.5c0,0.1-0.1,0.2-0.1,0.3c0,0.2-0.1,0.3-0.2,0.5c-0.2,0.2-0.3,0.5-0.3,0.8
		c0,0,0,0,0,0.1v0.1c0,0.1-0.1,0.2-0.1,0.2l0,0V84c-0.2,0.3-0.3,0.7-0.5,1"/>
	<path class="st0" d="M71.4,83.6L71.4,83.6c0,0.1-0.1,0.2-0.1,0.2S71.4,83.7,71.4,83.6z"/>
	<path class="st2" d="M72,82.2c-0.1,0.3-0.2,0.5-0.3,0.8c-0.1,0.2-0.2,0.3-0.2,0.5c0.1-0.2,0.2-0.5,0.3-0.8
		C71.9,82.5,71.9,82.4,72,82.2z"/>
</g>
<g>
	<path class="st0" d="M189.5,97.9c-0.4,0-0.8,0-1.3-0.1l0,0c-11-0.4-20.6-6.7-25.7-15.8c-2.5-4.5-3.9-9.6-3.9-15.1V2.1
		c8.6,0,15.5,6.3,15.5,12.9v51c0,8.1,6.2,15.8,14.4,16.4c8.7,0.6,16-6,16.5-14.5V67c0-8.3-6.5-15-14.6-15.5h-0.1c-0.2,0-0.5,0-0.7,0
		h-0.1c-8.4,0.1-15.4,7.4-15.4,15.9V40.1c5.2-3,11.5-4.6,18.1-4c15,1.2,27.2,13.5,28.3,28.6c1.3,17.7-12.6,32.5-29.8,33.2
		L189.5,97.9z"/>
	<path class="st0" d="M212.1,80.2c-0.1,0.5-0.2,1-0.4,1.5c0,0.1-0.1,0.2-0.1,0.3c0,0.2-0.1,0.3-0.2,0.5c-0.2,0.2-0.3,0.5-0.3,0.8
		c0,0,0,0,0,0.1v0.1c0,0.1-0.1,0.2-0.1,0.2l0,0v0.1c-0.2,0.3-0.3,0.7-0.5,1"/>
	<path class="st0" d="M211,83.4L211,83.4c0,0.1-0.1,0.2-0.1,0.2S211,83.5,211,83.4z"/>
	<path class="st2" d="M211.6,82c-0.1,0.3-0.2,0.5-0.3,0.8c-0.1,0.2-0.2,0.3-0.2,0.5c0.1-0.2,0.2-0.5,0.3-0.8
		C211.5,82.3,211.5,82.2,211.6,82z"/>
</g>
<g>
	<path class="st0" d="M257.5,98c-0.4,0-0.8,0-1.3-0.1l0,0c-11-0.4-20.6-6.7-25.7-15.8c-2.5-4.5-3.9-9.6-3.9-15.1V2.2
		c8.6,0,15.5,6.3,15.5,12.9v51c0,8.1,6.2,15.8,14.4,16.4c8.7,0.6,16-6,16.5-14.5v-0.9c0-8.3-6.5-15-14.6-15.5h-0.1
		c-0.2,0-0.5,0-0.7,0h-0.1c-8.4,0.1-15.4,7.4-15.4,15.9V40.2c5.2-3,11.5-4.6,18.1-4c15,1.2,27.2,13.5,28.3,28.6
		c1.3,17.7-12.6,32.5-29.8,33.2L257.5,98z"/>
	<path class="st0" d="M280.1,80.3c-0.1,0.5-0.2,1-0.4,1.5c0,0.1-0.1,0.2-0.1,0.3c0,0.2-0.1,0.3-0.2,0.5c-0.2,0.2-0.3,0.5-0.3,0.8
		c0,0,0,0,0,0.1v0.1c0,0.1-0.1,0.2-0.1,0.2l0,0v0.1c-0.2,0.3-0.3,0.7-0.5,1"/>
	<path class="st0" d="M279,83.5L279,83.5c0,0.1-0.1,0.2-0.1,0.2S279,83.6,279,83.5z"/>
	<path class="st2" d="M279.6,82.1c-0.1,0.3-0.2,0.5-0.3,0.8c-0.1,0.2-0.2,0.3-0.2,0.5c0.1-0.2,0.2-0.5,0.3-0.8
		C279.5,82.4,279.5,82.3,279.6,82.1z"/>
</g>
</svg>
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
                                target="_blank" href="{$link}">Clica aqui para confirmares a tua conta</a>
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


