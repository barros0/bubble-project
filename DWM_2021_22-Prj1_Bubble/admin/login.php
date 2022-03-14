<html lang="pt-pt" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin</title>

    <link rel="stylesheet" href="./public/bootstrap-5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href="./public/fontawesome-6.0.0/css/all.css">
    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/app.js"></script>
</head>
<body>

<main class="login">

    <div class="left flex align-content-center justify-content-center">
        <img src="./public/img/logo.png" alt="Logo">
    </div>

    <div class="right col-12">
        <div class="login-area col-12" action="dologin.php">
                <div class="login-titulo">
                    <h1><strong>Login</strong></h1>
                </div>
            <form class="form-login col-12" action="dologin.php">
                <div class="login-inputs">

                <div class="col-12 grupo-form">
                    <label class="bt_icon" for="email"><i class="fa fa-envelope"></i></label>
                    <input placeholder="Email" class="border" name="email" type="email" id="email">
                </div>

                <div class="col-12 grupo-form">
                    <label class="bt_icon" for="password"><i class="fa fa-lock"></i></label>
                    <input placeholder="Password" class="border" name="password" type="password" id="password">
                </div>

                    <div class="col-12 grupo-form">
                        <button type="submit" class="btn-round">
                            Entrar
                        </button>
                    </div>
            </form>
            </div>
        </form>
    </div>

</main>


</body>
</html>



