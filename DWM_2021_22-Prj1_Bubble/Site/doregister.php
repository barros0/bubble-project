

    <!--REGISTO !-->

    <?php

    if(isset($_POST))
    {
        $nome=$_POST["nome"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $password1=$_POST["password1"];
        $data=$_POST["data"];
        $sexo=$_POST["sexo"];


        if (empty($_POST['password'])){
            ?>
            <div>
                <h1>Coloque uma Password</h1>
            </div>
            <?php
            exit;

        }

        if ($_POST["password"]<>$_POST["password1"])
        {
            ?>
            <div>
                <h1>A password não coincide</h1>
            </div>
            <?php
            exit;
        }


        include('./bd.php');
        $existe="select * from users where email='".$email."'";
        $faz_existe=mysqli_query($conn, $existe);
        $jaexiste=mysqli_num_rows($faz_existe);

        if ($jaexiste==0)
        {
            $password=hash('sha512', $password);
            $sql="INSERT INTO users (nome, username, email, password, data_nascimento, genero) VALUES('$nome','$username','$email','$password','$data', '$sexo')";
            if (!mysqli_query($conn,$sql))
            {
                die('Erro: '. mysqli_error($conn));
            }
            ?>
            <br>
            <div style="width:400px">
                <div class='text1'>Utilizador criado</div>
                <br>
            </div>
            <?php
            mysqli_close($conn);
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