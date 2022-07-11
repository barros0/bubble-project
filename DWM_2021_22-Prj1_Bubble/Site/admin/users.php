<?php

require_once('./partials/header.php');

// get al users
$users = $conn->query('select * from users inner join estados_users on users.estado = estado_user_id');

include('./partials/nav_bar.php');
?>


<div class="s-container">

    <div class="table-responsive">
        <div class="table-header row">
            <div class="titulo col-10">
                <h2>Lista de utilizadores</h2>
            </div>
        </div>
        <table class="table" id="users">
            <caption></caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) {
                ?>
                    <tr>
                        <th scope="row"><?= $user['id_user'] ?></th>
                        <td>
                            <img class="user-img" src="../img/fotos_perfil/<?= $user['profile_image'] ?>" alt="foto_perfil">
                            <span><?= $user['nome'] ?></span>
                        </td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <p class="p10t"> <span class="smini-card bg-user-e<?= $user['estado_user_id'] ?>">
                                    <?= $user['nome_estado_user'] ?>
                                </span></p>
                        </td>

                        <td>
                            <a class="text-center btn btn-danger" href="./users.php">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="text-center" href="./user.php?userid=<?= $user['id_user'] ?>">
                                <i class="fa fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>



            </tbody>
        </table>
    </div>
</div>


</div>
<script>
    $(document).ready(function() {
        $('#users').DataTable();
    });
</script>

<?php
include('./partials/footer.php');
?>