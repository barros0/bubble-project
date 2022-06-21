<?php
require('./bd.php');
session_start();

$userid = $_SESSION['user']['id_user'];


if ($_POST['follow']) {
    $followid = $_POST['follow'];



    $follow = $conn->prepare("INSERT INTO seguir (id_seguidor, id_seguir) VALUES (?, ?)");
    $follow->bind_param("ss", $userid, $followid);
    $follow->execute();

    //
    $follow = $conn->prepare("INSERT INTO seguir (id_seguidor, id_seguir) VALUES (?, ?)");
    $follow->bind_param("ss", $followid, $userid);
    $follow->execute();

    array_push($_SESSION['alerts']['success'], 'Começaste a seguir xxxx');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


if ($_POST['remove-follow']) {
    $followid = $_POST['follow'];

    $delete_follow = $conn->prepare("delete from seguir where (?, ?) and  (?, ?)");
    $delete_follow->bind_param("ss", $userid, $followid, $followid, $userid);
    $delete_follow->execute();

    array_push($_SESSION['alerts']['erros'], 'Deixas-te de seguir xxx!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>

