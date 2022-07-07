<?php
require('./partials/db_con.php');
session_start();

$id_report = $_GET['id_report'];

$buscar_publicacao = $conn->query("SELECT publicacao_id from reports where id_report =" . $id_report)->fetch_assoc();

$id_pub = $buscar_publicacao['publicacao_id'];

$update_publicacao = $conn->query("UPDATE publicacoes SET estado_pub = 2 WHERE publicacao_id = " . $id_pub);
$update_report = $conn->query("UPDATE reports SET estado = 2 WHERE id_report = " . $id_report);

array_push($_SESSION['alerts']['success'], "Eliminado com sucesso!");
header('location:./reports.php');