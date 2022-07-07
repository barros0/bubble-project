<?php
require('./partials/db_con.php');
session_start();

$id_report = $_GET['id_report'];

$update_report = $conn->query("UPDATE reports SET estado = 3 WHERE id_report = " . $id_report);

array_push($_SESSION['alerts']['success'], "Rejeitado com sucesso!");
header('location:./reports.php');
