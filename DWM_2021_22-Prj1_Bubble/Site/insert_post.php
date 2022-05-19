<?php
require('./bd.php');
session_start();
$texto = $_REQUEST['text'];
$imagem = $_POST['file'];

$publicacao = $conn->query("INSERT INTO publicacoes (user_id,conteudo,estado) VALUES ('".$_SESSION['user']['id_user']."','".$texto."',1)");


$publicacao_foto = "INSERT INTO publicacoes_fotos (publicacao_id,caminho) VALUES('".$publicacao['publicacao_id']."','".$file."')";

$conn->query($publicacao);

?>