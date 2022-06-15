<?php
require('./bd.php');
session_start();

//verificar se os campos estao preenchidos
/*if (isset($_POST['titulo']) && isset($_POST['qualificacoes']) && isset($_POST['experiencia']) && isset($_POST['requisitos']) && isset($_POST['vagas']) && isset($_POST['localizacao']) && isset($_POST['horario']) && isset($_POST['tipo']) && isset($_POST['categoria']) && isset($_POST['descricao'])) {

  if (empty($_POST['titulo']) || empty($_POST['qualificacoes']) || empty($_POST['experiencia']) || empty($_POST['requisitos']) || empty($_POST['vagas']) || empty($_POST['localizacao']) || empty($_POST['horario']) || empty($_POST['tipo']) || empty($_POST['categoria']) || empty($_POST['descricao'])) {

    echo 'Erro, nada preenchido';

  } else {
*/
    //preparar o statement
    $stmt = $conn->prepare("INSERT INTO oferta_emprego (titulo, qualificacoes, experiencia, requisitos, vagas, localizacao, horario, tipo, categoria, descricao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisssss", $titulo, $qualificacoes, $experiencia, $requisitos, $vagas, $localizacao, $horario, $tipo, $categoria, $descricao);

    //definir as variaveis e executar
    $titulo = $_POST['titulo'];
    $qualificacoes = $_POST['qualificacoes'];
    $experiencia = $_POST['experiencia'];
    $requisitos = $_POST['requisitos'];
    $vagas = $_POST['vagas'];
    $localizacao = $_POST['localizacao'];
    $horario = $_POST['horario'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();
    $conn->close();
 // }

//}

array_push($_SESSION['alerts']['success'], 'Emprego inserido com sucesso!');
header('location:./empregos.php');

?>