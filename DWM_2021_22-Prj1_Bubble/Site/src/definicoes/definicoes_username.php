<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];

$username = test_input($_REQUEST['username']);

function test_input($username)
{
    $username = htmlspecialchars($username);
    return $username;
}

$existe_username = "select * from users where username='" . $username . "'";
$faz_existe_username = mysqli_query($conn, $existe_username);
$jaexiste_username = mysqli_num_rows($faz_existe_username);

if ($username != "") {
    if ($jaexiste_username == 0) {
        $stmt_update_username = $conn->prepare("UPDATE users SET username = ? WHERE id_user = ?");
        $stmt_update_username->bind_param('si', $username, $userid);
        $stmt_update_username->execute();
        $stmt_update_username->close();
        array_push($_SESSION['alerts']['success'], 'Username Atualizado com Sucesso');
    } else {
        array_push($_SESSION['alerts']['errors'], 'Atualização Falhou');
    }
}

header('location:../../definicoes_geral.php');
