<?php

// conection check
require('db_con.php');

// middleware redirect

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    if (empty($_SESSION['user']) || $_SESSION['user']['tipo'] <> 1) {
        header('location:../login.php');
        exit;
    }


?>

<html lang="pt-pt" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin</title>

    <link rel="stylesheet" href="./public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href="./public/css/menu.css">
    <link rel="stylesheet" href="./public/fontawesome-6.0.0/css/all.css">
    <script src="./public/js/jquery.min.js"></script>
    <!--- <script src="./public/bootstrap-5.1.3/js/bootstrap.min.js"></script>--->
    <script src="./public/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="preloader" id="preloader">
    <div class="">
        <img class="logo" src="./public/images/logo_bubble.svg" alt="">
        <div class="overlay" ></div>
    </div>
</div>

<?php
require('./partials/notificacoes.php');?>

<nav class="menu">
<div class="logo">
    <img src="./public/images/logo_bubble.svg" alt="">
</div>
<div class="stitle">
    <p>
        Gerenciar
    </p>
</div>
    <div class="itens">
        <ul>
            <li>
                <a href="#"><i class="fa fa-box icon"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users icon"></i> Utilizadores</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-pen icon"></i> Publicações</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-warning icon"></i> Reports</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-message icon"></i> Mensagens</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-industry icon"></i> Empregos</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-water icon"></i> Eventos</a>
            </li>
            <li>
                <a id="btn-faqs" href="#"><i class="fas fa-question"></i> FAQS</a>
            </li>
        </ul>
    </div>

    <div class="dropdown m-auto menu-admin">
        <a id="open_admin_menu_down" href="#"
           class="d-flex align-items-center link-light text-decoration-none dropdown-toggle">
            <div class="user-img">
                <img src=".././img/users/lopess.png" alt="">
            </div>
            <strong><?php echo($_SESSION['user']['nome']) ?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow admin-menu-down" id="admin_menu_down">

            <li><a class="dropdown-item" href="#"><i class="fa fa-settings"></i> Definições</a></li>

            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-key"></i> Terminar Sessão</a></li>
        </ul>
    </div>

</nav>




