<?php
require('./bd.php');
session_start();

//definir as variaveis e executar
$userq = $_SESSION['user']['id_user'];
$conteudo = $_REQUEST['text']; //conteudo da publicação 
$estado_pub = 1;

//APENAS TEXTO
if ($conteudo != "") {
    $stmt = $conn->prepare("INSERT INTO publicacoes (user_id, conteudo, estado_pub) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $userq, $conteudo, $estado_pub);
    $stmt->execute();
    $stmt->close();
    $error = "Introduzido com Sucesso";
    array_push($_SESSION['alerts']['success'], $error);
}

//ID DA PUBLICACAO
$idpub = (mysqli_insert_id($conn));

//IMAGEM DA PUBLICACAO PARA PUBLICACOES_FOTOS
$imagem = $_FILES['foto_public']['name'];
$extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
$folder = "img/publicacoes/";
$novo_ficheiro = sha1(microtime()) . "." . $extensao; //MUDAR DE NOME DA FOTO

$uploadOk = 1;
$error = "";

//SE NAO TIVER NADA
if ($imagem == "" && $conteudo == "") {
    $error = "Introduza Conteudo";
    array_push($_SESSION['alerts']['errors'], $error);
    header('location:feed.php');
    exit;
}

//TEXTO E FOTO
if ($imagem != "" && $conteudo != "") {

    // VERIFICAR O TAMANHO DO FICHEIRO

    if ($_FILES["foto_public"]["size"] > 10240000) {

        $error = "O seu ficheiro é demasiado grande (MAX: 10MB).";
        array_push($_SESSION['alerts']['errors'], $error);
        $uploadOk = 0;
        exit;
    }

    // VERIFICAR A EXTENSAO DO FICHEIRO
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != "gif") {

        $error = "Só ficheiros JPG, JPEG, PNG & GIF são permitidos.";
        array_push($_SESSION['alerts']['errors'], $error);
        $uploadOk = 0;
        header('location:feed.php');
        exit;
    }

    if (move_uploaded_file($_FILES['foto_public']['tmp_name'], $folder . $novo_ficheiro)) {

        //preparar o statement
        $foto = $conn->prepare("INSERT INTO publicacoes_fotos (publicacao_id, caminho) VALUES (?, ?)");
        $foto->bind_param("is", $idpub, $novo_ficheiro);
        $foto->execute();

        $foto->close();
        $conn->close();
        header('location:feed.php');
        exit;
    }
}

//APENAS FOTO
$conteudo = " ";
if ($imagem != "" && $conteudo == " ") {

    $stmt = $conn->prepare("INSERT INTO publicacoes (user_id, conteudo, estado_pub) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $userq, $conteudo, $estado_pub);
    $stmt->execute();
    $stmt->close();
    array_push($_SESSION['alerts']['success'], 'Introduzido com Sucesso');

    $idpub = (mysqli_insert_id($conn));

    // VERIFICAR O TAMANHO DO FICHEIRO

    if ($_FILES["foto_public"]["size"] > 10240000) {

        $error = "O seu ficheiro é demasiado grande (MAX: 10MB).";
        array_push($_SESSION['alerts']['errors'], $error);
        $uploadOk = 0;
        header('location:feed.php');
        exit;
    }

    // VERIFICAR A EXTENSAO DO FICHEIRO
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != "gif") {

        $error = "Só ficheiros JPG, JPEG, PNG & GIF são permitidos.";
        array_push($_SESSION['alerts']['errors'], $error);
        $uploadOk = 0;
        header('location:feed.php');
        exit;
    }

    if (move_uploaded_file($_FILES['foto_public']['tmp_name'], $folder . $novo_ficheiro)) {

        //preparar o statement
        $foto = $conn->prepare("INSERT INTO publicacoes_fotos (publicacao_id, caminho) VALUES (?, ?)");
        $foto->bind_param("is", $idpub, $novo_ficheiro);
        $foto->execute();

        header('location:feed.php');
        $foto->close();
        $conn->close();
    }
}
header('location:feed.php');
