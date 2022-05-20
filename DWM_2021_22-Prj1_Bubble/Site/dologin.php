<?php
include('./bd.php');

session_start();
$_SESSION['errors'] = array();



if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_email = "Select * from users where email='" . $email . "'";
    $user = $conn->query($query_email)->fetch_assoc();

//se o user nao existir
    if (!isset($user)) {
        echo('<h2>Não foi encontrado nenhum utilizador registado com este email</h2>');
        array_push($_SESSION['errors'], 'Não foi encontrado nenhum utilizador registado com este email');
        exit;
    }

// se a password for errada
    if (hash('sha512', $password) <> $user['password']) {
        echo('<h2>Password errada!</h2>');
        array_push($_SESSION['errors'], 'Password errada!');
        exit;
    }

    $_SESSION['user'] = $user;
    echo('<h2>logged!</h2>');

    header('location:feed.php');
    exit();


    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query_email = "Select * from users where email='" . $email . "'";
        $user = $conn->query($query_email)->fetch_assoc();

//se o user nao existir
        if (!isset($user)) {
            echo('<h2>Não foi encontrado nenhum utilizador registado com este email</h2>');
            array_push($_SESSION['errors'], 'Não foi encontrado nenhum utilizador registado com este email');
            exit;
        }

// se a password for errada
        if (hash('sha512', $password) <> $user['password']) {
            echo('<h2>Password errada!</h2>');
            array_push($_SESSION['errors'], 'Password errada!');
            exit;
        }

        $_SESSION['user'] = $user;
        echo('<h2>logged!</h2>');


    }
}
    ?>



    <!--REGISTO !-->

    <?php

    if(isset($_POST['registarconta']))
    {
        $nome=$_POST["nome"];
        $sobrenome=$_POST["sobrenome"];
        $Email=$_POST["email"];
        $password=$_POST["password"];
        $password1=$_POST["password1"];
        $telemovel=$_POST["telemovel"];
        $data=$_POST["data"];
        $sexo=$_POST["sexo"];


        if ($_POST["password"]<>$_POST["password1"])
        {
            ?>
            <div style="width:400px">
                <h1>A password não coincide</h1>
                <p><button type="button"> <a style="text-decoration: none" href="login.php">Alterar</button></p>
            </div>
            <?php
            exit;
        }


        include('ligaBD.php');
        $existe="select * from users where Email='".$Email."'";
        $faz_existe=mysqli_query($ligaBD, $existe);
        $jaexiste=mysqli_num_rows($faz_existe);

        if ($jaexiste==0)
        {
            $sql="INSERT INTO users (nome, email, password, sexo, telemovel, data, sexo) VALUES('$nome','$Email','$password','$sexo','$telemovel','$data', '$sexo')";
            if (!mysqli_query($ligaBD,$sql))
            {
                die('Erro: '. mysqli_error($ligaBD));
            }
            ?>
            <br>
            <div style="width:400px">
                <div class='text1'>Utilizador criado</div>
                <br>
            </div>
            <?php
            mysqli_close($ligaBD);
        }
        else
        {
            ?>
            <br>
            <div>Utilizador já existe</div>
            </div>
            <?php
        }

    }

    ?>