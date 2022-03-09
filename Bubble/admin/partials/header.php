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
<div class="flex">

<nav class="menu">

    <div class="title text-center">
        <img src="../public/img/logo.png" alt="Bubble">
        <h2>Dashboard</h2>
    </div>


    <div class="navigation">

        <ul>
            <li>Dashboard</li>

        </ul>

    </div>
</nav>

<main class="container">

