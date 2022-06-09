<?php

require "./partials/db_con.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// para "apagar" user e colocar estado com 5
if (isset($_GET['delete_userid'])) {

    $user = $conn->query('select * from users where id_user =' . $_GET['delete_userid'])->fetch_assoc();
    if (empty($user)) {
        array_push($_SESSION['alerts']['errors'], 'Este user não existe!');
        header('location:./users.php');
    }

    $conn->query('update users set deleted_at = "'.date('Y-m-d H:i:s').'", estado = 5 where id_user =' . $_GET['delete_userid']);
$conn->close();
    array_push($_SESSION['alerts']['alert'], 'Utilizador eliminado com sucesso!');
    header('location:./users.php');
    exit;
}


if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    $user = $conn->query('Select * from users where id_user = ' . $userid)->fetch_assoc();

    if (isset($user)) {

        $email = $_POST['email'];
        if (!empty($_POST['password'])) {
            $password = hash('sha512', $_POST['password']);
        } else {
            $password = $user['password'];
        }

        $estado = $_POST['estado'];


        $conn->query('UPDATE users SET email = "' . $email . '", password = "' .
            $password . '", estado = ' . $estado . ' WHERE id_user =' . $userid);

        array_push($_SESSION['alerts']['success'], 'Utilizador atualizado com sucesso!');
        header('location:./users.php');
        exit;

    } else {

        array_push($_SESSION['alerts']['errors'], 'Este utilizador não existe!');
        header('location:./users.php');
        exit;
        //Este user não existe;
    }
}