<?php
$host="localhost";
$database="bubble_database";
$user="root";
$pass='';

$conn = new mysqli($host, $user, $pass, $database);

if ($conn->connect_errno) {
    $code = $conn->connect_errno;
    $message = $conn->connect_error;
    printf("<p>Connection error: %d %s</p>", $code, $message);
    exit;
    }

?>