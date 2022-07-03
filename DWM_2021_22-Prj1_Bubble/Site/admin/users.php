<?php

require_once('./partials/header.php');

// get al users
$users = $conn->query('select * from users inner join estados_users on users.estado = estado_user_id');

// get all generos
$generosq = $conn->query('select * from generos');

// passa generos para array associativo com nome e quantidade de users que tem esse geneto
foreach ($generosq as $key => $genero) {
    $valoresgeneros[$key] = $conn->query('select count(*) as total from users where genero =' . $genero['genero_id'])->fetch_assoc()['total'];
}
foreach ($generosq as $key => $genero) {
    $generos[$genero['genero_id']] = $genero['nome_genero'];
}

/// get all nacionaliadades
$nacionalidadesq = $conn->query('select * from nacionalidades');

/// passaklas por array associativo e faz count de quantos axistem com essa nacionalidade
foreach ($nacionalidadesq as $key => $nacionalidade) {
    $nacionalidades[$nacionalidade['pais']] = $conn->query('select count(*) as total from users where nacionalidade =' . $nacionalidade['nacionalidade_id'])->fetch_assoc()['total'];
}

$idades = array();
// conta a idade do usser
function getidade($data)
{
    $data = new DateTime($data);
    $atual = new DateTime();
    $dif = $atual->diff($data);
    return $dif->y;
}

// para cada user
foreach ($users as $key => $user) {

    // conta a idade para o user
    $idade = getidade($user['data_nascimento']);

    // ve o seu genero
    $genero = $generos[$user['genero']];

    // e para cada idade do genero do user adiciona mais um
    if (empty($idades[$idade])) {
        $idades[$genero][$idade] = 1;
    } else {
        $idades[$genero][$idade] = $idades[$idade]++;
    }
}

// para os generos que nao tem users coloca 0 para evitar erros
foreach ($generos as $key => $genero) {
    if (empty($idades[$genero])) {
        $idades[$genero] = [0];
    }
}


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
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) {
                ?>
                    <tr>
                        <th scope="row"><?= $user['id_user'] ?></th>
                        <td>
                            <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                            <span><?= $user['nome'] ?></span>
                        </td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <p class="p10t"> <span class="mini-card bg-user-e<?= $user['estado_user_id'] ?>">
                                    <?= $user['nome_estado_user'] ?>
                                </span></p>
                        </td>
                        <td>
                            <a href="./user.php?userid=<?= $user['id_user'] ?>">
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

/*
 *
 * if (!empty($_GET['email'])) {

}
if (!empty($_GET['ordem'])) {

}
if (!empty($_GET['max_data'])) {

}
if (!empty($_GET['min_data'])) {

}
if (!empty($_GET['email'])) {

}
if (!empty($_GET['email'])) {

}
*/
?>