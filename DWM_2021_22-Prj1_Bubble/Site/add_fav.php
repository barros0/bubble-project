<?php
require './bd.php';
session_start();

if(isset($_GET['pubid'])){
    $pubid = $_GET['pubid'];

    $publicacao_check = $conn->prepare("select * from publicacoes where publicacao_id = ?");
    $publicacao_check->bind_param("i", $_GET['pubid']);
    $publicacao_check->execute();
    $publicacao = $publicacao_check->get_result();

    if($publicacao->num_rows > 0){
        $publicacao = $conn->prepare("insert into publicacoes_fav (id_pub,id_user) values (?,?)");
        $publicacao->bind_param("ii", $pubid,$_SESSION['user']['id_user']);
        $publicacao->execute();

        array_push($_SESSION['alerts']['success'], 'Publicação adicionada aos favoritos!');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    array_push($_SESSION['alerts']['erros'], 'Publicação inválida!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);