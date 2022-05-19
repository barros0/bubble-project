<?php
require('./bd.php');
session_start();
$texto = $_REQUEST['text'];
$imagem = $_REQUEST['file'];

$sql = "INSERT INTO publicacoes (user_id,conteudo,estado) VALUES (1,'".$texto."',1)";

$conn->query($sql);
?>