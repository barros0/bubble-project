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
        $stmt_update_username = $conn->prepare("UPDATE users SET username = ? WHERE id_user = " . $userid);
        $stmt_update_username->bind_param('s', $username);
        $stmt_update_username->execute();
        $stmt_update_username->close();
    } else {
?>
        <!--ERRO AQUI-->
<?php
    }
}

header('location:../../definicoes_geral.php');
