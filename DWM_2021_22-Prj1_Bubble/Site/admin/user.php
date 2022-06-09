<?php
include('./partials/header.php');

$userid = $_GET['userid'];

$user = $conn->query('Select * from users where id_user = ' . $userid)->fetch_assoc();

if (!isset($user)) {
    array_push($_SESSION['alerts']['errors'], 'Este utilizador não existe!');
    header('location:./users.php');
    exit;
}

$estados = $conn->query('select * from estados_users');


?>



<div class="s-container">
    <form class="form-control" method="post" enctype="multipart/form-data" action="./update_user.php?userid=<?= $userid ?>"
          autocomplete="off">

            <div class="title">
                <h2>Atualizar utilizador</h2>
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
                        print_r($estado['estado_user_id'])
                        ?>
                        <option <?php
                        if ($estado['estado_user_id'] == $user['estado']) {
                            ?>
                            selected
                            <?php
                        } ?>
                                value="<?= $estado['estado_user_id'] ?>"><?= $estado['nome_estado_user'] ?></option>
                    <?php } ?>
                </select>
            </div>
        <a class="btn btn-danger" href="./update_user.php?delete_userid=<?= $user['id_user']  ?>">Eliminar</a>
            <button type="submit" class="btn btn-primary">Gravar</button>

    </form>


    <?php
    include('./partials/footer.php');
    ?>
