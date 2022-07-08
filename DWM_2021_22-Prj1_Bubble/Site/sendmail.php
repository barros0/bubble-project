<?php

function confirmaremail($user, $token){
$to = $user['email'];
$subject = "Confirme o seu email | BUBBLE";

$message = 'Bem-vindo '.$user['nome'].',<br>';
$message .= "Para confirmar a sua conta clique no link que se segue abaixo:<br><br>";
$message .= "<a href='/confirmar-email/".$token."'></a> ,<br>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <enquiry@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

$email = mail($to,$subject,$message,$headers);

    if( $email == true ) {
       //sucesso
    }else {
//fail
    }

}