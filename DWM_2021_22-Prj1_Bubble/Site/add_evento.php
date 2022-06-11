<?php
require('./bd.php');
session_start();


$titulo = $_REQUEST['titulo_evento_textarea'];
$localizacao = $_REQUEST['localizacao_evento_textarea'];
$descricao = $_REQUEst['descricao_evento_textarea'];

$foto = $_FILES['foto_evento']['name'];
$extensao = pathinfo($foto, PATHINFO_EXTENSION);
$folder = "img/eventos";
$novo_ficheiro = sha1(microtime()). "." . $extensao;

if(move_uploaded_file($_FILES['foto_evento']['tmp_name'], $folder . $novo_ficheiro)){
    $qevento = "INSERT INTO eventos (titulo,localizacao,descricao,imagem) VALUES ('" . $titulo . "','" . $localizacao . "','".$descricao."','".$foto."')";
    $evento = $conn->query($qevento);
}

header('location:eventos.php');
?>