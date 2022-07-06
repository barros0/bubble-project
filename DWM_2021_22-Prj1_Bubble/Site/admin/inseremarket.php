<?php
require('./partials/db_con.php');
session_start();

//verificar se os campos estao preenchidos
if (isset($_POST['titulo']) && isset($_POST['preco']) && isset($_POST['descricao']) && isset($_POST['imagem'])) {

  if (empty($_POST['titulo']) || empty($_POST['preco']) || empty($_POST['descricao']) || empty($_POST['imagem'])) {

    echo 'Erro, nada preenchido';

  } else {

    //preparar o statement
    $stmt = $conn->prepare("INSERT INTO marketplace (titulo, preco, descricao, imagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titulo,  $preco, $descricao, $imagem);

    //definir as variaveis e executar
    $titulo = $_POST['titulo'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();
    $conn->close();
  }

}

array_push($_SESSION['alerts']['success'], 'Produto inserido com sucesso!');
header('location:./marketplace.php');
