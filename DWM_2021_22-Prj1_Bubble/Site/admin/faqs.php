
<?php
include('./partials/header.php');

$faqs = $conn->query('select * from faqs');

?>


<div id="container-faqs" class="container-faqs s-container">
    <form class="form-control" name="inserirFAQ" method="post" action="inserefaq.php">

        <div class="title">
            <h2>Inserir novo FAQ</h2>
        </div>
        <div class="form-group">
            <label for="Pergunta">Pergunta </label>
            <input type="text" name="Pergunta" id="Pergunta" class="form-control">
        </div>

        <div class="form-group">
            <label for="Resposta">Resposta </label>
            <input type="text" name="Resposta" id="Resposta" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>


    <div class="table-responsive">
        <div class="table-header row">
            <div class="titulo col-10">
                <h2>FAQS</h2>
            </div>
        </div>
        <table class="table" id="faqs">
            <caption></caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pergunta</th>
                <th scope="col">Resposta</th>
                <th scope="col">Editar></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($faqs as $faq) {
                ?>
                <tr>
                    <th scope="row"><?= $faq['id_faq'] ?></th>
                    <td>
                      <p>  <?= $faq['pergunta'] ?></p>
                    </td>
                    <td><p><?= $faq['resposta'] ?></p></td>
                    <td>
                        <a href="./user.php?userid=<?= $faq['id_faq'] ?>">
                            <i class="fa fa-pen"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>



            </tbody>
        </table>
    </div>

</div>

<script>
    $(document).ready( function () {
        $('#faqs').DataTable();
    } );
</script>

<?php
include('./partials/footer.php');

?>