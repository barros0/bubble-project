<?php
/*ligacao ao formulario*/
if (isset($_POST)) {
    $nome = $_POST["nome"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password1 = $_POST["password1"];
    $data = $_POST["data"];
    $sexo = $_POST["sexo"];

    /*nao permitir que se introduza campos vazios de password na base de dados*/

    if (empty($_POST['password'])) {
        echo('<h2>Tem de escolher uma password!</h2>');
        array_push($_SESSION['errors'], 'Tem de escolher uma password!');
        header('location:./login.php');
        exit;
    }
    /*verficar que a password e igual*/
    if ($_POST["password"] <> $_POST["password1"]) {
        echo('<h2>Password nao coincide!</h2>');
        array_push($_SESSION['errors'], 'Password nao coincide!');
        header('location:./login.php');
        exit;
    }

    ?><script>
    /*verificar se e maior de 18 anos*/
    function validaridade($data, $idade = 18)
    {

        if(is_string($data)) {
            $data = strtotime($data);
        }
    

        if(time() - $data < $idade * 31536000)  {
            echo('<h2>Tens de ser maior de idade para criar uma conta!</h2>');
            return false;
        }
    
        return true;
    }
    </script> <?php

    /*ligacao a base de dados*/
    include('./bd.php');
    $existe = "select * from users where email='" . $email . "'";
    $existe_username = "select * from users where username='" . $username . "'";
    $faz_existe = mysqli_query($conn, $existe);
    $faz_existe_username = mysqli_query($conn, $existe_username);
    $jaexiste = mysqli_num_rows($faz_existe);
    $jaexiste_username = mysqli_num_rows($faz_existe_username);


    /*introducao dos valores na base de dados e ver se existem ou nao*/
    if ($jaexiste == 0 || $jaexiste_username == 0) {
        $password = hash('sha512', $password);
        $sql = "INSERT INTO users (nome, username, email, password, data_nascimento, genero) VALUES('$nome','$username','$email','$password','$data','$sexo')";
        if (!mysqli_query($conn, $sql)) {
            die('Erro: ' . mysqli_error($conn));
        }
        echo('<h2>Utilizador Criado!</h2>');
        array_push($_SESSION['errors'], 'Utilizador Criado!');
        header('location:./login.php');
        mysqli_close($conn);
    } else {
        echo('<h2>Este e-mail ja tem uma conta associada!</h2>');
        array_push($_SESSION['errors'], 'Este e-mail ja tem uma conta associada!');
        header('location:./login.php');
    }
}

?>