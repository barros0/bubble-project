<?php
require('./bd.php');
session_start();


$texto = $_REQUEST['text']; //TEXTO DA PUBLICACAO PARA PUBLICACOES

$qpublicacao = "INSERT INTO publicacoes (user_id,conteudo,estado_pub) VALUES ('" . $_SESSION['user']['id_user'] . "','" . $texto . "',1)";
$publicacao = $conn->query($qpublicacao);

//ID DA PUBLICACAO
$idpub = (mysqli_insert_id($conn));

//IMAGEM DA PUBLICACAO PARA PUBLICACOES_FOTOS
$imagem = $_FILES['foto_public']['name'];
$extensao = pathinfo($imagem, PATHINFO_EXTENSION);
$folder = "img/publicacoes/";
$novo_ficheiro = sha1(microtime()) . "." . $extensao; //MUDAR DE NOME DA FOTO

$uploadOk = 1;
$error = "";

if ($imagem != "") {
    // VERIFICAR O TAMANHO DO FICHEIRO
    if ($_FILES["foto_public"]["size"] > 10240000) {
        $error = "O seu ficheiro é demasiado grande (MAX: 10MB).";
        $uploadOk = 0;
    }

    // VERIFICAR A EXTENSAO DO FICHEIRO
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != "gif") {
        $error = "Só ficheiros JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk = 0;
    }

    // VER SE HÁ ERRO
    if ($uploadOk == 0) {
        $error = "O seu ficheiro não foi submetido.";
    } else {
        if (move_uploaded_file($_FILES['foto_public']['tmp_name'], $folder . $novo_ficheiro)) {
            $publicacao_foto = "INSERT INTO publicacoes_fotos (publicacao_id,caminho) VALUES('" . $idpub . "','" . $novo_ficheiro . "')";
            $conn->query($publicacao_foto);
        }
    }
}

header('location:feed.php');
?>