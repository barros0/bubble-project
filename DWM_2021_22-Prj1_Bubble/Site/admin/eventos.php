<?php
include('./partials/header.php');

$eventos = $conn->query('SELECT * FROM eventos');

?>

<div id="container-eventos" class="container-eventos s-container">
    <div class="table-responsive">
        <table class="table" id="eventos">
            <div class="cabecalho_table">
                <div class="titulo_table">Eventos do Bubble</div>
            </div>
            <caption></caption>
            <thead>
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TTitulo</th>
                    <th scope="col">Localização</th>
                    <th scope="col">Descricao</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento) {
                ?>
                    <tr>
                        <th scope="row"><?= $evento['id_evento'] ?></th>
                        <td>
                            <p> <?= $evento['titulo'] ?></p>
                        </td>
                        <td>
                            <p> <?= $evento['localizacao'] ?></p>
                        </td>
                        <td>
                            <p><?= $evento['descricao'] ?></p>
                        </td>
                        <td>
                            <a href="./eventos.php?eventoid=<?= $evento['id_evento'] ?>">
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
        $('#eventos').DataTable();
    });
</script>

<?php
$pagina = basename($_SERVER["REQUEST_URI"]);
if ($pagina != "eventos.php") {
    include('./evento.php');
}

include('./partials/footer.php');

?>