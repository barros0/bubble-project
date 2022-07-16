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

        <a href="./user_publicacoes.php?userid=<?= $userid ?>" class="btn-warning btn ">Ver publicações do utilizador</a>

        <button type="submit" class="btn btn-primary">Gravar</button>


    </form>





</div>



    <?php
    include('./partials/footer.php');
    ?>
