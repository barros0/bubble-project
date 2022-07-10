<?php
require('./bd.php');
session_start();


$titulo = $_REQUEST['titulo_evento_textarea'];
$localizacao = $_REQUEST['localizacao_evento_textarea'];
$descricao = $_REQUEST['descricao_evento_textarea'];

$foto_evento = $_FILES['foto_evento']['name'];
$extensao = pathinfo($foto_evento, PATHINFO_EXTENSION);
$folder_eventos = "img/eventos/";
$novo_ficheiro_evento = sha1(microtime()) . "." . $extensao;

if ($titulo != "" && $localizacao != "" && $descricao != "" && move_uploaded_file($_FILES['foto_evento']['tmp_name'], $folder_eventos . $novo_ficheiro_evento)) {
    $evento = $conn->prepare("INSERT INTO eventos (titulo,descricao,localizacao,imagem) VALUES (?,?,?,?)");
    $evento->bind_param("ssss",$titulo,$descricao,$localizacao,$novo_ficheiro_evento);
    $evento->execute();

    array_push($_SESSION['alerts']['success'], 'Evento criado com sucesso.');
    $evento->close();
    header('location:eventos.php');
} else{
    array_push($_SESSION['alerts']['erro'], 'Nao foi possivel criar um evento.');
}

header('location:eventos.php');

