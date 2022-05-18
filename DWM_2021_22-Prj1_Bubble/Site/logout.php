<?php
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
    exit();
}

header('location:login.php');