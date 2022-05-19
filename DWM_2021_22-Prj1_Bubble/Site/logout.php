<?php
session_start();
<<<<<<< Updated upstream
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);

}

header('location:login.php');
exit();
=======


if(isset($_SESSION['user'])){
   unset($_SESSION['user']);
}

header('location:login.php');

exit;
>>>>>>> Stashed changes
