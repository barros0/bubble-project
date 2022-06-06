<?php
include('./partials/header.php');

$empregoid = $_GET['empregoid'];

$emprego = $conn->query('Select * from empregos where id_emprego = ' . $empregoid)->fetch_assoc();

$conn->close();

if (!isset($emprego)) {
    array_push($_SESSION['alerts']['errors'], 'Este utilizador não existe!');
    header('location:./users.php');
    exit;
}

?>



<div class="s-container">
    <form class="form-control" method="post" enctype="multipart/form-data" action="./update_user.php?userid=<?= $userid ?>"
          autocomplete="off">

        <div class="title">
            <h2>Atualizar emprego</h2>
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
        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>


    <?php
    include('./partials/footer.php');
    ?>
