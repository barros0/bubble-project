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
            $qupdate_email = "UPDATE users SET email = '$email' WHERE id_user = " . $userid;
            $updateemail = $conn->query($qupdate_email);
        }
    } else {
?>
        <!--ERRO AQUI-->
<?php
    }
}
?>