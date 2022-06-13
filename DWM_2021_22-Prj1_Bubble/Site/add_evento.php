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

if ($titulo != "") {
    if ($localizacao != "") {
        if ($descricao != "") {
            if (move_uploaded_file($_FILES['foto_evento']['tmp_name'], $folder_eventos . $novo_ficheiro_evento)) {
                $qevento = "INSERT INTO eventos (titulo,localizacao,descricao,imagem) VALUES ('" . $titulo . "','" . $localizacao . "','" . $descricao . "','" . $novo_ficheiro_evento . "')";
                $evento = $conn->query($qevento);
         }
        }
    }
}

header('location:eventos.php');
