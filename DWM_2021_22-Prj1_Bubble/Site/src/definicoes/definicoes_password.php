<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];

$atual = $_REQUEST['old_password'];
$nova = $_REQUEST['new_password'];
$confirmar = $_REQUEST['confirm_password'];

$passwordantiga = $conn->query("select password from users where id_user = " . $userid)->fetch_assoc();
$old_hash = $passwordantiga['password'];
$hash = hash('sha512', $atual);

$erro = "";

if ($nova === $confirmar) {
    if($old_hash === $hash){
        
    }
} else {
    $erro = "Passwords não coincide";
}


//header('location:../../definicoes_seguranca.php');
