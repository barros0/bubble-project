<?php

$server = "localhost";
$username = "root";
$password = "";
$bd = "bubble";

try {
    $conn = new PDO("mysql:host=$server;dbname=" . $bd, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header("HTTP/1.1 500 Internal Server Error");
    exit;
}