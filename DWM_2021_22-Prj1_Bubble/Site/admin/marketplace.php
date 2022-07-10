<?php
include('./partials/header.php');

$marketplace = $conn->query('SELECT * FROM marketplace');

?>

<div id="container-marketplace" class="container-marketplace s-container">
    <div class="table-responsive">
        <table class="table" id="marketplace">
            <div class="cabecalho_table">
                <div class="titulo_table">Marketplace do Bubble</div>
                <div class="button_adicionar">Adicionar +</div>
            </div>
            <caption></caption>
            <thead>
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Localização</th>
                    <th scope="col">Descricao</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marketplace as $market) {
                ?>
                    <tr>
                        <th scope="row"><?= $market['id_produto'] ?></th>
                        <td>
                            <p> <?= $market['titulo'] ?></p>
                        </td>
                        <td>
                            <p> <?= $market['preco'] ?></p>
                        </td>
                        <td>
                            <p><?= $market['descricao'] ?></p>
                        </td>
                        <td>
                            <a href="./marketplace.php?marketid=<?= $market['id_produto'] ?>">
                                <i class="fa fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="form_inserir_marketplace">
    <form enctype="multipart/form-data" id="inserirmarket" class="form-control" name="inserirmarket" onsubmit="return validateForm()" method="post" action="inseremarket.php">
        <div class="title">
            <h3>Adicionar market</h3>
            <i id="fechar_modal_market" class='bx bx-x'></i>

        </div>
        <div class="form-group">
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="preco">Preco: </label>
            <input type="text" name="preco" id="preco" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descricao: </label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="foto_market">Foto:</label> <br>
            <input type="file" name="foto_market" class="form-control" required="required" >
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>
</div>


<script>
    $(document).ready(function() {
        $('#marketplace').DataTable();
    });
</script>

<?php
$pagina = basename($_SERVER["REQUEST_URI"]);
if ($pagina != "marketplace.php") {
    include('./market.php');
}

include('./partials/footer.php');

?>