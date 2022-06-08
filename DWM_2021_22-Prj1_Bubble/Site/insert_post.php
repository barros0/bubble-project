<?php
require('./bd.php');
session_start();


$texto = $_REQUEST['text']; //TEXTO DA PUBLICACAO PARA PUBLICACOES

$qpublicacao = "INSERT INTO publicacoes (user_id,conteudo,estado) VALUES ('" . $_SESSION['user']['id_user'] . "','" . $texto . "',1)";
$publicacao = $conn->query($qpublicacao);

//ID DA PUBLICACAO
$idpub = (mysqli_insert_id($conn));

//IMAGEM DA PUBLICACAO PARA PUBLICACOES_FOTOS
$imagem = $_FILES['foto_public']['name'];
$extensao = pathinfo($imagem, PATHINFO_EXTENSION);
$folder = "img/publicacoes/";
$novo_ficheiro = sha1(microtime()) . "." . $extensao; //MUDAR DE NOME DA FOTO

$uploadOk = 1;

if ($imagem != "") {
    // Check file size
    if ($_FILES["foto_public"]["size"] > 10240000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['foto_public']['tmp_name'], $folder . $novo_ficheiro)) {
            $publicacao_foto = "INSERT INTO publicacoes_fotos (publicacao_id,caminho) VALUES('" . $idpub . "','" . $novo_ficheiro . "')";
            $conn->query($publicacao_foto);
        }
    }
}

header('location:header.php');
?>