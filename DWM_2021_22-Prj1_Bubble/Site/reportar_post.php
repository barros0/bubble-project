<?php
require('./bd.php');
session_start();

$texto = $_REQUEST['reportar_coment'];
$categoria = $_REQUEST['select_form_reportar'];
$id_pub = $_GET['id_pub'];
$userq = $_SESSION['user']['id_user'];

if ($texto != "") {
    $stmt_report = $conn->prepare("INSERT INTO reports (user_id,categoria,report_comment,publicacao_id) VALUES(?,?,?,?)");
    $stmt_report->bind_param('issi', $userq, $categoria, $texto, $id_pub);

    array_push($_SESSION['alerts']['success'], "Reportado Com Sucesso");

    $stmt_report->execute();
    $stmt_report->close();
} else {
    array_push($_SESSION['alerts']['errors'], "Não foi possível reportar");
}

header('location:feed.php');
