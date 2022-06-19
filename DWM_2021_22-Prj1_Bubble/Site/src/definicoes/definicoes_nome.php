<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];

$nome = $_REQUEST['nome'];

if ($nome != "") {
    $qupdate_nome = "UPDATE users SET nome = '$nome' WHERE id_user = " . $userid;
    $updatenome = $conn->query($qupdate_nome);
}


header('location:../../definicoes_geral.php');