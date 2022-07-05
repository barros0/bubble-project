<?php
require('./bd.php');
session_start();


$titulo = $_REQUEST['titulo_market_textarea'];
$descricao = $_REQUEST['descricao_market_textarea'];
$preco = $_REQUEST['preco_market_textarea'];


$foto_market = $_FILES['foto_market']['name'];
$extensao = pathinfo($foto_market, PATHINFO_EXTENSION);
$folder_marketplace = "img/marketplace/";
$novo_ficheiro_market = sha1(microtime()) . "." . $extensao;

if ($titulo != "" && $preco != "" && $descricao != "" && move_uploaded_file($_FILES['foto_market']['tmp_name'], $folder_marketplace . $novo_ficheiro_market)) {
    $qmarket = "INSERT INTO marketplace (titulo,descricao,preco,imagem) VALUES ('" . $titulo . "','" . $descricao . "','" . $preco . "','" . $novo_ficheiro_market . "')";
    $market = $conn->query($qmarket);
}

header('location:marketplace.php');
