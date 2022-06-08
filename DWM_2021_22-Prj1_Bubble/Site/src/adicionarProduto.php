<?php

require('../bd.php');
session_start();

$titulo = $_POST['titulo'];
if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
}
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
 
$sql = "INSERT INTO marketplace (id_user,titulo,categoria,preco,descricao) VALUES ('".$_SESSION['user']['id_user']."','$titulo','$categoria','$preco','$descricao')";

if (mysqli_query($conn, $sql)) {
    header('location:../marketplace.php');

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>