<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="shortcut icon" type="image/jpg" href="img/logo.ico"/>-->
    <!--CSS-->
    <link rel="stylesheet" href="css/mensagens.css">
    <link rel="stylesheet" href="css/header.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap" rel="stylesheet">
    
    <?php 

    $pagina = basename($_SERVER["REQUEST_URI"]);

    $nomePagina = "";

    if ($pagina == 'mensagens.php') { 

        $nomePagina = "ZAZA";

    } else if ($pagina == 'index.php') {

    }

    ?>

  <title>Bubbles | <?php echo $nomePagina?> </title>

</head>

<body>

    <nav>
        <div id="nav">
            <a href="feed.html"><img class="logo" src="img/header/Untitled-2.png" alt="logo"></a>
            <span id="space"></span>
            <ul class="navbar">
                <li>Feed</li>
                <li>Mensagens</li>
                <li>Marketplace</li>
                <li>Notificações</li>
            </ul>
            <div class="icon_perfil">
                <div class="perfil">
                    <img class="img_perfil" src="img/header/download.png" alt="fotoperfil">
                    <p>Joãozinho</p>
                </div>
            </div>
        </div>
        <div class="popup_perfil">
            <ul>
                <li><a href="feed.html"><img src="img/header/download.png" alt="fotoperfil">
                        <div id="ver_perfil"><span>Joãozinho</span><span id="ver_perfil_span">Ver Perfil</span>
                        </div>
                    </a>
                </li>
                <li><a href=""><i class='bx bx-group'></i>Amigos</a></li>
                <li><a href=""><i class='bx bx-star'></i>Favoritos</a></li>
                <li><a href=""><i class='bx bx-cog'></i>Definições</a></li>
                <li><a href=""><i class='bx bx-log-in-circle'></i>Terminar Sessão</a></li>
            </ul>
        </div>
    </nav>