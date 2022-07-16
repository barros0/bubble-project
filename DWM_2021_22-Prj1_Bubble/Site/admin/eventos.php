<?php
include('./partials/header.php');

$eventos = $conn->query('SELECT * FROM eventos');
include('./partials/nav_bar.php');
?>

<div id="container-eventos" class="container-eventos s-container">
    <div class="table-responsive">
        <table class="table" id="eventos">
            <div class="cabecalho_table">
                <div class="titulo_table">Eventos do Bubble</div>
                <div class="button_adicionar">Adicionar +</div>
            </div>
            <caption></caption>
            <thead>
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Localização</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Editar</th>
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
<div class="form_inserir_eventos">
    <form enctype="multipart/form-data" id="inserirevento" class="form-control" name="inserirevento" onsubmit="return validateForm()" method="post" action="insereevento.php">
        <div class="title">
            <h3>Adicionar Evento</h3>
            <i id="fechar_modal_evento" class='bx bx-x'></i>

        </div>
        <div class="form-group">
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="localizacao">Localização: </label>
            <input type="text" name="localizacao" id="localizacao" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descricao: </label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>
        <div class="form-group">
        <label for="foto_evento">Foto:</label> <br>
            <input type="file" name="foto_evento" class="form-control" required="required" >
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>
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