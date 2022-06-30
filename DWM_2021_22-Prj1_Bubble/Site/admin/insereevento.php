<?php
require('./partials/db_con.php');
session_start();

//verificar se os campos estao preenchidos
if (isset($_POST['titulo']) && isset($_POST['localizacao']) && isset($_POST['descricao']) && isset($_POST['imagem'])) {

  if (empty($_POST['titulo']) || empty($_POST['localizacao']) || empty($_POST['descricao']) || empty($_POST['imagem'])) {

    echo 'Erro, nada preenchido';

  } else {

    //preparar o statement
    $stmt = $conn->prepare("INSERT INTO eventos (titulo, localizacao, descricao, imagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titulo,  $localizacao, $descricao, $imagem);

    //definir as variaveis e executar
    $titulo = $_POST['titulo'];
    $localizacao = $_POST['localizacao'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();
    $conn->close();
  }

}

array_push($_SESSION['alerts']['success'], 'evento inserido com sucesso!');
header('location:./eventos.php');
