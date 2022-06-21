<?php
require('./bd.php');
session_start();

$userid = $_SESSION['user']['id_user'];


if (isset($_GET['follow'])) {
    $followid = $_GET['follow'];

    $follow = $conn->prepare("insert into seguir (id_seguidor, id_utilizador) VALUES (?, ?)");
    $follow->bind_param("ii", $userid, $followid);
    $follow->execute();


    array_push($_SESSION['alerts']['success'], 'Começaste a seguir xxxx');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


if (isset($_GET['remove-follow'])) {
    $followid = $_GET['remove-follow'];

    $delete_follow = $conn->prepare('delete from seguir where id_seguidor = ? and id_utilizador = ?');
    $delete_follow->bind_param("ii", $userid, $followid);
    $delete_follow->execute();

    array_push($_SESSION['alerts']['erros'], 'Deixas-te de seguir xxx!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>

