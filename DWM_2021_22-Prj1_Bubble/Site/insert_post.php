<?php

require('./bd.php');

session_start();

//TEXTO DA PUBLICACAO PARA PUBLICACOES
$texto = $_REQUEST['text'];
$qpublicacao ="INSERT INTO publicacoes (user_id,conteudo,estado) VALUES ('".$_SESSION['user']['id_user']."','".$texto."',1)";
$publicacao = $conn->query($qpublicacao);

//ID DA PUBLICACAO
$idpub = (mysqli_insert_id($conn));
//print_r($idpub);

//IMAGEM DA PUBLICACAO PARA PUBLICACOES_FOTOS
$imagem = $_POST['file'];
echo $imagem;

$publicacao_foto = "INSERT INTO publicacoes_fotos (publicacao_id,caminho) VALUES('".$idpub."','".$imagem."')";

$conn->query($publicacao_foto);



/*$filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

        $folder = "image/".$filename;

if(isset($_FILES['input_file']['name'])) {
    
    //get filename
    $filename = $_FILES['input_file']['name'];
    
    //rename file
    $temp = explode(".", $_FILES["input_file"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    
    //set path
    $target_dir = "../img/publicacoes/";
    
    //upload files in folder
    move_uploaded_file($_FILES['input_file']['tmp_name'], "$target_dir/$newfilename");
    
    //rename file with directory name
    $filenamedirectory = $target_dir/$newfilename;
    
    $statu_prod = 1;
    
    // Registrar en la Base de Datos
    $sql = "INSERT INTO publicacoes_fotos(ident_prod, ident_cate, nombr_prod, desco_prod, desla_prod, preci_prod, pesoo_prod, taman_prod, stock_prod, estad_prod, imag1_prod, statu_prod) 
    VALUES ('$ident_prod',(SELECT ident_cate FROM tabma_cate WHERE ident_cate = '$ident_cate'),'$nombr_prod','$desco_prod','$desla_prod','$preci_prod','$pesoo_prod','$taman_prod','$stock_prod','$estad_prod','$filenamedirectory','$statu_prod') ";
    }*/

?>