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
    <form class="form-control" method="post" enctype="multipart/form-data"
          action="./update_user.php?userid="
          autocomplete="off">

        <div class="title">
            <h2>Atualizar utilizador</h2>
            <i id="fechar_modal_faq" class='bx bx-x' onClick="Javascript:window.location.href = './users.php';"></i>
        </div>


        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" value="" type="email" class="form-control" id="email"
                   placeholder="Email">
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>


    </form>

    <div>
    <h2>Comentarios</h2>

    <?php if(!empty($comentarios)) {?>
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

<script>
    $(document).ready(function () {
        $('#comentarios').DataTable();
    });
</script>

<?php
include('./partials/footer.php');

?>





