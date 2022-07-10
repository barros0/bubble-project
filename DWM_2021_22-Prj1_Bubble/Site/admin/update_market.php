<?php

require "./partials/db_con.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

}

// para apagar uma market, url leva ?delete_marketid
if (isset($_GET['delete_marketid'])) {

    $market = $conn->query('SELECT * FROM marketplace WHERE id_produto =' . $_GET['delete_marketid'])->fetch_assoc();

    if (empty($market)) {
        array_push($_SESSION['alerts']['errors'], 'Este market não existe!');
        header('location:./marketplace.php');
    }

    $conn->query('DELETE FROM marketplace WHERE id_produto = ' . $_GET['delete_marketid']);
    $conn->close();
    array_push($_SESSION['alerts']['alert'], 'Produto eliminado com sucesso!');
    header('location:./marketplace.php');
    exit;
}

//parte que atualiza o market

$foto_market = $_FILES['foto_market']['name'];
$extensao = pathinfo($foto_market, PATHINFO_EXTENSION);
$folder_marketplace = "../img/marketplace/";
$novo_ficheiro_market = sha1(microtime()) . "." . $extensao;

if (isset($_GET['marketid']) && move_uploaded_file($_FILES['foto_market']['tmp_name'], $folder_marketplace . $novo_ficheiro_market)) {

    
   

    $marketid = $_GET['marketid'];

    $market = $conn->query('SELECT * FROM marketplace WHERE id_produto = ' . $marketid)->fetch_assoc();

    if (isset($market)) {

    //parte que prepara o statement
    $stmt = $conn->prepare("UPDATE marketplace SET titulo=?, preco=?, descricao=?, imagem=? WHERE id_produto=?");
    $stmt->bind_param("ssssi",$titulo,$preco,$descricao,$novo_ficheiro_market,$marketid);

    $titulo = $_POST['titulo'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
   
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar todas as conexoes usadas
    $stmt->close();
    $conn->close();

        array_push($_SESSION['alerts']['success'], 'Produto atualizado com sucesso!');
        header('location:./marketplace.php');

        exit;

    } else {

        array_push($_SESSION['alerts']['errors'], 'Este produto não existe!');
        header('location:./marketplace.php');
        exit;

    }
}
