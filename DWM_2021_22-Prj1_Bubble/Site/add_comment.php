<?php
require('./bd.php');
session_start();

$texto = $_REQUEST['textarea'];

$qcomentar = "INSERT INTO comentarios (user_id,comentario,publicacao_id) VALUES('" . $_SESSION['user']['id_user'] . "','" . $texto . "','".$_GET['id_pub']."')";
$comentario = $conn->query($qcomentar);

header('location:feed.php');
