<?php
$texto = $_REQUEST['text'];
$imagem = $_REQUEST['file'];

$sql = "INSERT INTO publicacoes  VALUES ('$texto','$imagem')";


?>