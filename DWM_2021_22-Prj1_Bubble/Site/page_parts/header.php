<!DOCTYPE html>
<html lang="pt-PT">

<?php

//Buscar estes valores a base de dados para colocar nas tags

$palavrasChave = ""; //palavras chaves
$descricaoSite = ""; //descrição do site
$nomePagina = "Mensagens"; //nome da Página
$pagina = basename($_SERVER["REQUEST_URI"]); //vai buscar o url da página

//buscar os dados do utilizador na base de dados

$fotoPerfil = ""; //url da foto de perfil
$nome = "Joãozinho"; //nome do user
$sobreNome = "Mineiro"; //sobrenome do user
$admin = ""; //verificar se o utilizador é admin

?>

<head>
    <!--Meta Tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" <?php echo $descricaoSite ?> ">
    <meta name="keywords" content=" <?php echo $palavrasChave ?> ">
    <!--FavIcon-->
    <link rel="shortcut icon" type="image/jpg" href="img/header/logo_small_bubble.ico" />
    <!--CSS Geral-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <!--<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">-->
    <!--Icones-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!--Mudar folha de estilos conforme a página-->

    <?php

    if ($pagina == 'mensagens.php') {  
    ?>
    <link rel="stylesheet" href="css/mensagens.css">

    <?php
    } else if ($pagina == 'feed.php') {
        $nomePagina = "Pagina Principal"
    ?>
    <link rel="stylesheet" href="css/feed.css">

    <?php
    } else if ($pagina == 'eventos.php') {
        $nomePagina = "Eventos"
    ?>
    <link rel="stylesheet" href="css/eventos.css">

    <?php
    } else if ($pagina == 'faqs.php') {
    ?>
    <link rel="stylesheet" href="css/faqs.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">


    <?php
    } else if ($pagina == 'marketplace.php') {
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/anaStyles.css">

    <?php }
    ?>

    <!--Mudar o título da página-->
    <title>Bubble | <?php echo $nomePagina ?> </title>

</head>

<body>
    <div id="nav_bar_computer" class="container-fluid fixed-top">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
            <a href="feed.php"
                class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none logo_header">
                <img class="logo" src="img/header/logo_bubble.svg" alt="logo">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="navbar_li"><a href="feed.php" class="nav-link px-2"><i class='bx bx-home-alt'></i></a></li>
                <li class="navbar_li"><a href="mensagens.php" class="nav-link px-2"><i class='bx bx-chat'></i></a></li>
                <li class="navbar_li"><a href="" class="nav-link px-2"><i class='bx bx-bell'></i></a></li>
                <li class="navbar_li" id="searchbar"><i class='bx bx-search searchbar_icon'></i></li>
                <li class="navbar_li" id="button_post"><i class='bx bx-plus-circle plus_icon'></i></li>
            </ul>

            <div class="d-flex col-md-3 justify-content-end align-items-center icon_perfil">
                <img id="user_img" src="img/header/download.png" width="50" alt="logo">
                <span id="user_name">Joazinho Mineiro</span>
            </div>
        </header>
    </div>
    <div class="popup_searchbar">
        <div class="wrapper_searchbar">
            <form class="form_searchbar" method="POST" action="index.php">
                <div class="div_input_searchbar">
                    <input type="text" class="input_searchbar" placeholder="Search here..." name="keyword"
                        required="required" value="" />
                    <span class="input_search_group_btn">
                        <button class="button_searchbar" name="search"><i class='bx bx-search'></i></button>
                    </span>
                </div>
            </form>
            <div class="barra"></div>
            <div class="recent_pesquisa">
                <p>JavaScript</p>
                <i class='bx bx-x'></i>
            </div>
            <div class="recent_pesquisa">
                <p>HTML forms</p>
                <i class='bx bx-x'></i>
            </div>
        </div>
    </div>
    <div class="modal_make_post">
        <div class="make_post">
            <div class="header_post">
                <div class="circles one"></div>
                <div class="circles two"></div>
                <div class="circles three"></div>
            </div>
            <form method="POST" id="post">
                <div class="textarea">
                    <textarea maxlength="255" name="textarea" id="textarea"
                        placeholder="O que estás a programar?"></textarea>
                </div>
                <div class="img_post">
                    <img id="img_post" src="#" alt="photo_post">
                    <i id="cancel_btn" class='bx bx-x'></i>
                </div>
                <div class="buttons_post">
                    <div class="upload_img" onchange="previewFile()">
                        <button class="upload_btn"><i class='bx bx-plus'></i></button>
                        <input id="input_file" type="file" accept="image/png,image/jpeg,image/bmp,image/gif"
                            name="myfile">
                    </div>
                    <div class="post_button">
                        <button id="post_btn" type="submit" name="post">Publicar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="popup_perfil">
        <ul>
            <li><a href="perfil.php"><img src="img/header/download.png" alt="fotoperfil">
                    <div id="ver_perfil"><span class="nome-popup"> <?php echo $nome ?> <?php echo $sobreNome ?>
                        </span><span id="ver_perfil_span">Ver Perfil</span>
                    </div>
                </a>
            </li>
            <li><a href="#"><i class='bx bx-group'></i>Amigos</a></li>
            <li><a href="#"><i class='bx bx-star'></i>Favoritos</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Definições</a></li>
            <li><a href="#"><i class='bx bx-log-in-circle'></i>Terminar Sessão</a></li>
        </ul>
    </div>

    <div id="nav_bar_responsive">
        <header class="">
            <div class="logo_responsive">
                <a href="feed.php">
                    <img class="logo" src="img/header/logo_bubble.svg" alt="logo">
                </a>
            </div>
            <div class="user_responsive">
                <div class="wrap_user">
                    <img id="user_img_responsive" src="img/header/download.png" width="50" alt="logo">
                    <span id="user_name_responsive">Joazinho Mineiro</span>
                </div>
            </div>
        </header>
    </div>
    <div id="nav_bar_bottom_responsive">
        <header class="">
            <div class="list">
                <ul>
                    <li class=""><a href=""><i class='bx bx-menu'></i></a></li>
                    <li class=""><a href="mensagens.php"><i class='bx bx-chat'></i></a></li>
                    <li class=""><a href=""><i class='bx bx-bell'></i></a></li>
                    <li class=""><i class='bx bx-search searchbar_icon'></i></li>
                    <li class=""><i class='bx bx-plus-circle plus_icon'></i></li>
                </ul>
            </div>
        </header>
    </div>

    <noscript>Por Favor ative o JavaScript nas definições do seu Browser para uma melhor experiência. Pode consultar
        como o fazer clicando <a
            href="https://support.microsoft.com/pt-pt/office/ativar-javascript-7bb9ee74-6a9e-4dd1-babf-b0a1bb136361"
            target="_blank">aqui</a>
    </noscript>