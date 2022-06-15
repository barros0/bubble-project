<?php
include('./partials/header.php');

$faqs = $conn->query('SELECT * FROM faqs');

?>

<div id="container-faqs" class="container-faqs s-container">
    <div class="table-responsive">
        <table class="table" id="faqs">
            <div class="cabecalho_table">
                <div class="titulo_table">Lista das FAQS</div>
                <div class="button_adicionar">Adicionar +</div>
            </div>
            <caption></caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pergunta</th>
                    <th scope="col">Resposta</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faqs as $faq) {
                ?>
                    <tr>
                        <th scope="row"><?= $faq['id_faq'] ?></th>
                        <td>
                            <p> <?= $faq['pergunta'] ?></p>
                        </td>
                        <td>
                            <p><?= $faq['resposta'] ?></p>
                        </td>
                        <td>
                            <a href="./faqs.php?faqid=<?= $faq['id_faq'] ?>">
                                <i class="fa fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="form_inserir_faqs">
    <form id="inserirFAQ" class="form-control" name="inserirFAQ" onsubmit="return validateForm()" method="post" action="inserefaq.php">

        <div class="title">
            <h3>Inserir novo FAQ</h3>
            <i id="fechar_modal_faq" class='bx bx-x'></i>

        </div>
        <div class="form-group">
            <label for="Pergunta">Pergunta </label>
            <input type="text" name="Pergunta" id="Pergunta" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Resposta">Resposta </label>
            <input type="text" name="Resposta" id="Resposta" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>
</div>


<script>
    $(document).ready(function() {
        $('#faqs').DataTable();
    });
</script>

<?php
$pagina = basename($_SERVER["REQUEST_URI"]);
if($pagina != "faqs.php"){
    include('./faq.php');
}

include('./partials/footer.php');

?>