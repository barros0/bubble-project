<?php

require "./partials/db_con.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

}

// para apagar uma evento, url leva ?delete_eventoid
if (isset($_GET['delete_eventoid'])) {

    $evento = $conn->query('SELECT * FROM eventos WHERE id_evento =' . $_GET['delete_eventoid'])->fetch_assoc();

    if (empty($evento)) {
        array_push($_SESSION['alerts']['errors'], 'Este evento não existe!');
        header('location:./eventos.php');
    }

    $conn->query('DELETE FROM eventos WHERE id_evento = ' . $_GET['delete_eventoid']);
    $conn->close();
    array_push($_SESSION['alerts']['alert'], 'Evento eliminado com sucesso!');
    header('location:./eventos.php');
    exit;
}

//parte que atualiza o evento

if (isset($_GET['eventoid'])) {

    $eventoid = $_GET['eventoid'];

    $evento = $conn->query('SELECT * FROM eventos WHERE id_evento = ' . $eventoid)->fetch_assoc();

    if (isset($evento)) {

    //parte que prepara o statement
    $stmt = $conn->prepare("UPDATE eventos SET titulo=?, localizacao=?, descricao=? WHERE id_evento=?");
    $stmt->bind_param("sssi",$titulo,$localizacao,$descricao,$eventoid);

    $titulo = $_POST['titulo'];
    $localizacao = $_POST['localizacao'];
    $descricao = $_POST['descricao'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar todas as conexoes usadas
    $stmt->close();
    $conn->close();

        array_push($_SESSION['alerts']['success'], 'Evento atualizado com sucesso!');
        header('location:./eventos.php');

        exit;

    } else {

        array_push($_SESSION['alerts']['errors'], 'Este evento não existe!');
        header('location:./eventos.php');
        exit;

    }
}
