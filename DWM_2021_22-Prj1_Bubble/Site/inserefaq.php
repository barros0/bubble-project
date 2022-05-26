<?php
require('./bd.php');
session_start();

if (isset($_POST['Pergunta']) && isset($_POST['Resposta'])) {

    if (empty($_POST['Pergunta']) || empty($_POST['Resposta'])) {

      echo 'Erro';
    } else {

      $sql = "INSERT INTO faqs (resposta, pergunta) VALUES ('" . $_POST['Resposta'] . "', '" . $_POST['Pergunta'] . "');";
      $inserirDados = $conn->query($sql);
    }
  }

header('location:admin/index.php');

?>