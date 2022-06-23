<?php
require('./bd.php');
session_start();

$texto = $_REQUEST['textarea'];
$id_pub = $_GET['id_pub'];
$userq = $_SESSION['user']['id_user'];

$stmt_comment = $conn->prepare("INSERT INTO comentarios (user_id,comentario,publicacao_id) VALUES(?,?,?)");
$stmt_comment->bind_param('isi', $userq, $texto, $id_pub);
$stmt_comment->execute();
$stmt_comment->close();

header('location:feed.php');
