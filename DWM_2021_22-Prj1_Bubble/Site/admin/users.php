<?php

require_once('./partials/header.php');

// get al users
$users = $conn->query('select * from users');

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
    $nacionalidades[$nacionalidade['gentilico']] = $conn->query('select count(*) as total from users where nacionalidade ='.$nacionalidade['nacionalidade_id'])->fetch_assoc()['total'];
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

<<<<<<< Updated upstream
// para cada user
=======
$generossq = $conn->query('select * from generos');


>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
// para os generos que nao tem users coloca 0 para evitar erros
=======
>>>>>>> Stashed changes
foreach ($generos as $key => $genero) {
    if (empty($idades[$genero])) {
        $idades[$genero] = [0];
    }
};


?>


    <div class="s-container">
        <div class="d-flex flex-wrap">
            <div class="widget">
                <div class="col-12">
                    <h2 class="titulo">
                        Géneros
                    </h2>
                    <canvas id="users_generos"></canvas>
                </div>

            </div>
            <div class="widget">
                <div class="col-12">
                    <h2 class="titulo">
                        Nacionalidades
                    </h2>
                </div>
                <canvas id="users_nacionalidades"></canvas>
            </div>
        </div>

        <div class="widget full ">
            <div class="col-12">
                <h2 class="titulo">
                    Idades por género
                </h2>
            </div>
            <canvas id="users_idade"></canvas>
        </div>


        <script>
            /// crias charts com js e frame com valores recolhidos em php

            /* genero*/
            const labelsgenero = <?php echo json_encode(array_values($generos)); ?>;
            const datagenero = {
                labels: labelsgenero,

                datasets: [{

                    backgroundColor: ['blue', 'pink', 'yellow'],
                    borderColor: ['blue', 'pink', 'yellow'],
                    data: <?php echo json_encode($valoresgeneros); ?>
                }]
            };

            const configgenero = {
                type: 'pie',
                data: datagenero,
            };
            const generoChart = new Chart(
                document.getElementById('users_generos'),
                configgenero
            );

            /* fim genero */

            function random_cores(limite){
                var colors = [];
                while (colors.length < limite) {
                    do {
                        var color = Math.floor((Math.random()*1000000)+1);
                    } while (colors.indexOf(color) >= 0);
                    colors.push("#" + ("000000" + color.toString(16)).slice(-6));
                }
                return colors;
            }


            var nacionalidades_labels_keys = <?php echo json_encode(array_keys($nacionalidades)); ?>;
            var cores = random_cores( <?php echo count($nacionalidades); ?>);
            const datanacionalidades = {
                labels: nacionalidades_labels_keys,
                datasets: [{
                    label: nacionalidades_labels_keys,
                    backgroundColor: cores,
                    data: <?php echo json_encode(array_values($nacionalidades)); ?>
                }]

            };

            const confignacionalidades = {
                type: 'pie',
                data: datanacionalidades,
                options: {
                    legend: {
                        display: false,
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                }


            };
            const nacionalidadesChart = new Chart(
                document.getElementById('users_nacionalidades'),
                confignacionalidades
            );

            /* fim nacionalidade */


            /* idade */
            const dataidades = {
                datasets: [{
                    type: 'bar',
                    label: 'Masculino',
                    backgroundColor: 'red',
                    data: <?php echo json_encode($idades['Masculino']); ?>
                }, {
                    type: 'bar',
                    label: 'Feminino',
                    backgroundColor: 'pink',
                    data:  <?php echo json_encode($idades['Feminino']); ?>,
                }
                    , {
                        type: 'bar',
                        label: 'Outro',
                        backgroundColor: 'yellow',
                        data:  <?php echo json_encode($idades['Outro']); ?>,
                    }],

            };

            const configidades = {
                type: 'bar',
                data: dataidades,
            };
            const idadesChart = new Chart(
                document.getElementById('users_idade'),
                configidades
            );
            /*fim idade*/


        </script>


        <div class="table-responsive">
            <div class="table-header row">
                <div class="titulo col-10">
                    <h2>fdfd</h2>
                </div>

                <div class="filtro col-2" hidden>
                    <a href="#" class="filter filter-close">
                        <i class="fa fa-filter"></i>
                        Filtros
                    </a>

                    <div class="filter-w">

                        <div class="filtros">
                            <div class="filter-line">
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="text" placeholder="Email">
                            </div>
                        </div>


                        <div class="opt">
                            <input type="button" value="Fechar"
                                   class="btn disable">
                            <input type="button" value="Filtrar"
                                   class="btn">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <caption>Lista de utilizadores</caption>
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
                        <th scope="row">1</th>
                        <td>
                            <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                            <span><?php echo $user['nome'] ?></span>
                        </td>
                        <td><?php echo $user['email'] ?></td>
                        <td>
                <span class="mini-card bg-warning">
                    Bloqueado
                </span>
                        </td>
                        <td>
                            <a href="./user.php?userid=<?php echo $user['id_user'] ?>">
                                <i class="fa fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>


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