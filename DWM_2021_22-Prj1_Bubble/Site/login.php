<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <link rel="preconnect" href="httpass$password://fonts.googleapis.com">
    <link rel="preconnect" href="httpass$password://fonts.gstatic.com" crossorigin>
    <link href="httpass$password://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
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

            <form method="POST" id="login" action="formulario" class="formulario-login">

                <input type="email" class="form-input" name="email" placeholder="E-Mail" required>
                <input type="text" class="form-input" name="nome" placeholder="Password" required>
                <label id="checkbox">
                    
                    <input type="checkbox" class="check-box">
                    Manter Sessão Iniciada
                </label>
                <button type="submit" name="entrarconta" class="botao-submeter">Iniciar Sessão</button>

            </form>

            <form method="POST"  id="register" action="formulario" class="formulario-login">

                <div class="label-nomes">
                <input type="text" id="label-nome" class="form-input" name="nome" placeholder="Nome" required>
                <input type="text" class="form-input" name="sobrenome" placeholder="Sobrenome" required>
                </div>
                <input type="email" class="form-input" name="email" placeholder="E-Mail" required>
                <input type="text" class="form-input"  name="telemovel" placeholder="Número de Telemóvel" required>
                <input type="text" class="form-input" name="password" placeholder="Password" required>
                <input type="date" class="form-input" name="data" placeholder="Data de Nascimento" required>
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
                
                <button type="submit" name="registarconta" class="botao-submeter">Regista-te</button>

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


<!--LOGIN !-->

<?php

if(isset($_POST['entrarconta'])) 
{ 
$user=$_POST["Email"];  
$password=$_POST["password"]; 
include('ligaBD.php');  
$existe="Select * from utilizadores where email='".$user."'";  
$faz_existe=mysqli_query($ligaBD,$existe);  
$num_registos=mysqli_num_rows($faz_existe);
  
	if($num_registos==0)  
		{  
			echo "<h3>Utilizador não registado</h3> ";  
			exit;	
		} 


$existe="Select * from utilizadores where Email='".$user."' and Password='".$password."'";  
$faz_existe=mysqli_query($ligaBD,$existe);  
$registos_user=mysqli_fetch_array($faz_existe); 
$num_registos=mysqli_num_rows($faz_existe);  



if($num_registos==1)  
{ 
if (session_status() == PHP_SESSION_NONE) {
session_start(); }
 $_SESSION = array(); 
 $_SESSION["Email"]=$_POST["Email"]; 
 $_SESSION["Nome"]=$registos_user["Nome"];   
 header('location:feed.php');
 }  
 else  
 {   
 echo "<h3>Erro de autenticação</h3>";  
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
   <div  style="width:400px">
   <h1>A password não coincide</h1>
   <p><button  type="button"> <a style="text-decoration: none" href="login.php">Alterar</button></p>
   </div>
   <?php
   exit;
   }
   
   
include('ligaBD.php');   
$existe="select * from utilizadores where Email='".$Email."'";   
$faz_existe=mysqli_query($ligaBD, $existe);   
$jaexiste=mysqli_num_rows($faz_existe); 

if ($jaexiste==0)   
{
   $sql="INSERT INTO utilizadores (nome, email, password, sexo, telemovel, data, sexo) VALUES('$nome','$Email','$password','$sexo','$telemovel','$data', '$sexo')";
   if (!mysqli_query($ligaBD,$sql))
   {    
   die('Erro: '. mysqli_error($ligaBD));
   }
   ?>
   <br>
   <div  style="width:400px">
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