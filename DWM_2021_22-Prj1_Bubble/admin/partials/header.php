<?php

// conection check
//include('./db_con.php')

// middleware redirect

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

</head>
<body>

<div class="preloader" id="preloader">
    <div class="center">
        <img class="logo" src="./public/images/logo_bubble.svg" alt="">
        <span class="bar"></span>
    </div>
</div>

    <nav class="menu d-flex flex-column p-3">

        <a href="/" class="title d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <img src="./public/images/logo.png" alt="Bubble">
            <span class="fs-4">Dashboard</span>
        </a>

        <hr>

        <ul class="nav nav-pills flex-column mb-auto navigation">
            <li>
                <a href="./index.php" class="nav-link active">
                    <i class="fa fa-clock"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="./users.php" class="nav-link">
                    <i class="fa fa-users"></i>
                    Utilizadores
                </a>
            </li>
            <li>
                <a href="./publicacoes.php" class="nav-link">
                    <i class="fa fa-pen"></i>
                    Publicações
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class="fa fa-warning"></i>
                    Reports
                </a>
            </li>
        </ul>

        <div class="dropdown">
            <a id="open_admin_menu_down" href="#"
               class="d-flex align-items-center text-decoration-none dropdown-toggle">
                <div class="user-img">
                    <img src="https://thispersondoesnotexist.com/image" alt="">
                </div>
                <strong>Joana Castanha</strong>
            </a>
            <ul class="dropdown-menu text-small shadow admin-menu-down" id="admin_menu_down">
                <li>
                    <div class="bt-mode">
                    <input type="checkbox" class="checkbox" id="checkbox">
                    <label for="checkbox" class="label">
                        <i class="fas fa-moon"></i>
                        <i class='fas fa-sun'></i>
                        <span class='bola'>
                    </label>
                    </div>
                </li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-settings"></i> Definições</a></li>

                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#"><i class="fa fa-key"></i> Terminar Sessão</a></li>
            </ul>
        </div>
    </nav>
<div id="hamburger" onclick="this.classList.toggle('open');">
    <svg width="100" height="100" viewBox="0 0 100 100">
        <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
        <path class="line line2" d="M 20,50 H 80" />
        <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
    </svg>
</div>
    <script>

        $(document).ready(function () {
            $('#open_admin_menu_down').click(function () {
                $('#admin_menu_down').toggleClass('show')
            })
        })
    </script>

    <main class="container">

