<?php
require('./partials/db_con.php');
session_start();

$titulo = $_REQUEST['titulo'];
$localizacao = $_REQUEST['localizacao'];
$descricao = $_REQUEST['descricao'];

$foto_evento = $_FILES['foto_evento']['name'];
$extensao = pathinfo($foto_evento, PATHINFO_EXTENSION);
$folder_eventos = "../img/eventos/";
$novo_ficheiro_evento = sha1(microtime()) . "." . $extensao;

if ($titulo != "" && $localizacao != "" && $descricao != "" && move_uploaded_file($_FILES['foto_evento']['tmp_name'], $folder_eventos . $novo_ficheiro_evento)) {
    $stmt = $conn->prepare("INSERT INTO eventos (titulo,descricao,localizacao,imagem) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$titulo,$descricao,$localizacao,$novo_ficheiro_evento);
    $stmt->execute();

    array_push($_SESSION['alerts']['success'], 'Evento criado com sucesso.');
    $stmt->close();
    header('location:eventos.php');
} 



