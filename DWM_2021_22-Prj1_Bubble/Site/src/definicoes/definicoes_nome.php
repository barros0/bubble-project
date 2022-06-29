<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];
$nome = $_REQUEST['nome'];

$erro_nome = "";

if ($nome != "") {
    $stmt_update_nome = $conn->prepare("UPDATE users SET nome = ? WHERE id_user = " . $userid);
    $stmt_update_nome->bind_param('s', $nome);
    $stmt_update_nome->execute();
    $stmt_update_nome->close();
    $erro_nome = "Nome Atualizado Com Sucesso";
    array_push($_SESSION['alerts']['errors'], "Nome Atualizado Com Sucesso!");
} else {
    $erro_nome = "Introduza Um Nome Valido";
    array_push($_SESSION['alerts']['errors'], 'Esta FAQ não existe!');
}

header('location:../../definicoes_geral.php');
