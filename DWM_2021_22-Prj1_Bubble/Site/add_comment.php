<?php
require('./bd.php');
session_start();


$titulo = $_REQUEST['titulo_evento_textarea'];

header('location:eventos.php');
