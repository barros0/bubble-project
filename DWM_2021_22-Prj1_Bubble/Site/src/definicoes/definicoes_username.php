<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];

$username = $_REQUEST['username'];

if ($username != "") {
    $qupdate_username = "UPDATE users SET username = '$username' WHERE id_user = " . $userid;
    $updateusername = $conn->query($qupdate_username);
}


header('location:../../definicoes_geral.php');