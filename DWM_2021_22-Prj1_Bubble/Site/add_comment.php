<?php
session_start();
require('./bd.php');
require('./functions_handler.php');


$texto = $_REQUEST['textarea'];
$id_pub = $_GET['id_pub'];
$userid = $_SESSION['user']['id_user'];

$stmt_comment = $conn->prepare("INSERT INTO comentarios (user_id,comentario,publicacao_id) VALUES(?,?,?)");
$stmt_comment->bind_param('isi', $userid, $texto, $id_pub);
$stmt_comment->execute();
$stmt_comment->close();

$id_comentario = mysqli_insert_id($conn);

$iduser_para = ($conn->query('select * from publicacoes where publicacao_id = '.$id_pub)->fetch_assoc())['user_id'];

notf_comentario(2, $iduser_para, $id_comentario,$conn);

header('location:feed.php');
