<?php
include('./partials/header.php');

$empregos = $conn->query('select * from empregos');

$conn->close();
?>

<div class="s-container">
    <div class="table-responsive">
        <div class="table-header row">
            <div class="titulo col-10">
                <h2>Empregos</h2>
            </div>
        </div>
        <table class="table" id="empregos">
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
            <?php foreach ($empregos as $emprego) {
                ?>
                <tr>
                    <th scope="row"><?= $emprego['id_evento'] ?></th>
                    <td>
                        <p>  <?= $emprego['descricao'] ?></p>
                    </td>
                    <td><p><a href="<?= $emprego['link'] ?>"><?= $emprego['link'] ?></a></p></td>
                    <td>    <p>  <?= $emprego['created_at'] ?></p></td>
                    <td>
                        <a href="./evento.php?userid=<?= $emprego['id_faq'] ?>">
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
        $('#empregos').DataTable();
    });
</script>

<?php
include('./partials/footer.php');

?>
