<?php
require('./bd.php');
session_start();

$estado_eliminada = 2;

$conn->query("UPDATE publicacoes SET estado_pub = '$estado_eliminada' WHERE publicacao_id = " . $_GET['id_pub']);

header('location:perfil.php');
