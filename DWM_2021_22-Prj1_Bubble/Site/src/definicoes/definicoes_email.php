<?php
require('../../bd.php');
session_start();

$userid = $_GET['userid'];

$email = test_input($_REQUEST['email']);

function test_input($email)
{
    $email = trim($email);
    $email = htmlspecialchars($email);
    return $email;
}

$existe = "select * from users where email='" . $email . "'";
$faz_existe = mysqli_query($conn, $existe);
$jaexiste = mysqli_num_rows($faz_existe);


if ($email != "") {
    if ($jaexiste == 0) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $stmt_update_email = $conn->prepare("UPDATE users SET email = ? WHERE id_user = " . $userid);
            $stmt_update_email->bind_param('s', $email);
            $stmt_update_email->execute();
            $stmt_update_email->close();
        }
    } else {
?>
        <!--ERRO AQUI-->
<?php
    }
}

header('location:../../definicoes_geral.php');
