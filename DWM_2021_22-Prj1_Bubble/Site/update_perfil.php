<?php
require('./bd.php');
session_start();

$sobre = $_REQUEST['SobrePerfil']; //TEXTO DO SOBRE TI
$skills = $_REQUEST['skills_perfil']; //TEXTO DAS SKILLS
$foto_perfil = $_FILES['FotoPerfil']; //FOTO PERFIL
$foto_banner = $_FILES['BannerPerfil']; //BANNER PERFIL

//BUSCAR AS IMAGEMS DE PERFIL E BANNER
$imagem_perfil = $_FILES['FotoPerfil']['name'];
$imagem_banner = $_FILES['BannerPerfil']['name'];

//BUSCAR A EXTENSAO DAS IMAGENS
$extensao_perfil = pathinfo($imagem_perfil, PATHINFO_EXTENSION);
$extensao_banner = pathinfo($imagem_banner, PATHINFO_EXTENSION);

//PASTA ONDE SAO INSERIDAS AS IMAGENS
$folder_perfil = "img/fotos_perfil/";
$folder_banner = "img/fotos_banner/";

//MUDAR O NOME DAS IMAGENS
$novo_ficheiro_perfil = sha1(microtime()) . "." . $extensao_perfil;
$novo_ficheiro_banner = sha1(microtime()) . "." . $extensao_banner;


if (move_uploaded_file($_FILES['FotoPerfil']['tmp_name'], $folder_perfil.$novo_ficheiro_perfil)) {
    if (move_uploaded_file($_FILES['BannerPerfil']['tmp_name'], $folder_banner.$novo_ficheiro_banner)) {
        $qeditarperfil = "UPDATE users (banner_image,profile_image) VALUES ('".$foto_banner."','".$foto_perfil."')";
        $editar = $conn->query($qeditarperfil);
    }
}

//$query = "UPDATE users column_name='".$name."', ' ... WHERE id='".$_SESSION['id']."'";
?>