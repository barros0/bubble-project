<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Bubble | Login</title>

</head>

<body>

    <div class="home">

    <div class="home2">

        <div class="caixa1-home">

            
           <img class='logo-caixa' src="img/logo_bubble.svg" alt="logo">
        

        </div>

        <div class="caixa2-home">

            <div class="botao-caixa">
                <div id="fundo-botoes"></div>
                <button type="button" class="botoes-form" onclick="login()">Login</button>
                <button type="button" class="botoes-form" onclick="register()">Sign Up</button>
            </div>

            <form id="login" action="formulario" class="formulario-login">

                <input type="email" class="form-input" placeholder="E-Mail" required>
                <input type="text" class="form-input" placeholder="Password" required>
                <label id="checkbox">
                    
                    <input type="checkbox" class="check-box">
                    Manter Sessão Iniciada
                </label>
                <button type="submit" class="botao-submeter">Iniciar Sessão</button>

            </form>

            <form id="register" action="formulario" class="formulario-login">

                <div class="label-nomes">
                <input type="text" id="label-nome" class="form-input" placeholder="Nome" required>
                <input type="text" class="form-input" placeholder="Sobrenome" required>
                </div>
                <input type="email" class="form-input" placeholder="E-Mail" required>
                <input type="text" class="form-input" placeholder="Número de Telemóvel" required>
                <input type="text" class="form-input" placeholder="Password" required>
                <input type="date" class="form-input" placeholder="Data de Nascimento" required>
                <label for="sexo">O seu género é:</label>
                <select name="sexo" class="form-input" id="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
                <label id="checkbox">
                    <input type="checkbox" class="check-box">
                   Concorda com os nossos <span> Termos & Condições</span>?
                </label>
                
                <button type="submit" class="botao-submeter">Regista-te</button>

            </form>


        </div>
        </div>

        <div class="footer">

        <div id="footer-informacoes"><a href="feed.html">Feed</a><a href="faqs.html"> FAQs</a><a
                href="ajuda.html">Ajuda</a><a href="termos.html">Termos</a><a href="definicoes.html">Definições</a>
        </div>
        <div id="footer-copyright">© 2022 Bubble. All rights reserved</div>

    </div>


    </div>




    <script src="js/login.js"></script>

</body>

</html>