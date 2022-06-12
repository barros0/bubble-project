<?php

require "./partials/db_con.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// para apagar uma faq
if (isset($_GET['delete_faqid'])) {

    $faq = $conn->query('SELECT * FROM faqs where id_faq =' . $_GET['delete_faqid'])->fetch_assoc();
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


if (isset($_GET['faqid'])) {
    $faqid = $_GET['faqid'];

    $faq = $conn->query('SELECT * FROM faqs WHERE id_faq = ' . $faqid)->fetch_assoc();

    if (isset($faq)) {

        $pergunta = $_POST['pergunta'];
        $resposta = $_POST['resposta'];

        $conn->query('UPDATE faqs SET pergunta = "' . $pergunta . '", resposta = "' . $resposta . '" WHERE id_faq = ' . $faqid);

        array_push($_SESSION['alerts']['success'], 'FAQ atualizada com sucesso!');
        header('location:./faqs.php');
        exit;
    } else {

        array_push($_SESSION['alerts']['errors'], 'Esta FAQ não existe!');
        header('location:./faqs.php');
        exit;
        //Este user não existe;
    }
}
