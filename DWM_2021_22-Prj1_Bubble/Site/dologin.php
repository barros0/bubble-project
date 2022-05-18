
<?php

if(isset($_POST['entrarconta'])) 
{ 
$user=$_POST["Email"];  
$password=$_POST["password"]; 
include('bd.php');  
$existe="Select * from users where email='".$user."'";  
$faz_existe=mysqli_query($ligaBD,$existe);  
$num_registos=mysqli_num_rows($faz_existe);
  
	if($num_registos==0)  
		{  
			echo "<h3>Utilizador não registado</h3> ";  
			exit;	
		} 


$existe="Select * from users where email='".$user."' and password='".$password."'";  
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