<?php
require('./bd.php');
session_start();

$estado_eliminada = 2;
$id_publicacao = $_GET['id_pub'];
$id_user_session = $_SESSION['user']['id_user'];

$dono_pub = $conn->query("select * from publicacoes where publicacao_id=" . $id_publicacao)->fetch_assoc();
//proteção
if ($dono_pub['user_id'] === $id_user_session) {
    $delete_post = $conn->query("UPDATE publicacoes SET estado_pub = '$estado_eliminada' WHERE publicacao_id = " . $id_publicacao);
    $delete_post = $conn->close();
    array_push($_SESSION['alerts']['success'], "Eliminado com sucesso!");
} else {
    array_push($_SESSION['alerts']['errors'], "Não podes eliminar uma publicação que não seja tua!");
}
header('location:feed.php');
