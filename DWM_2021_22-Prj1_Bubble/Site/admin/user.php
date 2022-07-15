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

// obtem os estados do user
$estados = $conn->query('select * from estados_users');

// obtem as publicacoes do user
$publicacoes = $conn->query('select * from publicacoes inner join users on publicacoes.user_id = users.id_user
where id_user =' . $user['id_user']);

$conn->close();
?>


<div class="s-container">
    <form class="form-control" method="post" enctype="multipart/form-data"
          action="./update_user.php?userid=<?= $userid ?>"
          autocomplete="off">

        <div class="title">
            <h2>Atualizar utilizador</h2>
            <i id="fechar_modal_faq" class='bx bx-x' onClick="Javascript:window.location.href = './users.php';"></i>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" value="<?= $user['email'] ?>" type="email" class="form-control" id="email"
                   placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input autocomplete="off" value="" name="password" type="password" class="form-control" id="password"
                   placeholder="Password">
        </div>


        <div class="form-group col-md-4">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">

                <?php foreach ($estados as $estado) {
                    ?><option <?php if ($estado['estado_user_id'] == $user['estado']) {?>selected <?php
                    } ?>value="<?= $estado['estado_user_id'] ?>"><?= $estado['nome_estado_user'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="estado">Tipo de conta/acesso</label>
            <select name="tipo" id="tipo" class="form-control">
                <option <?php if ($user['tipo'] == 1) {
                        echo 'selected';
                    } ?>
                        value="1">Administrador</option>
                <option<?php if ($user['tipo'] == 2) {
                        echo 'selected';
                    } ?>
                        value="2">Utilizador</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>


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


    <script>
        $(document).ready(function () {
            $('#publicacoes').DataTable();
        });
    </script>
</div>



    <?php
    include('./partials/footer.php');
    ?>
