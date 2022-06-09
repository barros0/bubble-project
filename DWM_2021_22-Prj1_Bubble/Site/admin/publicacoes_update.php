<?php

require "./partials/db_con.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if(isset($_GET['remove_comentarioid'])){

    $comentario = $conn->query('select * from comentarios where user_id = '.$_GET['remove_comentarioid'])->fetch_assoc();

if(!empty($comentario)){
    array_push($_SESSION['alerts']['errors'], 'Este comentario não existe!');
    header('location:./publicacoes.php');
}

    $conn->query('update comentarios set deleted_at = "'.date('Y-m-d H:i:s').'", estado = 3 where comentario_id = '.$_GET['remove_comentarioid'])->fetch_assoc();
    $conn->close();

    array_push($_SESSION['alerts']['alert'], 'Comentario removido!');
    header('location:./publicacoes.php');
}