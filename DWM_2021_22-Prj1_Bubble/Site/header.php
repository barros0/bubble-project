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
    <link rel="shortcut icon" type="image/jpg" href="img/logo.ico" />
    <!--CSS Geral-->
    <link rel="stylesheet" href="css/header.css">
    <!--<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">-->
    <!--Icones-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!--Mudar folha de estilos conforme a página-->

    <?php

    if ($pagina == 'mensagens.php') {   ?>

        <link rel="stylesheet" href="css/mensagens.css">

    <?php

    } else if ($pagina == 'index.php') {

    } else if ($pagina == 'feed.php') { ?>

        <link rel="stylesheet" href="css/feed.css">

    <?php

    }

    ?>

    <!--Mudar o título da página-->
    <title>Bubble | <?php echo $nomePagina ?> </title>

</head>

<body>
    <header>
        <nav>
            <div id="nav">
                <a href="feed.php"><img class="logo" src="img/header/logo_bubble.svg" alt="logo"></a>
                <span id="space"></span>
                <ul class="barranav">
                    <li><i class='bx bx-home-alt'></i></li>
                    <li><i class='bx bx-store-alt'></i></li>
                    <li><i class='bx bx-chat'></i></li>
                    <li><i class='bx bx-bell'></i></li>
                </ul>
                <div class="icon_perfil">
                    <div class="perfil">
                        <img class="img_perfil" src="img/header/download.png" alt="fotoperfil">
                        <p class="nomeuser"> <?php echo $nome ?> </p>
                    </div>
                </div>
            </div>
            <div class="popup_perfil">
                <ul>
                    <li><a href="#"><img src="img/header/download.png" alt="fotoperfil">
                            <div id="ver_perfil"><span class="nome-popup"> <?php echo $nome ?> <?php echo $sobreNome ?> </span><span id="ver_perfil_span">Ver Perfil</span>
                            </div>
                        </a>
                    </li>
                    <li><a href="#"><i class='bx bx-group'></i>Amigos</a></li>
                    <li><a href="#"><i class='bx bx-star'></i>Favoritos</a></li>
                    <li><a href="#"><i class='bx bx-cog'></i>Definições</a></li>
                    <li><a href="#"><i class='bx bx-log-in-circle'></i>Terminar Sessão</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <noscript>Por Favor ative o JavaScript nas definições do seu Browser para uma melhor experiência. Pode consultar como o fazer clicando <a href="https://support.microsoft.com/pt-pt/office/ativar-javascript-7bb9ee74-6a9e-4dd1-babf-b0a1bb136361" target="_blank">aqui</a> </noscript>

</body>