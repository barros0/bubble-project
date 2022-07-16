<?php
include('./partials/header.php');

$pubid = $_GET['publicacaoid'];

$publicacaoq = $conn->prepare("select * from publicacoes where publicacao_id = ?");
$publicacaoq->bind_param("i", $pubid);
$publicacaoq->execute();
$publicacao = $publicacaoq->get_result()->fetch_assoc();


if (!isset($publicacao)) {
    array_push($_SESSION['alerts']['errors'], 'Esta publicação não existe!');
    header('location:./users.php');
    exit;
}

$comentariosq = $conn->prepare("select * from comentarios join users on comentarios.user_id = users.id_user where comentarios.publicacao_id = ?");
$comentariosq->bind_param("i", $publicacao['publicacao_id']);
$comentariosq->execute();
$comentarios = $comentariosq->get_result();


$conn->close();


?>

<div class="s-container">
    <form class="form-control form-control-s" method="post" enctype="multipart/form-data"
          action="./publicacao_atualizar.php?publicacaoid=<?= $publicacao['publicacao_id'] ?>"
          autocomplete="off">

        <div class="title">
            <h2>Atualizar Publicação #<?= $publicacao['publicacao_id'] ?></h2>
            <i id="fechar_modal_faq" class='bx bx-x' onClick="Javascript:window.location.href = './users.php';"></i>
        </div>


        <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea name="conteudo" class="form-control" id="conteudo"
                      placeholder="Conteudo"><?= $publicacao['conteudo'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option <?php if ($publicacao['estado_pub'] == 1) {
                    echo 'selected';
                } ?>
                        value="1">Ativa
                </option>
                <option <?php if ($publicacao['estado_pub'] == 2) {
                    echo 'selected';
                } ?>
                        value="2">Desativada
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>


    </form>

    <div>


        <?php if (!empty($comentarios)) { ?>
        <div class="table-responsive">
            <div class="table-header row">
                <div class="titulo col-10">
                    <h2>Comentários</h2>
                </div>
            </div>
            <table class="table" id="comentarios">
                <caption></caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Postado em:</th>
                    <th scope="col">Remover</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($comentarios as $comentario) {
                    ?>
                    <tr>
                        <th scope="row"><?= $comentario['publicacao_id'] ?></th>
                        <td>
                            <p>  <?= $comentario['nome'] ?> - # <?= $comentario['id_user'] ?></p>
                        </td>
                        <td>
                            <p>  <?= $comentario['comentario'] ?></p>
                        </td>
                        <td><p>  <?= $comentario['created_at'] ?></p></td>
                        <td>
                            <a href="remover-comentario.php?comentarioid=<?= $comentario['comentario_id'] ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <?php
                } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function () {
            $('#comentarios').DataTable();
        });
    </script>

    <?php
    include('./partials/footer.php');

    ?>





