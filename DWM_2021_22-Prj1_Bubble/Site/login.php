<?php


session_start();

if (isset($_SESSION['user'])) {

    header('location:feed.php');
    exit();
}

include('./bd.php');


$sql  = mysqli_query($conn, "select * from nacionalidades");

$generos = mysqli_query($conn, "select * from generos");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <!--FavIcon-->
    <link rel="shortcut icon" type="image/jpg" href="img/header/logo_small_bubble.ico" />
    <!--Bootstrap-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!--CSS Geral-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/notificacoes.css">
    <script src="js/jquery-3.6.0.min.js"></script>


    <title>Bubble | Login</title>

</head>

<body>
    <?php
    require('./page_parts/notificacoes.php');
    ?>
    <div class="home">

        <div class="home2">
            <div class="caixa1-home">
                <img class='logo-caixa' src="img/header/logo_bubble.svg" alt="logo">
            </div>

            <div class="caixa2-home">
                <div class="botao-caixa">
                    <div id="fundo-botoes"></div>
                    <button type="button" class="botoes-form login_btn" onclick="login()">Login</button>
                    <button type="button" class="botoes-form register_btn" onclick="register()">Sign Up</button>
                </div>
                <form method="POST" id="login" action="dologin.php" class="formulario-login">

                    <input type="email" class="form-input" name="email" placeholder="E-Mail" required>
                    <input type="password" class="form-input" name="password" placeholder="Password" required>
                    <label id="checkbox">
                        <input type="checkbox" class="check-box">
                        Manter Sessão Iniciada
                    </label>
                    <button type="submit" name="entrarconta" class="botao-submeter">Iniciar Sessão</button>
                </form>
                <form method="POST" id="register" action="doregister.php" class="formulario-login">
                    <div class="label-nomes">
                        <input type="text" id="label-nome" class="form-input" name="nome" placeholder="Nome" required>
                        <input type="text" class="form-input" name="username" placeholder="Nome de Utilizador" required>
                    </div>
                    <input type="email" class="form-input" name="email" placeholder="E-Mail" required>
                    <div class="label-passwords">
                        <input type="password" id="label-password" class="form-input" name="password" placeholder="Password" required>
                        <input type="password" id="label-password2" class="form-input" name="password1" placeholder="Confirmar Password" required>
                    </div>
                    <input type="date" class="form-input" id="data" name="data" required>
                    <label for="sexo">O seu género é:</label>
                    <select name="sexo" class="form-input" id="sexo">
                        <?php while ($genero = mysqli_fetch_array($generos)) { ?>
                            <option value="<?= $genero['genero_id'] ?>"><?php echo $genero['nome_genero']; ?></option>
                        <?php } ?>
                    </select>
                    <label id="checkbox2">
                        <input type="checkbox" class="check-box" required>
                        Concorda com os nossos <span> Termos & Condições</span>?
                    </label>
                    <button type="submit" name="registarconta" class="botao-submeter">Regista-te</button>
                </form>
            </div>
        </div>

        <div class="footer">
            <div id="footer-copyright">© 2022 Bubble. All rights reserved</div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="js/header.js"></script>
    <script src="js/login.js"></script>

</body>

</html>