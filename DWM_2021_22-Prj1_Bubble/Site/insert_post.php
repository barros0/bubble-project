<?php
require('./bd.php');
session_start();

/*
$texto =  //TEXTO DA PUBLICACAO PARA PUBLICACOES

$qpublicacao = "INSERT INTO publicacoes (user_id,conteudo,estado_pub) VALUES ('" . $_SESSION['user']['id_user'] . "','" . $texto . "',1)";
$publicacao = $conn->query($qpublicacao);
*/

//preparar o statement
$stmt = $conn->prepare("INSERT INTO publicacoes (user_id, conteudo, estado_pub) VALUES (?, ?, ?)");
$stmt->bind_param("isi", $userq, $conteudo, $estado_pub);

//definir as variaveis e executar
$userq = ['id_user'];
$conteudo = $_REQUEST['text']; //conteudo da publicação 
$estado_pub = 1;
$stmt->execute();

echo "Introduzido com sucesso!";

//fechar as conexoes
$stmt->close();

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

            //preparar o statement
            $foto = $conn->prepare("INSERT INTO publicacoes_fotos (publicacao_id, caminho) VALUES (?, ?)");
            $foto->bind_param("is", $idpub, $novo_ficheiro);


            $foto->execute();

            echo "Introduzido com sucesso!";

            //fechar as conexoes
            $foto->close();
            $conn->close();

            /*$publicacao_foto = "INSERT INTO publicacoes_fotos (publicacao_id,caminho) VALUES('" . $idpub . "','" . $novo_ficheiro . "')";
            $conn->query($publicacao_foto);*/
        }
    }
}

header('location:feed.php');
