<?php
require './bd.php';

if($_GET['add_fav']){
    $pubid = $_GET['add_fav'];

    $publicacao = $conn->prepare("select * from publicacoes where id_publicacao = ?");
    $publicacao->bind_param("i", $pubid);
    $publicacao->execute();

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