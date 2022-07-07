<?php
include('./partials/header.php');

$reports = $conn->query('SELECT * FROM reports');

?>

<div class="s-container">
    <div class="table-responsive">
        <div class="table-header row">
            <div class="cabecalho_table">
                <div class="titulo_table">Lista dos Reports</div>
            </div>
        </div>
        <table class="table" id="report">
            <caption></caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Report</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report) {
                    $buscar_publicacao = $conn->query("select publicacao_id from reports where id_report =" . $report['id_report'])->fetch_assoc();

                    $id_pub = $buscar_publicacao['publicacao_id'];

                    $buscar_estado_pub = $conn->query("select * from publicacoes where publicacao_id=" . $id_pub)->fetch_assoc();

                    $estado_pub = $buscar_estado_pub['estado_pub'];

                    if ($estado_pub != 2) {
                ?>
                        <tr>
                            <th scope="row"><?= $report['id_report'] ?></th>
                            <td>
                                <p> <?= $report['categoria'] ?></p>
                            </td>
                            <td>
                                <p><?= $report['report_comment'] ?></p>
                            </td>
                            <td>
                                <p><?php
                                    $estado = $report['estado'];
                                    if ($estado == "1") {
                                        echo "<p style='color:#ffc107;'>Em Análise</p>";
                                    } else if ($estado == "2") {
                                        echo "<p style='color:#00ff8a;'>Aprovado</p>";
                                    } else {
                                        echo "<p style='color:red;'>Revogado</p>";
                                    }
                                    ?></p>
                            </td>
                            <td>
                                <a href="./reports.php?id_report=<?= $report['id_report'] ?>">
                                    <i class="fa fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                <?php }
                } ?>


            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#report').DataTable();
    });
</script>

<?php
$pagina = basename($_SERVER["REQUEST_URI"]);
if ($pagina != "reports.php") {
    include('./report.php');
}

include('./partials/footer.php');
?>