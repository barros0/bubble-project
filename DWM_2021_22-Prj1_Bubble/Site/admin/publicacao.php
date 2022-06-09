<?php
include('./partials/header.php');
$pubid = $_GET['publicacaoid'];

$publicacao = $conn->query('select * from publicacoes inner join users on publicacoes.user_id = users.id_user
where user_id =' . $pubid)->fetch_assoc();

$comentarios = $conn->query('select * from comentarios inner join users on publicacoes.user_id = users.id_user where publicacao_id =' . $publicacao['publicacao_id']);

$conn->close();


?>

<div class="s-container">

    <h1>

    </h1>


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
                    <p>  <?= $publicacao['comentario'] ?></p>
                </td>
                <td><p>  <?= $publicacao['created_at'] ?></p></td>
                <td>
                    <a href="./remover-publicacao.php?publicacaoid=<?= $publicacao['publicacao_id'] ?>">
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

<script>
    $(document).ready(function () {
        $('#comentarios').DataTable();
    });
</script>

<?php
include('./partials/footer.php');

?>





