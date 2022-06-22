<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];

$username = $_REQUEST['username'];

$existe_username = "select * from users where username='" . $username . "'";
$faz_existe_username = mysqli_query($conn, $existe_username);
$jaexiste_username = mysqli_num_rows($faz_existe_username);

if ($username != "") {
    if ($jaexiste_username == 0) {
        $qupdate_username = "UPDATE users SET username = '$username' WHERE id_user = " . $userid;
        $updateusername = $conn->query($qupdate_username);
    } else {
?>
        <!--ERRO AQUI-->
<?php
    }
}

header('location:../../definicoes_geral.php');
?>