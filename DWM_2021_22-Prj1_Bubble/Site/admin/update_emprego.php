<?php

require "./partials/db_con.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

}

// para apagar uma faq, url leva ?delete_empregoid
if (isset($_GET['delete_empregoid'])) {

    $emprego = $conn->query('SELECT * FROM oferta_emprego WHERE id_oferta =' . $_GET['delete_empregoid'])->fetch_assoc();

    if (empty($emprego)) {
        array_push($_SESSION['alerts']['errors'], 'Este Emprego não existe!');
        header('location:./empregos.php');
    }

    $conn->query('DELETE FROM oferta_emprego WHERE id_oferta = ' . $_GET['delete_empregoid']);
    $conn->close();

    array_push($_SESSION['alerts']['alert'], 'Emprego eliminado com sucesso!');
    header('location:./empregos.php');
    exit;
}

//atualizar um emprego

if (isset($_GET['empregoid'])) {

    $empregoid = $_GET['empregoid'];

    $emprego = $conn->query('SELECT * FROM oferta_emprego WHERE id_oferta = ' . $empregoid)->fetch_assoc();

    if (isset($emprego)) {

    //preparar o statement
    $stmt = $conn->prepare("UPDATE oferta_emprego SET titulo=?, qualificacoes=?, experiencia=?, requisitos=?, vagas=?, localizacao=?, horario=?, tipo=?, categoria=?, descricao=? WHERE id_oferta=?");
    $stmt->bind_param("ssssisssssi", $titulo, $qualificacoes, $experiencia, $requisitos, $vagas, $localizacao, $horario, $tipo, $categoria, $descricao, $empregoid);

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

        array_push($_SESSION['alerts']['success'], 'Emprego atualizado com sucesso!');
        header('location:./empregos.php');

        exit;

    } else {

        array_push($_SESSION['alerts']['errors'], 'Este Emprego não existe!');
        header('location:./empregos.php');
        exit;

    }
}