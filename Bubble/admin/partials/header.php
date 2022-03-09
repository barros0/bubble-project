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
    <script src="./public/js/app.js"></script>
</head>
<body>


<div class="top-bar">

    <div class="user" id="admin-mini-menu">
        
        <div class="user-img">
            <img src="https://thispersondoesnotexist.com/image" alt="">
        </div>

        <div class="nome">
            <p>$user->name</p>
        </div>

        <i class="fa fa-angle-down"></i>
    </div>



    <div class="mini-menu border show" id="mini-menu">


        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li><a href="#"><i class="fa fa-key"></i> Terminar sessão</a></li>
        </ul>
    </div>

</div>
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

</nav>

<main class="container">

