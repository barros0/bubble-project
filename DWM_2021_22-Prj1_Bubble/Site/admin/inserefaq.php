<?php
require('./partials/db_con.php');
session_start();

if (isset($_POST['Pergunta']) && isset($_POST['Resposta'])) {

    if (empty($_POST['Pergunta']) || empty($_POST['Resposta'])) {

      echo 'Erro, nada preenchido';

    } else {

      $sql = "INSERT INTO faqs (resposta, pergunta) VALUES ('" . $_POST['Resposta'] . "', '" . $_POST['Pergunta'] . "');";
      $inserirDados = $conn->query($sql);
    }
  }
$conn->close();
array_push($_SESSION['alerts']['success'], 'FAQ inserido com sucesso!');
header('location:./faqs.php');

?>
