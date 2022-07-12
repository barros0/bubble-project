<?php
require('./bd.php');
session_start();

$user_id = $_SESSION['user']['id_user'];
$titulo = $_REQUEST['titulo_market_textarea'];
$descricao = $_REQUEST['descricao_market_textarea'];
$preco = $_REQUEST['preco_market_textarea'];
$categoria = $_REQUEST['select_categoria'];


$foto_market = $_FILES['foto_market']['name'];
$extensao = strtolower(pathinfo($foto_market, PATHINFO_EXTENSION));
$folder_marketplace = "img/marketplace/";
$novo_ficheiro_market = sha1(microtime()) . "." . $extensao;


$uploadOk = 1;
$error = "";


if ($foto_market != "") {


    if ($_FILES["foto_market"]["size"] > 10240000) {

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
        if ($titulo != "" && $preco != "" && $descricao != "" && move_uploaded_file($_FILES['foto_market']['tmp_name'], $folder_marketplace . $novo_ficheiro_market)) {
            $market = $conn->prepare("INSERT INTO marketplace (titulo,descricao, categoria,preco,imagem,id_user) VALUES (?,?,?,?,?,?)");
            $market->bind_param("sssssi", $titulo, $descricao, $categoria, $preco, $novo_ficheiro_market, $user_id);
            $market->execute();

            array_push($_SESSION['alerts']['success'], 'Produto Adicionado Com Sucesso');
            $market->close();
        }
    }
}
header("location:marketplace.php");
