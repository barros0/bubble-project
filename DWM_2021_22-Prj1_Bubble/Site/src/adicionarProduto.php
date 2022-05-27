<?php

include('../bd.php');

$titulo = $_POST['titulo'];
if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
}
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
 
$sql = "INSERT INTO marketplace (titulo,categoria,preco,descricao) VALUES ('$titulo','$categoria','$preco','$descricao')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>