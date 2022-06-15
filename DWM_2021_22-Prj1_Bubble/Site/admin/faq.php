<?php
//buscar o id da faq que foi selecionada 
$faqid = $_GET['faqid'];

$faq = $conn->query('SELECT * FROM faqs where id_faq = ' . $faqid)->fetch_assoc();

if (!isset($faq)) {
    array_push($_SESSION['alerts']['errors'], 'Esta FAQ não existe!');
    header('location:./faqs.php');
    exit;
}

?>

<div class="s-container">
    <form id="atualizaFAQ" name="atualizaFAQ" class="form-control" method="post" enctype="multipart/form-data" action="./update_faq.php?faqid=<?= $faqid ?>" autocomplete="off" onsubmit="return validaForm()">

        <div class="title">
            <h2>Atualizar FAQ</h2>
        </div>
        <div class="form-group">
            <label for="pergunta">Pergunta</label>
            <input name="pergunta" value="<?= $faq['pergunta'] ?>" type="text" class="form-control" id="pergunta" placeholder="Pergunta" required>
        </div>
        <div class="form-group">
            <label for="resposta">Resposta</label>
            <input name="resposta" value="<?= $faq['resposta'] ?>" type="text" class="form-control" id="resposta" placeholder="Resposta" required>
        </div>


        <a class="btn btn-danger" href="./update_faq.php?delete_faqid=<?= $faq['id_faq']  ?>">Eliminar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>

</div>