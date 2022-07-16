<?php
include('./partials/db_con.php');
session_start();

$pubid = $_GET['publicacaoid'];

$publicacaoq = $conn->prepare("select * from publicacoes where publicacao_id = ?");
$publicacaoq->bind_param("i", $pubid);
$publicacaoq->execute();
$publicacao = $publicacaoq->get_result()->fetch_assoc();

if (!isset($publicacao)) {
    array_push($_SESSION['alerts']['errors'], 'Esta publicação não existe!');
    header('location:./users.php');
    exit;
}


$publicacao_update = $conn->prepare("update publicacoes set conteudo = ?, estado_pub = ? where publicacao_id = ?");
$publicacao_update->bind_param("sii", $_POST['conteudo'], $_POST['estado'],$pubid);
$publicacao_update->execute();

array_push($_SESSION['alerts']['success'], 'Publicação atualizada!');
header('location:./publicacao.php?publicacaoid='.$pubid);
exit;
