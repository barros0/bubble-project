<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];

$nome = $_REQUEST['nome'];

if ($nome != "") {
    $stmt_update_nome = $conn->prepare("UPDATE users SET nome = ? WHERE id_user = " . $userid);
    $stmt_update_nome->bind_param('s', $nome);
    $stmt_update_nome->execute();
    $stmt_update_nome->close();
}


header('location:../../definicoes_geral.php');
