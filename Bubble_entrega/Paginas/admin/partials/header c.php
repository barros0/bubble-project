<?php

// conection check
//include('./db_con.php')

// middleware redirect


//

?>

<html lang="pt-pt" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin</title>

    <link rel="stylesheet" href="./public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href="./public/fontawesome-6.0.0/css/all.css">
    <script src="./public/js/jquery.min.js"></script>
    <!--- <script src="./public/bootstrap-5.1.3/js/bootstrap.min.js"></script>--->
    <script src="./public/js/app.js"></script>

</head>
<body>



<div class="flex h100">

    <nav class="menu d-flex flex-column p-3 bg-light">


        <a href="/" class="title d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="../public/img/logo.png" alt="Bubble">
            <span class="fs-4">Dashboard</span>
        </a>

        <hr>

        <ul class="nav nav-pills flex-column mb-auto navigation">
            <li>
                <a href="#" class="nav-link link-dark active">
                    <i class="fa fa-clock"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa fa-users"></i>
                    Utilizadores
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa fa-pen"></i>
                    Publicações
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa fa-warning"></i>
                    Reports
                </a>
            </li>
        </ul>
        <div class="dropdown">
            <a id="open_admin_menu_down" href="#"
               class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle">
                <div class="user-img">
                    <img src="https://thispersondoesnotexist.com/image" alt="">
                </div>
                <strong>Joana Castanha</strong>
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

    <script>

        $(document).ready(function () {
            $('#open_admin_menu_down').click(function () {
                $('#admin_menu_down').toggleClass('show')
            })
        })
    </script>

    <main class="container">

        <div class="top-bar">

            <div hidden class="mini-menu border" id="mini-menu">

                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li><a href="#"><i class="fa fa-key"></i> Terminar sessão</a></li>
                </ul>
            </div>

        </div>