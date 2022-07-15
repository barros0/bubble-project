<?php
include('./bd.php');

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    

    $query_email = "Select * from users where email='" . $email . "'";
    $user = $conn->query($query_email)->fetch_assoc();


    //se o user nao existir
    if (!isset($user)) {
        echo '<h2>Não foi encontrado nenhum utilizador registado com este email</h2>';
        array_push($_SESSION['alerts']['errors'], 'Não foi encontrado nenhum utilizador registado com este email');
        header('location:./login.php');
        exit;
    }


    $estado = $user["estado"];
    
    if($estado != 2){
        
        switch($estado){
            case 1:
                echo '<h2>Confirme o seu e-mail</h2>';
                array_push($_SESSION['alerts']['errors'], 'Confirme o seu e-mail');
                header('location:./login.php');
                exit;
            break;

            case 3:
                echo '<h2>Conta Desativada</h2>';
                array_push($_SESSION['alerts']['errors'], 'Conta Desativada');
                header('location:./login.php');
                exit;
            break;
            
            case 4:
                echo '<h2>Estado Conta: Suspensa</h2>';
                array_push($_SESSION['alerts']['errors'], 'Estado Conta: Suspensa');
                header('location:./login.php');
                exit;
            break;

            case 5:
                echo '<h2>Estado Conta: Banido</h2>';
                array_push($_SESSION['alerts']['errors'], 'Estado Conta: Banido');
                header('location:./login.php');
                exit;
            break;
        }

        exit;

    }


    // se a password for errada
    if (hash('sha512', $password) <> $user['password']) {
        echo '<h2>Password errada!</h2>';
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
            echo '<h2>Não foi encontrado nenhum utilizador registado com este email</h2>';
            array_push($_SESSION['alerts']['errors'], 'Não foi encontrado nenhum utilizador registado com este email');
            header('location:./login.php');
            exit;
        }

        // se a password for errada
        if (hash('sha512', $password) <> $user['password']) {
            echo '<h2>Password errada!</h2>';
            array_push($_SESSION['alerts']['errors'], 'Password errada!');
            header('location:./login.php');
            exit;
        }

        $_SESSION['user'] = $user;
        echo '<h2>logged!</h2>';
    }
}
