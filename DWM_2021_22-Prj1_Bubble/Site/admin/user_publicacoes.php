<?php
include('./partials/header.php');

$userid = $_GET['userid'];

// pesquisa pelo user
$user_s = $conn->prepare("Select * from users where id_user =  ?");
$user_s->bind_param("i", $userid);
$user_s->execute();
$user = $user_s->get_result()->fetch_assoc();
$user_s->close();

// se o user nao exitir manda para a pagina de users
if (!isset($user)) {
    array_push($_SESSION['alerts']['errors'], 'Este utilizador não existe!');
    header('location:./users.php');
    exit;
}


// obtem as publicacoes do user
$publicacoes_q = $conn->prepare("select * from publicacoes join users on publicacoes.user_id = users.id_user
where publicacoes.user_id = ?");
$publicacoes_q->bind_param("i", $user['id_user']);
$publicacoes_q->execute();
$publicacoes = $publicacoes_q->get_result();
$publicacoes_q->close();

$conn->close();

?>

    <div class="s-container">
        <div class="table-responsive">
            <div class="table-header row">
                <div class="titulo col-10">
                    <h2>Publicacoes de "<?= $user['username'] ?>" | <?= $user['nome'] ?> | <?= $user['email'] ?></h2>
                </div>
            </div>
            <table class="table" id="publicacoes">
                <caption></caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Conteudo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Postado em:</th>
                    <th scope="col">Editar</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($publicacoes as $publicacao) {
                    ?>
                    <tr>
                        <th scope="row">
                            <p><?= $publicacao['publicacao_id'] ?></p>
                        </th>
                        <td>
                            <p>  <?= $publicacao['nome'] ?></p>
                        </td>
                        <td>
                            <p>  <?= $publicacao['email'] ?></p>
                        </td>
                        <td>
                            <p class="cut_content">  <?= $publicacao['conteudo'] ?></p>
                        </td>
                        <td>
                            <?php
                            if($publicacao['estado_pub'] == 1){
                            ?>
                            <span class="smini-card bg-user-e2">Ativo</span>
                            <?php
                            }else if($publicacao['estado_pub'] == 2){
                            ?>
                            <span class="smini-card bg-user-e3">Desativado</span>
                                <?php
                            }else{
                            ?>
                            <span class="smini-card bg-user-e5">Indefinido</span>
                            <?php
                            }
                            ?>


                        </td>
                        <td><p>  <?= $publicacao['created_at'] ?></p></td>
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
include('./partials/footer.php'); ?>