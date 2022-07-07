<?php
require('./bd.php');
session_start();

$estado_eliminada = 2;
$id_publicacao = $_GET['id_pub'];
$id_user_session = $_SESSION['user']['id_user'];

$dono_pub_perfil = $conn->prepare("select * from publicacoes where publicacao_id= ?");
$dono_pub_perfil->bind_param("i", $id_publicacao);
$dono_pub_perfil->execute();
$result = $dono_pub_perfil->get_result();
$result = $result->fetch_assoc();

//proteção
if ($result['user_id'] == $id_user_session) {
    $delete_post_perfil = $conn->prepare("UPDATE publicacoes SET estado_pub = ? WHERE publicacao_id = ?");
    $delete_post_perfil->bind_param("ii", $estado_eliminada, $id_publicacao);
    $delete_post_perfil->execute();
    $delete_post_perfil->close();
    $result = $conn->close();

    array_push($_SESSION['alerts']['success'], "Eliminado com sucesso!");
} else {
    array_push($_SESSION['alerts']['errors'], "Não podes eliminar uma publicação que não seja tua!");
}
header('location:perfil.php');
