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

$nova_hash = hash('sha512', $nova);
$erro = "";

if ($nova === $confirmar) {
    if ($old_hash === $hash) {
        $stmt_update_password = $conn->prepare("UPDATE users SET password = ? WHERE id_user = " . $userid);
        $stmt_update_password->bind_param('s', $nova_hash);
        $stmt_update_password->execute();
        $stmt_update_password->close();
        array_push($_SESSION['alerts']['success'], 'Password Atualizada com Sucesso');
    } else {
        array_push($_SESSION['alerts']['errors'], 'Password Atual Incorreta');
    }
} else {
    array_push($_SESSION['alerts']['errors'], 'Password não coincide');
}

header('location:../../definicoes_seguranca.php');
