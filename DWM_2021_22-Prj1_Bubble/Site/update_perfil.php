<?php
require('./bd.php');
session_start();

$sobre = $_REQUEST['SobrePerfil']; //TEXTO DO SOBRE TI
$skills = $_REQUEST['skills_perfil']; //TEXTO DAS SKILLS
$nacionalidade = $_REQUEST['nacionalidade']; //Nacionalidade
$imagem_perfil = $_FILES['FotoPerfil']['name']; //foto_perfil
$imagem_banner = $_FILES['BannerPerfil']['name']; //foto_banner

//ATUALIZAR AS SKILLS E SOBRE
$stmt_sobres_skills = $conn->prepare("UPDATE users SET sobre = ? ,skills = ? WHERE id_user = " . $_SESSION['user']['id_user']);
$stmt_sobres_skills->bind_param('ss', $sobre, $skills);
$stmt_sobres_skills->execute();
$stmt_sobres_skills->close();

if ($nacionalidade != 'None') {
    $stmt_nacionalidades = $conn->prepare("UPDATE users set nacionalidade = ? WHERE id_user = " . $_SESSION['user']['id_user']);
    $stmt_nacionalidades->bind_param('i', $nacionalidade);
    $stmt_nacionalidades->execute();
    $stmt_nacionalidades->close();
}

$uploadOk_perfil = 1;
$error_perfil = "";

//BUSCAR AS IMAGEMS DE PERFIL E BANNER
if ($imagem_perfil != "") {
    $extensao_perfil = strtolower(pathinfo($imagem_perfil, PATHINFO_EXTENSION));
    $folder_perfil = "img/fotos_perfil/";
    $novo_ficheiro_perfil = sha1(microtime()) . "." . $extensao_perfil;

    // VERIFICAR O TAMANHO DO FICHEIRO
    if ($_FILES["FotoPerfil"]["size"] > 10240000) {
        $error_perfil = "O seu ficheiro é demasiado grande (MAX: 10MB).";
        $uploadOk_perfil = 0;
    }

    // VERIFICAR A EXTENSAO DO FICHEIRO
    if ($extensao_perfil != "jpg" && $extensao_perfil != "png" && $extensao_perfil != "jpeg" && $extensao_perfil != "gif") {

        $error_perfil = "Só ficheiros JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk_perfil = 0;
    }

    //VER SE HÁ ERRO
    if ($uploadOk_perfil == 0) {

        $error_perfil = "O seu ficheiro não foi submetido.";
    } else {
        if (move_uploaded_file($_FILES['FotoPerfil']['tmp_name'], $folder_perfil . $novo_ficheiro_perfil)) {
            $stmt_perfil_editar = $conn->prepare("UPDATE users SET profile_image = ? WHERE id_user = " . $_SESSION['user']['id_user']);
            $stmt_perfil_editar->bind_param('s', $novo_ficheiro_perfil);
            $stmt_perfil_editar->execute();
            $stmt_perfil_editar->close();
        }
    }
}

$uploadOk_banner = 1;
$error_banner = '';

if ($imagem_banner != "") {
    $extensao_banner = strtolower(pathinfo($imagem_banner, PATHINFO_EXTENSION));
    $folder_banner = "img/fotos_banner/";
    $novo_ficheiro_banner = sha1(microtime()) . "." . $extensao_banner;

    if ($_FILES["BannerPerfil"]["size"] > 102400000) {
        $error_banner = "O seu ficheiro é demasiado grande (MAX: 10MB).";
        $uploadOk_banner = 0;
    }

    // VERIFICAR A EXTENSAO DO FICHEIRO
    if ($extensao_banner != "jpg" && $extensao_banner != "png" && $extensao_banner != "jpeg" && $extensao_banner != "gif") {

        $error_banner = "Só ficheiros JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk_banner = 0;
    }

    //VER SE HÁ ERRO
    if ($uploadOk_banner == 0) {

        $error_banner = "O seu ficheiro não foi submetido.";
    } else {

        if (move_uploaded_file($_FILES['BannerPerfil']['tmp_name'], $folder_banner . $novo_ficheiro_banner)) {
            $stmt_banner_editar = $conn->prepare("UPDATE users SET banner_image = ? WHERE id_user = " . $_SESSION['user']['id_user']);
            $stmt_banner_editar->bind_param('s', $novo_ficheiro_banner);
            $stmt_banner_editar->execute();
            $stmt_banner_editar->close();
        }
    }
}

header('location:perfil.php');
