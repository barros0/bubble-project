<?php
require 'partials/db_con.php';
session_start();

$comentarioid = $_GET['comentarioid'];


$comentarioq = $conn->prepare("select * from comentarios where comentario_id = ?");
$comentarioq->bind_param("i", $comentarioid);
$comentarioq->execute();
$comentario = $comentarioq->get_result()->fetch_assoc();
$pubid = $comentario['publicacao_id'];
$comentarioq->close();

if (empty($comentario)) {
    array_push($_SESSION['alerts']['errors'], 'Este comentario não existe!');
    header('location:./users.php');
    exit;
}



$comentariodelete = $conn->prepare("delete from comentarios where comentario_id = ?");
$comentariodelete->bind_param("i", $comentarioid);
$comentariodelete->execute();
$comentariodelete->close();

array_push($_SESSION['alerts']['success'], 'Esta comentario eliminado!');
header('location:./publicacao.php?publicacaoid='.$pubid);
exit;

