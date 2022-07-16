<?php

require "./partials/db_con.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// para "apagar" user e colocar estado com 5
if (isset($_GET['delete_userid'])) {

    $userid = intval($_GET['delete_userid']);


    $user_s = $conn->prepare("select * from users where id_user =  ?");
    $user_s->bind_param("i", $userid);
    $user_s->execute();
    $user_r = $user_s->get_result()->num_rows;
    $user_s->close();

    if ($user_r < 1) {
        array_push($_SESSION['alerts']['errors'], 'Este user não existe!');
        header('location:./users.php');
        exit;
    }

    $estado = 5;
    $user_delete = $conn->prepare("update users set estado = ? where id_user = ?");
    $user_delete->bind_param("ii", $estado, $_GET['delete_userid']);
    $user_delete->execute();
    $user_delete->close();

    array_push($_SESSION['alerts']['alert'], 'Utilizador eliminado com sucesso!');
    header('location:./users.php');
    exit;
}


if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];


    $user_s = $conn->prepare("select * from users where id_user =  ?");
    $user_s->bind_param("i", $userid);
    $user_s->execute();
    $user = $user_s->get_result()->fetch_assoc();
    $user_s->close();

    if (isset($user)) {

        $email = $_POST['email'];
        if (!empty($_POST['password'])) {
            $password = hash('sha512', $_POST['password']);
        } else {
            $password = $user['password'];
        }

        $estado = $_POST['estado'];

        echo $tipo = $_POST['tipo'];


        $update_user = $conn->prepare("UPDATE users SET email = ?, password = ?, estado = ?, tipo = ? WHERE id_user = ?");
        $update_user->bind_param("ssiii", $email, $password, $estado, $tipo, $userid);
        $update_user->execute();


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