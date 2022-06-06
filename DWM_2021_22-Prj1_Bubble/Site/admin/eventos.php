<?php
include('./partials/header.php');

$eventos = $conn->query('select * from eventos');

?>

<div class="s-container">
    <div class="table-responsive">
        <div class="table-header row">
            <div class="titulo col-10">
                <h2>Eventos</h2>
            </div>
        </div>
        <table class="table" id="eventos">
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
            <?php foreach ($eventos as $evento) {
                ?>
                <tr>
                    <th scope="row"><?= $evento['id_evento'] ?></th>
                    <td>
                        <p>  <?= $evento['descricao'] ?></p>
                    </td>
                    <td><p><a href="<?= $evento['link'] ?>"><?= $evento['link'] ?></a></p></td>
                    <td>    <p>  <?= $evento['created_at'] ?></p></td>
                    <td>
                        <a href="./user.php?userid=<?= $evento['id_faq'] ?>">
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
    $(document).ready(function () {
        $('#eventos').DataTable();
    });
</script>

<?php
include('./partials/footer.php');

?>
