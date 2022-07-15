<?php
require './bd.php';
require './functions_handler.php';
session_start();

if (isset($_GET['pubid'])) {
    $pubid = $_GET['pubid'];

    $publicacao_check = $conn->prepare("select * from publicacoes where publicacao_id = ?");
    $publicacao_check->bind_param("i", $_GET['pubid']);
    $publicacao_check->execute();
    $publicacao = $publicacao_check->get_result();

    if ($publicacao->num_rows > 0) {
        $like_check = $conn->prepare("select * from gostos where publicacao_id = ? and user_id = ?");
        $like_check->bind_param("ii", $pubid, $_SESSION['user']['id_user']);
        $like_check->execute();
        $like = $like_check->get_result();
        $like = $like->num_rows;
        if ($like == 0) {
            $gosto = $conn->prepare("insert into gostos (user_id,publicacao_id) values (?,?)");
            $gosto->bind_param("ii", $_SESSION['user']['id_user'], $pubid);
            $gosto->execute();
            $user_para = $publicacao->fetch_assoc()['user_id'];
            notf_gosto($user_para, $gosto->insert_id, $conn);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $remover_gosto = $conn->prepare("delete from gostos where user_id = ? and publicacao_id = ?");
            $remover_gosto->bind_param("ii", $_SESSION['user']['id_user'], $pubid);
            $remover_gosto->execute();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
