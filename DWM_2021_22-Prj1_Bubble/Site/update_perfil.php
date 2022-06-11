<?php
require('./bd.php');
session_start();

$sobre = $_REQUEST['SobrePerfil']; //TEXTO DO SOBRE TI
$skills = $_REQUEST['skills_perfil']; //TEXTO DAS SKILLS
$imagem_perfil = $_FILES['FotoPerfil']['name']; //foto_perfil
$imagem_banner = $_FILES['BannerPerfil']['name']; //foto_banner

//ATUALIZAR O SOBRE
//ATUALIZAR AS SKILLS
$qupdatesobreskills = "UPDATE users SET sobre = '$sobre',skills = '$skills' WHERE id_user = " . $_SESSION['user']['id_user'];
$updatesobreskills = $conn->query($qupdatesobreskills);

//BUSCAR AS IMAGEMS DE PERFIL E BANNER
if ($imagem_perfil != "") {
    $extensao_perfil = pathinfo($imagem_perfil, PATHINFO_EXTENSION);
    $folder_perfil = "img/fotos_perfil/";
    $novo_ficheiro_perfil = sha1(microtime()) . "." . $extensao_perfil;
    if (move_uploaded_file($_FILES['FotoPerfil']['tmp_name'], $folder_perfil . $novo_ficheiro_perfil)) {
        $qeditarfotoperfil = "UPDATE users SET profile_image = '$novo_ficheiro_perfil' WHERE id_user = " . $_SESSION['user']['id_user'];
        $editar_foto_perfil = $conn->query($qeditarfotoperfil);
    }
}

if ($imagem_banner != "") {
    $extensao_banner = pathinfo($imagem_banner, PATHINFO_EXTENSION);
    $folder_banner = "img/fotos_banner/";
    $novo_ficheiro_banner = sha1(microtime()) . "." . $extensao_banner;
    if (move_uploaded_file($_FILES['BannerPerfil']['tmp_name'], $folder_banner . $novo_ficheiro_banner)) {
        $qeditarbannerperfil = "UPDATE users SET banner_image = '$novo_ficheiro_banner' WHERE id_user = " . $_SESSION['user']['id_user'];
        $editar_foto_banner = $conn->query($qeditarbannerperfil);
    }
}

header('location:perfil.php');