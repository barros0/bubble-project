<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];
$nome = $_REQUEST['nome'];

if ($nome != "") {
    $stmt_update_nome = $conn->prepare("UPDATE users SET nome = ? WHERE id_user = ?");
    $stmt_update_nome->bind_param('si', $nome, $userid);
    $stmt_update_nome->execute();
    $stmt_update_nome->close();
    array_push($_SESSION['alerts']['success'], "Nome Atualizado Com Sucesso!");
} else {
    array_push($_SESSION['alerts']['errors'], 'Introduza Um Nome Valido!');
}

header('location:../../definicoes_geral.php');
