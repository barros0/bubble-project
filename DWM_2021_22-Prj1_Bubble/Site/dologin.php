<?php
include('./bd.php');

session_start();

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_email = "Select * from users where email='" . $email . "'";
    $user = $conn->query($query_email)->fetch_assoc();

//se o user nao existir
    if (!isset($user)) {
        echo('<h2>Não foi encontrado nenhum utilizador registado com este email</h2>');
        array_push($_SESSION['alerts']['errors'], 'Não foi encontrado nenhum utilizador registado com este email');
        header('location:./login.php');
        exit;
    }

// se a password for errada
    if (hash('sha512', $password) <> $user['password']) {
        echo('<h2>Password errada!</h2>');
        array_push($_SESSION['alerts']['errors'], 'Password errada!');
        header('location:./login.php');
        exit;
    }

    $_SESSION['user'] = $user;
    require_once 'page_parts/ip_sessions.php';
    header('location:feed.php');
    exit();


    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query_email = "Select * from users where email='" . $email . "'";
        $user = $conn->query($query_email)->fetch_assoc();

//se o user nao existir
        if (!isset($user)) {
            echo('<h2>Não foi encontrado nenhum utilizador registado com este email</h2>');
            array_push($_SESSION['errors'], 'Não foi encontrado nenhum utilizador registado com este email');
            header('location:./login.php');
            exit;
        }

// se a password for errada
        if (hash('sha512', $password) <> $user['password']) {
            echo('<h2>Password errada!</h2>');
            array_push($_SESSION['errors'], 'Password errada!');
            header('location:./login.php');
            exit;
        }

        $_SESSION['user'] = $user;
        echo('<h2>logged!</h2>');


    }
}
