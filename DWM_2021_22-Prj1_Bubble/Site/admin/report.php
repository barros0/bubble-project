<?php
$id_report = $_GET['id_report'];

$report = $conn->query('SELECT * FROM reports where id_report = ' . $id_report)->fetch_assoc();

if (!isset($report)) {
    array_push($_SESSION['alerts']['errors'], 'Este Report não existe!');
    header('location:./reports.php');
    exit;
}

$id_pub = $report['publicacao_id'];
$publicacao_reported = $conn->query("SELECT * FROM publicacoes where publicacao_id=" . $id_pub)->fetch_assoc();
$imagem = $conn->query("SELECT * FROM publicacoes_fotos where publicacao_id=" . $id_pub)->fetch_assoc();
?>

<div class="atualizar_faq_form">
    <form id="atualizaFAQ" name="atualizaFAQ" action="./report_aprovar.php?id_report=<?= $id_report ?>" class="form-control" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="title">
            <h3>Atualizar Report</h3>
            <i id="fechar_modal_faq" class='bx bx-x' onClick="Javascript:window.location.href = './reports.php';"></i>
        </div>
        <div class="wrap_publicacao_reported">
            <?php if ($imagem != null) { ?>
                <div class="imagem">
                    <label for="pergunta">Imagem:</label>
                    <img src="../../Site/img/publicacoes/<?= $imagem['caminho'] ?>" alt="foto_reported">
                </div>
            <?php } ?>
            <div class="conteudo">
                <label for="pergunta">Conteudo:</label>
                <p><?= $publicacao_reported['conteudo'] ?></p>
            </div>
        </div>
        <div class="wrap_conteudo_report">
            <div class="form-group categoria">
                <label for="pergunta">ID Publicação:</label>
                <p><?= $id_pub ?></p>
            </div>
            <div class="form-group categoria">
                <label for="pergunta">Categoria:</label>
                <p><?= $report['categoria'] ?></p>
            </div>
            <div class="form-group categoria">
                <label for="resposta">Report Comment:</label>
                <p><?= $report['report_comment'] ?></p>
            </div>
        </div>

        <a class="btn btn-danger" href="./report_negar.php?id_report=<?= $id_report ?>">Negar Report</a>
        <button type="submit" class="btn btn-primary">Aprovar Report</button>

    </form>
</div>