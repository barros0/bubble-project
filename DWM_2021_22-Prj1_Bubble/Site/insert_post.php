<?php
require('./bd.php');

session_start();

//TEXTO DA PUBLICACAO PARA PUBLICACOES
$texto = $_REQUEST['text'];

$qpublicacao ="INSERT INTO publicacoes (user_id,conteudo,estado) VALUES ('".$_SESSION['user']['id_user']."','".$texto."',1)";
$publicacao = $conn->query($qpublicacao);

//ID DA PUBLICACAO
$idpub = (mysqli_insert_id($conn));
//print_r($idpub);

//IMAGEM DA PUBLICACAO PARA PUBLICACOES_FOTOS
$imagem = $_FILES['foto_public']['name'];
$extensao = pathinfo($imagem, PATHINFO_EXTENSION);
$folder = "img/publicacoes/";
$novo_ficheiro = $folder . sha1(microtime()) . "." . $extensao;

if (move_uploaded_file($_FILES['foto_public']['tmp_name'], $novo_ficheiro)) {
    $publicacao_foto = "INSERT INTO publicacoes_fotos (publicacao_id,caminho) VALUES('".$idpub."','".$novo_ficheiro."')";
    $conn->query($publicacao_foto);
}
?>