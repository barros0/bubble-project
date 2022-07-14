<?php
session_start();
include('./bd.php');
require 'sendmail.php';


/*ligacao ao formulario*/
$nome = $_POST["nome"];
$username = $_POST["username"];
$username = str_replace(' ', '', $username);
$email = $_POST["email"];
$password = $_POST["password"];
$password1 = $_POST["password1"];
$sexo = $_POST["sexo"];

/*nao permitir que se introduza campos vazios de password na base de dados*/
if (empty($_POST['password'])) {
    echo '<h2>Tem de escolher uma Password</h2>';
    array_push($_SESSION['alerts']['info'], 'Tem de escolher uma Password');
    header('location:./login.php');
}
/*verficar que a password e igual*/
if ($_POST["password"] <> $_POST["password1"]) {
    echo '<h2>As Passwords nao coincidem</h2>';
    array_push($_SESSION['alerts']['alert'], 'As Passwords nao coincidem');
    header('location:./login.php');
}


$birthdayDate = $_POST["data"];

$dob = strtotime(str_replace("/", "-", $birthdayDate));
$tdate = time();

$age = 0;
while ($tdate > $dob = strtotime('+1 year', $dob)) {
    ++$age;
}

if ($age < 18) {
    echo '<h2>Precisas de ter mais de 18 anos.</h2>';
    array_push($_SESSION['alerts']['alert'], 'Precisas de ter mais de 18 anos.');
    header('location:./login.php');
}



/*ligacao a base de dados*/
$existe = "select * from users where email='" . $email . "'";
$existe_username = "select * from users where username='" . $username . "'";
$faz_existe = mysqli_query($conn, $existe);
$faz_existe_username = mysqli_query($conn, $existe_username);
$jaexiste = mysqli_num_rows($faz_existe);
$jaexiste_username = mysqli_num_rows($faz_existe_username);

/*introducao dos valores na base de dados e ver se existem ou nao*/
if ($jaexiste == 0) {
    if ($jaexiste_username == 0) {
        $password = hash('sha512', $password);
        $user_insert = $conn->query("INSERT INTO users (nome, username, email, password, data_nascimento, genero) VALUES('$nome','$username','$email','$password','$birthdayDate','$sexo')");
$user = $conn->query('select * from users where id_user = '. mysqli_insert_id($conn))->fetch_assoc();
        confirmaremail($user);
        array_push($_SESSION['alerts']['success'], 'A sua conta foi criada, verifique a caixa de entrada do seu e-amil e confirme a sua conta!');
        //header('location:./login.php');
        echo "<script>window.location.assign('login.php')</script>";
        mysqli_close($conn);
        exit;
    } else {
        array_push($_SESSION['alerts']['errors'], 'Este username ja existe.');
        header('location:./login.php');
    }
} else if ($jaexiste != 1) {
    echo '<h2>Este e-mail ja tem uma conta associada.</h2>';
    array_push($_SESSION['alerts']['errors'], 'Este e-mail ja tem uma conta associada.');
    header('location:./login.php');
} else if ($jaexiste_username != 1) {
    array_push($_SESSION['alerts']['errors'], 'Este username ja existe.');
    header('location:./login.php');
}
