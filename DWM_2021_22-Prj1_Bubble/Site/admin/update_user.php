<?php

require "./partials/db_con.php";

if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    $user = $conn->query('Select * from users where id_user = ' . $userid)->fetch_assoc();

    if (isset($user)) {

        $email = $_POST['email'];
        $password = hash('sha512', $_POST['password']);

        $conn->query('UPDATE users SET email = ' . $email . ', password = '.
            $password . ', estado = ' . $_POST['estado']. ',
        WHERE id_user=' . $userid);

    } else {

        array_push($_SESSION['alerts']['errors'],'Este utilizador não existe!');
        header('location:./users.php');
        exit;
        //Este user não existe;
    }
}