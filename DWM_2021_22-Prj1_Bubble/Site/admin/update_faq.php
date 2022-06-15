<?php

require "./partials/db_con.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

}

// para apagar uma faq, url leva ?delete_faqid
if (isset($_GET['delete_faqid'])) {

    $faq = $conn->query('SELECT * FROM faqs WHERE id_faq =' . $_GET['delete_faqid'])->fetch_assoc();

    if (empty($faq)) {
        array_push($_SESSION['alerts']['errors'], 'Esta FAQ não existe!');
        header('location:./faqs.php');
    }

    $conn->query('DELETE FROM faqs WHERE id_faq = ' . $_GET['delete_faqid']);
    $conn->close();
    array_push($_SESSION['alerts']['alert'], 'FAQ eliminada com sucesso!');
    header('location:./faqs.php');
    exit;
}

//atualizar uma faq

if (isset($_GET['faqid'])) {

    $faqid = $_GET['faqid'];

    $faq = $conn->query('SELECT * FROM faqs WHERE id_faq = ' . $faqid)->fetch_assoc();

    if (isset($faq)) {

    //preparar o statement
    $stmt = $conn->prepare("UPDATE faqs SET pergunta=?, resposta=? WHERE id_faq=?");
    $stmt->bind_param("ssi", $pergunta, $resposta, $faqid);

    //definir as variaveis e executar
    $pergunta = $_POST['pergunta'];
    $resposta = $_POST['resposta'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();
    $conn->close();

        array_push($_SESSION['alerts']['success'], 'FAQ atualizada com sucesso!');
        header('location:./faqs.php');

        exit;

    } else {

        array_push($_SESSION['alerts']['errors'], 'Esta FAQ não existe!');
        header('location:./faqs.php');
        exit;

    }
}
