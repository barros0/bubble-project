<?php
include('./partials/header.php');

$empregos = $conn->query('SELECT * FROM oferta_emprego');

$conn->close();
?>

<div class="s-container">
    <div class="table-responsive">
        <div class="table-header row">
            <div class="cabecalho_table">
                <div class="titulo_table">Lista dos Empregos</div>
            </div>
        </div>
        <table class="table" id="empregos">
            <caption></caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empregos as $emprego) {
                ?>
                    <tr>
                        <th scope="row"><?= $emprego['id_oferta'] ?></th>
                        <td>
                            <p> <?= $emprego['titulo'] ?></p>
                        </td>
                        <td>
                            <p><?= $emprego['categoria'] ?></p>
                        </td>
                        <td>
                            <a href="./emprego.php?idemp=<?= $emprego['id_oferta'] ?>">
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
    $(document).ready(function() {
        $('#empregos').DataTable();
    });
</script>

<?php
include('./partials/footer.php');

?>