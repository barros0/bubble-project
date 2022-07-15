<?php
require('./bd.php');
require 'functions_handler.php';
session_start();

$userid = $_SESSION['user']['id_user'];


if (isset($_GET['follow'])) {
    $followid = $_GET['follow'];

    $follow = $conn->prepare("insert into seguir (id_seguidor, id_utilizador) VALUES (?, ?)");
    $follow->bind_param("ii", $userid, $followid);
    $follow->execute();

    // cria uma notificacao para o user que seguiu
    notf_seguir($followid, $follow->insert_id);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}


if (isset($_GET['remove-follow'])) {
    $followid = $_GET['remove-follow'];

    $get_follow = $conn->prepare('select * from seguir where id_seguidor = ? and id_utilizador = ?');
    $get_follow->bind_param("ii", $userid, $followid);
    $get_follow->execute();
    $seguir_id = $get_follow->get_result()->fetch_assoc()['id_seguir'];
    $get_follow->close();

    $delete_follow = $conn->prepare('delete from seguir where id_seguidor = ? and id_utilizador = ?');
    $delete_follow->bind_param("ii", $userid, $followid);
    $delete_follow->execute();

    // apaga a notificao do seguimento pois ficaria uma notificcaoa fantasma
    notf_remover_seguir($seguir_id,$conn);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
