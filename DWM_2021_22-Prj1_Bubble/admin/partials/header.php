<?php

// conection check
//include('./db_con.php')

// middleware redirect

$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$path .= $_SERVER["SERVER_NAME"] . '/projeto/DWM_2021_22-Prj1_Bubble/admin'/*dirname($_SERVER["PHP_SELF"])*/
;


$ppath = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
$ppath .= $_SERVER["SERVER_NAME"] . '/projeto/DWM_2021_22-Prj1_Bubble/site'/*dirname($_SERVER["PHP_SELF"])*/
;

?>

<html lang="pt-pt" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin</title>

    <link rel="stylesheet" href="<?php echo($path) ?>/public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo($path) ?>/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo($path) ?>/public/css/menu.css">
    <link rel="stylesheet" href="<?php echo($path) ?>/public/fontawesome-6.0.0/css/all.css">
    <script src="<?php echo($path) ?>/public/js/jquery.min.js"></script>
    <!--- <script src="./public/bootstrap-5.1.3/js/bootstrap.min.js"></script>--->
    <script src="<?php echo($path) ?>/public/js/app.js"></script>

</head>
<body>

<div class="preloader" id="preloader">
    <div class="center">
        <img class="logo" src="<?php echo($ppath) ?>/img/logo_bubble.svg" alt="">
        <span class="bar"></span>
    </div>
</div>

<div class="flex h100">

    <nav class="menu d-flex flex-column p-3">

        <a href="/" class="title d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <img src="<?php echo($ppath) ?>/img/logo.png" alt="Bubble">
            <span class="fs-4">Dashboard</span>
        </a>

        <hr>

        <ul class="nav nav-pills flex-column mb-auto navigation">
            <li>
                <a href="<?php echo($path) ?>/index.php" class="nav-link active">
                    <i class="fa fa-clock"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="<?php echo($path) ?>/users/users.php" class="nav-link">
                    <i class="fa fa-users"></i>
                    Utilizadores
                </a>
            </li>
            <li>
                <a href="<?php echo($path) ?>/publicacoes/publicacoes.php" class="nav-link">
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

    <script>

        $(document).ready(function () {
            $('#open_admin_menu_down').click(function () {
                $('#admin_menu_down').toggleClass('show')
            })
        })
    </script>

    <main class="container">

