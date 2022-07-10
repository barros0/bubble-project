<?php
require('./partials/db_con.php');
session_start();

$user_id = $_SESSION['user']['id_user'];
$titulo = $_REQUEST['titulo'];
$preco = $_REQUEST['preco'];
$descricao = $_REQUEST['descricao'];

$foto_market = $_FILES['foto_market']['name'];
$extensao = pathinfo($foto_market, PATHINFO_EXTENSION);
$folder_marketplace = "../img/marketplace/";
$novo_ficheiro_market = sha1(microtime()) . "." . $extensao;

if ($titulo != "" && $preco != "" && $descricao != "" && move_uploaded_file($_FILES['foto_market']['tmp_name'], $folder_marketplace . $novo_ficheiro_market)) {
    $stmt = $conn->prepare("INSERT INTO marketplace (titulo,descricao,preco,imagem,id_user) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi",$titulo,$descricao,$preco,$novo_ficheiro_market,$user_id);
    $stmt->execute();

    array_push($_SESSION['alerts']['success'], 'market criado com sucesso.');
    $stmt->close();
    header('location:marketplace.php');
} 



