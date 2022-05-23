<?php
session_start();
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);

}

header('location:login.php');
exit();


if(isset($_SESSION['user'])){
   unset($_SESSION['user']);
}

header('location:login.php');

exit;