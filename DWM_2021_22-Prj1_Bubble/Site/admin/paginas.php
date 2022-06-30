<?php
include('./partials/header.php');

$paginas = $conn->query('SELECT * FROM paginas_site');
$paginascss = $conn->query('SELECT * FROM files_css_paginas_site');
$paginasjs = $conn->query('SELECT * FROM files_js_paginas_site');

?>

<div id="container-faqs" class="container-faqs s-container">
    <div class="table-responsive">
        <table class="table" id="paginas">
            <div class="cabecalho_table">
                <div class="titulo_table">Lista das Páginas</div>
                <div class="button_adicionar">Adicionar +</div>
            </div>
            <caption></caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome da Página</th>
                    <th scope="col">URL</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paginas as $pagina) {
                ?>
                    <tr>
                        <th scope="row"><?= $pagina['id_pag'] ?></th>
                        <td>
                            <p> <?= $pagina['nomepagina'] ?></p>
                        </td>
                        <td>
                            <p><?= $pagina['urlpagina'] ?></p>
                        </td>
                        <td>
                            <a href="./paginas.php?pagid=<?= $pagina['id_pag'] ?>">
                                <i class="fa fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="form_inserir_pags">
    <form id="inserirPag" class="form-control" name="inserirPag" onsubmit="return validateForm()" method="post" action="inserirpag.php">
        <div class="title">
            <h3>Inserir nova Página<h3>
                    <i id="fechar_modal_pag" class='bx bx-x'></i>

        </div>
        <div class="form-group">
            <label for="nome">Nome da Página (ex: Feed)</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="caminho">URL (ex: feed.php) </label>
            <input type="text" name="caminho" id="caminho" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="caminhoCSS">URL CSS (ex: css/feed.css) </label>
            <input type="text" name="caminhoCSS[]" id="caminhoCSS" class="form-control">
        </div>

        <div class="form-group">
            <label for="caminhoJS">URL JavaScript (ex: js/feed.js) </label>
            <input type="text" name="caminhoJS[]" id="caminhoJS" class="form-control">
        </div>

        <div class="form-group" id="novoCSS">

        </div>

        <div class="form-group" id="novoJS">

        </div>
        <div class="button-form">
            <button type="submit" class="btn btn-primary">Gravar</button>
            <input type="button" class="btn" value="Novo CSS" id="inserirCSS">
            <input type="button" class="btn" value="Novo JS" id="inserirJS">
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('#paginas').DataTable();
    });
</script>

<?php
$pagina = basename($_SERVER["REQUEST_URI"]);
if ($pagina != "paginas.php") {
    include('./pagina.php');
}

include('./partials/footer.php');

?>