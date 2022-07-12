<?php
require('./bd.php');
session_start();


$titulo = $_REQUEST['titulo_evento_textarea'];
$localizacao = $_REQUEST['localizacao_evento_textarea'];
$descricao = $_REQUEST['descricao_evento_textarea'];

$foto_evento = $_FILES['foto_evento']['name'];
$extensao = strtolower(pathinfo($foto_evento, PATHINFO_EXTENSION));
$folder_eventos = "img/eventos/";
$novo_ficheiro_evento = sha1(microtime()) . "." . $extensao;

$uploadOk = 1;
$error = "";

if ($foto_evento != "") {



    if ($_FILES["foto_evento"]["size"] > 10240000) {

        $error = "O seu ficheiro é demasiado grande (MAX: 10MB).";
        array_push($_SESSION['alerts']['alert'], 'O seu ficheiro é demasiado grande (MAX: 10MB).');
        echo "Introduzido!";
        $uploadOk = 0;
    }

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != "gif") {

        $error = "Só ficheiros JPG, JPEG, PNG & GIF são permitidos.";
        array_push($_SESSION['alerts']['alert'], 'Só ficheiros JPG, JPEG, PNG & GIF são permitidos.');
        echo "Introduzido com nao!";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $error = "O seu ficheiro não foi submetido.";
        array_push($_SESSION['alerts']['alert'], 'O seu ficheiro não foi submetido.');
    } else {

        if ($titulo != "" && $localizacao != "" && $descricao != "" && move_uploaded_file($_FILES['foto_evento']['tmp_name'], $folder_eventos . $novo_ficheiro_evento)) {
            $evento = $conn->prepare("INSERT INTO eventos (titulo,descricao,localizacao,imagem) VALUES (?,?,?,?)");
            $evento->bind_param("ssss",$titulo,$descricao,$localizacao,$novo_ficheiro_evento);
            $evento->execute();
        
            array_push($_SESSION['alerts']['success'], 'Evento criado com sucesso.');
            $evento->close();
            header('location:eventos.php');
        } 
    }

}



header('location:eventos.php');

