<?php
require('./partials/db_con.php');
session_start();

//verificar se os campos estao preenchidos
if (isset($_POST['Pergunta']) && isset($_POST['Resposta'])) {

  if (empty($_POST['Pergunta']) || empty($_POST['Resposta'])) {

    echo 'Erro, nada preenchido';

  } else {

    //preparar o statement
    $stmt = $conn->prepare("INSERT INTO faqs (resposta, pergunta) VALUES (?, ?)");
    $stmt->bind_param("ss", $pergunta, $resposta);

    //definir as variaveis e executar
    $pergunta = $_POST['Pergunta'];
    $resposta = $_POST['Resposta'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();
    $conn->close();
  }

}

array_push($_SESSION['alerts']['success'], 'FAQ inserido com sucesso!');
header('location:./faqs.php');
