<!DOCTYPE html>
<html lang="pt-PT">

<?php
require('./bd.php');

$query = "select * from users";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['errors'] = array();


$minutosExpira = 30;
if (isset($_SESSION['ULTIMA_ATIVIDADE']) && (time() - $_SESSION['ULTIMA_ATIVIDADE'] > ($minutosExpira * 60))) {
    session_unset();     // unset $_SESSION
    session_destroy();   // destroy session data
}
$_SESSION['ULTIMA_ATIVIDADE'] = time(); // ATULIZA A ULTIMA_ATIVIDADE


if (!isset($_SESSION['user'])) {

    header('location:login.php');
    exit();
}

$user = $_SESSION['user'];

//buscar os dados do utilizador na base de dados

$userq = $conn->query('select * from users inner join nacionalidades 
    on users.nacionalidade = nacionalidades.nacionalidade_id where users.id_user = ' . $_SESSION['user']['id_user'])->fetch_assoc();

// vai buscar as 6 pesquisas mais recentes
$historico = $conn->query('select * from historico_pesquisa where id_utilizador = ' . $userq['id_user'] . ' order by created_at desc LIMIT 6');

?>

<head>

    <!--Meta Tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bubble - A tua Rede Social">
    <meta name="keywords" content="Rede Social Bubble">
    <!--FavIcon-->
    <link rel="shortcut icon" type="image/jpg" href="img/header/logo_small_bubble.ico" />
    <!--Bootstrap-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!--CSS Geral-->
    <link rel="stylesheet" href="css/styles.css">

    <link rel="stylesheet" href="css/header.css">
    <!--Icones-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.4.4/css/flag-icons.min.css" />
    <!--JQuery-->
    <script src="js/jquery-3.6.0.min.js"></script>


    <?php

    //buscar nome e url da pagina
    $pags = $conn->query('SELECT * FROM paginas_site');

    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    //mudar o css e o nome da pagina dinamicamente

    while ($row = $pags->fetch_assoc()) {

        $row['id_pag'];
        $urlpag = $row['urlpagina'];
        $nomepag = $row['nomepagina'];

        //buscar ficheiros css associados
        $css = $conn->query('SELECT * FROM files_css_paginas_site WHERE id_pagina = ' . $row['id_pag']);

        if (strpos($url, $urlpag) !== false) {

            while ($rowcss = $css->fetch_assoc()) {

                $csspag = $rowcss['ficheirocss'];

                //Ficheiros CSS específicos das páginas
    ?>

                <link rel="stylesheet" href="<?php echo $csspag ?>">

            <?php

            }

            //mudar o título da página
            ?>
            <title>Bubble | <?php echo $nomepag ?> </title>
    <?php
        }
    }

    function active_header($currect_page)
    {
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);
        if ($currect_page == $url) {
            echo 'custom_active_header'; //class name in css 
        }
    }
    ?>


</head>

<!--Inicio da Navbar-->

<body>
    <?php
    require('./page_parts/notificacoes.php')
    ?>
    <!--NAV BAR PC-->

    <div id="nav_bar_computer" class="container-fluid fixed-top">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
            <a href="feed.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none logo_header">
                <img class="logo" src="img/header/logo_bubble.svg" alt="logo">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav_bar_ul">
                <li class="navbar_li <?php active_header('feed.php'); ?>"><a href="feed.php" class="nav-link px-2"><i class='bx bx-home-alt'></i></a></li>
                <li class="navbar_li <?php active_header('mensagens.php'); ?>"><a href="mensagens.php" class="nav-link px-2"><i class='bx bx-chat'></i></a></li>
                <li class="navbar_li <?php active_header('notificacoes.php'); ?>"><a href="./notificacoes.php" class="nav-link px-2"><i class='bx bx-bell'></i></a></li>
                <li class="navbar_li searchbar_toggle"><i class='bx bx-search searchbar_icon'></i></li>
                <li class="navbar_li button_post_pc"><i class='bx bx-plus-circle plus_icon'></i></li>
            </ul>

            <div class="d-flex col-md-3 justify-content-end align-items-center icon_perfil">
                <img id="user_img" src="img/fotos_perfil/<?php echo $userq['profile_image'] ?>" width="50" alt="logo">
                <span id="user_name"><?php echo $userq['nome'] ?></span>
            </div>
        </header>
    </div>

    <!--SEARCH BAR NAV BAR PC-->

    <div class="popup_searchbar">
        <div class="wrapper_searchbar">
            <form class="form_searchbar" method="get" action="pesquisa.php">
                <div class="div_input_searchbar">
                    <input type="text" class="input_searchbar" placeholder="Search here..." name="search" required="required" value="" />
                    <span class="input_search_group_btn">
                        <button class="button_searchbar"><i class='bx bx-search'></i></button>
                    </span>
                </div>
            </form>
            <div class="barra"></div>

            <?php
            foreach ($historico as $pesquisa) {

            ?>
                <div class="recent_pesquisa">
                    <p><?= $pesquisa['pesquisa'] ?></p>
                    <i class='bx bx-x'></i>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!--FAZER UM POST NA NAV BAR-->

    <div class="modal_make_post">
        <div class="make_post">
            <div class="header_post">
                <div class="circles one"></div>
                <div class="circles two"></div>
                <div class="circles three"></div>
            </div>
            <form action="insert_post.php" method="POST" id="post" enctype="multipart/form-data">
                <div class="textarea">
                    <textarea maxlength="255" name="text" id="textarea" placeholder="O que estás a programar?"></textarea>
                </div>
                <div class="img_post">
                    <img id="img_post" src="#" alt="photo_post">
                    <i id="cancel_btn" class='bx bx-x'></i>
                </div>
                <div class="buttons_post">
                    <div class="upload_img" onchange="previewFile()">
                        <button class="upload_btn"><i class='bx bx-plus'></i></button>
                        <input id="input_file" type="file" name="foto_public">
                    </div>
                    <div class="post_button">
                        <button id="post_btn" type="submit" name="post">Publicar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--POP UP PERFIL PC-->

    <div class="popup_perfil">
        <ul>
            <li><a href="perfil.php?username=<?= $userq['username'] ?>"><img src="img/fotos_perfil/<?php echo $userq['profile_image'] ?>" alt="fotoperfil">
                    <div id="ver_perfil"><span class="nome-popup"> <?php echo $userq['nome'] ?>
                        </span><span id="ver_perfil_span">Ver Perfil</span>
                    </div>
                </a>
            </li>
            <?php if ($userq['tipo'] == 1) { ?>
                <li><a href="./admin"><i class='bx bx-user'></i>Administração</a></li>
            <?php } ?>
            <li><a href="conexoes_seguidores.php"><i class='bx bx-group'></i>Conexões</a></li>
            <li><a href="./saved-liked.php"><i class='bx bx-star'></i>Favoritos e Gostados</a></li>
            <li><a href="definicoes_geral.php"><i class='bx bx-cog'></i>Definições</a></li>
            <li><a href="logout.php"><i class='bx bx-log-in-circle'></i>Terminar Sessão</a></li>
        </ul>
    </div>

    <!--NAV BAR PARTE DE CIMA MOBILE RESPONSIVE-->

    <div id="nav_bar_responsive">
        <header class="">
            <div class="logo_responsive">
                <a href="feed.php">
                    <img class="logo" src="img/header/logo_bubble.svg" alt="logo">
                </a>
            </div>
            <div class="user_responsive">
                <div class="wrap_user icon_perfil">
                    <img id="user_img_responsive" src="img/fotos_perfil/<?php echo $userq['profile_image'] ?>" width="50" alt="logo">
                    <span id="user_name_responsive"><?php echo $userq['nome'] ?></span>
                </div>
            </div>
        </header>
    </div>

    <!--NAV BAR PARTE DE BAIXO MOBILE RESPONSIVE-->

    <div id="nav_bar_bottom_responsive">
        <header class="">
            <div class="list">
                <ul>
                    <li class="menu_toggle"><i class='bx bx-menu menu_icon'></i></li>
                    <li class="mensagens.php"><a href=""><i class='bx bx-chat'></i></a></li>
                    <li class="notificacoes.php"><a href=""><i class='bx bx-bell'></i></a></li>
                    <li class="searchbar_toggle"><i class='bx bx-search searchbar_icon'></i></li>
                    <li class="button_post"><i class='bx bx-plus-circle plus_icon'></i></li>
                </ul>
            </div>
        </header>
    </div>

    <div class="menu">
        <div class="conteudo_menu">
            <ul>
                <li><a href="feed.php"><i class='bx bx-home-alt'></i>Feed</a></li>
                <li><a href="conexoes_seguidores.php"><i class='bx bx-group'></i>Conexões</a></li>
                <li><a href="marketplace.php"><i class='bx bx-store-alt'></i>Marketplace</a></li>
                <li><a href="empregos.php"><i class='bx bxs-megaphone'></i>Oferta de Emprego</a></li>
                <li><a href="eventos.php"><i class='bx bx-calendar-event'></i>Eventos</a></li>
                <li><a href="faqs.php"><i class='bx bx-question-mark'></i>FAQS</a></li>

            </ul>
        </div>
    </div>

    <noscript>Por Favor ative o JavaScript nas definições do seu Browser para uma melhor experiência. Pode consultar
        como o fazer clicando <a href="https://support.microsoft.com/pt-pt/office/ativar-javascript-7bb9ee74-6a9e-4dd1-babf-b0a1bb136361" target="_blank">aqui</a>
    </noscript>