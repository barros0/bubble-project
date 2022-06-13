<?php
require('./bd.php');
session_start();


$comentario = $_REQUEST['textarea'];

header('location:eventos.php');
