<?php
include('./partials/header.php');

$publicacoes = $conn->query('select * from publicacoes inner join users on publicacoes.user_id = users.id_user');

$conn->close();
?>

<div class="s-container">
    <div class="table-responsive">
        <div class="table-header row">
            <div class="titulo col-10">
                <h2>Publicacoes</h2>
            </div>
        </div>
        <table class="table" id="publicacoes">
            <caption></caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Postado em:</th>
                <th scope="col">Editar</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($publicacoes as $publicacao) {
                ?>
                <tr>
                    <th scope="row"><?= $publicacao['publicacao_id'] ?></th>
                    <td>
                        <p>  <?= $publicacao['nome'] ?></p>
                    </td>
                    <td>
                        <p>  <?= $publicacao['email'] ?></p>
                    </td>
                    <td>   <p>  <?= $publicacao['created_at'] ?></p></td>
                    <td>
                        <a href="./publicacao.php?publicacaoid=<?= $publicacao['publicacao_id'] ?>">
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
    $(document).ready(function () {
        $('#publicacoes').DataTable();
    });
</script>

<?php
include('./partials/footer.php');

?>





