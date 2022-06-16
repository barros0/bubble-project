<?php

// conection check
require('db_con.php');

// middleware redirect

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$minutosExpira = 30;
if (isset($_SESSION['ULTIMA_ATIVIDADE']) && (time() - $_SESSION['ULTIMA_ATIVIDADE'] > ($minutosExpira * 60))) {
    session_unset();     // unset $_SESSION
    session_destroy();   // destroy session data
}
$_SESSION['ULTIMA_ATIVIDADE'] = time(); // ATULIZA A ULTIMA_ATIVIDADE


if (!isset($_SESSION['user'])) {

    header('location:../login.php');
    exit();
}

if (empty($_SESSION['user']) || $_SESSION['user']['tipo'] <> 1) {
    header('location:../login.php');
    exit;
}

$user = $conn->query("select * from users where id_user = " . $_SESSION['user']['id_user'])->fetch_assoc();


// files

// converte de bytes para MB ou GB
function converteTamanho($size)
{
    // GB
    $unidade='GB';
   $tamanho =  round($size / pow(1024, 3), 2);

   // se der 0 para gb faz para mb

    if($tamanho<=1){
        $unidade='MB';
        $tamanho =  round($size / pow(1024, 2), 2);
    }

    return $tamanho.' '.$unidade;

}

function tamanhoPasta($path)
{
    $bytestotal = 0;
    $path = realpath($path);
    if ($path !== false && $path != '' && file_exists($path)) {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
            $bytestotal += $object->getSize();
        }
    }
    return converteTamanho($bytestotal);

}

$total_livre =  converteTamanho(disk_free_space ( '../' ));
$imagens_espaco =  tamanhoPasta('../img');
$total_espaco =  tamanhoPasta('../');
$videos_espaco =  tamanhoPasta('../videos');


?>
<!DOCTYPE html>
<html lang="pt-pt" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Admin</title>

    <link rel="stylesheet" href="./public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href="./public/css/menu.css">
    <link rel="stylesheet" href="./public/fontawesome-6.0.0/css/all.css">
    <script src="./public/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <!-- <script src="./public/bootstrap-5.1.3/js/bootstrap.min.js"></script>-->
    <script src="./public/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./public/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <script src="./public/bootstrap-5.1.3/js/bootstrap.bundle.min.js   "></script>

    <link rel="stylesheet" href="./public/calendarjs/dist/css/theme-basic.css" />
    <link rel="stylesheet" href="./public/calendarjs/dist/css/theme-glass.css" />
    <script src="./public/calendarjs/dist/bundle.js"></script>
    <!-- icones-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="preloader" id="preloader">
        <div class="">
            <img class="logo" src="./public/images/logo_bubble.svg" alt="">
            <div class="overlay"></div>
        </div>
    </div>

    <?php
    require('./partials/notificacoes.php');
    ?>

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
                    <a href="./index.php"><i class="fa fa-box icon"></i> Dashboard</a>
                </li>
                <li>
                    <a href="./users.php"><i class="fa fa-users icon"></i> Utilizadores</a>
                </li>
                <li>
                    <a href="./reports.php"><i class="fa fa-warning icon"></i> Reports</a>
                </li>
                <li>
                    <a href="./empregos.php"><i class="fa fa-industry icon"></i> Empregos</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-water icon"></i> Eventos</a>
                </li>
                <li>
                    <a href="./faqs.php"><i class="fas fa-question icon"></i> FAQS</a>
                </li>
            </ul>
        </div>

        <div class="dropdown m-auto menu-admin">
            <a id="open_admin_menu_down" href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle">
                <div class="user-img">
                    <img src=".././img/fotos_perfil/<?=$user['profile_image']?>" alt="">
                </div>
                <strong><?php echo ($user['nome']) ?></strong>
            </a>
            <ul class="dropdown-menu text-small shadow admin-menu-down" id="admin_menu_down">

                <li><a class="dropdown-item" href="#"><i class="fa fa-settings"></i> Definições</a></li>

                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-key"></i> Terminar Sessão</a></li>
            </ul>
        </div>

    </nav>