<?php
require './bd.php';
session_start();

if (isset($_GET['pubid'])) {
    $pubid = $_GET['pubid'];

    $publicacao_check = $conn->prepare("select * from publicacoes where publicacao_id = ?");
    $publicacao_check->bind_param("i", $_GET['pubid']);
    $publicacao_check->execute();
    $publicacao = $publicacao_check->get_result();
    $publicacao_check->close();

    if ($publicacao->num_rows > 0) {

        $fav_checkq = $conn->prepare("select * from publicacoes_fav where id_user = ? and id_pub = ? ");
        $fav_checkq->bind_param("ii", $_SESSION['user']['id_user'], $pubid);
        $fav_checkq->execute();
        $fav_check = $fav_checkq->get_result();
        $fav_checkq->close();

        if ($fav_check->num_rows < 1) {
            $addfav = $conn->prepare("insert into publicacoes_fav (id_pub,id_user) values (?,?)");
            $addfav->bind_param("ii", $pubid, $_SESSION['user']['id_user']);
            $addfav->execute();
        } else {

            $removefav = $conn->prepare("delete from publicacoes_fav where id_user = ? and id_pub = ?");
            $removefav->bind_param("ii", $_SESSION['user']['id_user'], $pubid);
            $removefav->execute();
            $removefav->close();
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    array_push($_SESSION['alerts']['errors'], 'Publicação inválida!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
