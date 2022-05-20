<?php
require('./bd.php');
session_start();
$texto = $_REQUEST['text'];
$imagem = $_POST['file'];

$qpublicacao ="INSERT INTO publicacoes (user_id,conteudo,estado) VALUES ('".$_SESSION['user']['id_user']."','".$texto."',1)";

$publicacao = $conn->query($qpublicacao);

$idpub = (mysqli_insert_id($conn));

$publicacao_foto = "INSERT INTO publicacoes_fotos (publicacao_id,caminho) VALUES('".$idpub."','".$file."')";

$conn->query($publicacao_foto);

?>