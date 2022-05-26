<?php

require_once('./partials/header.php');

$users = $conn->query('select * from users');
$generosq = $conn->query('select * from generos');

foreach ($generosq as $key => $genero) {
    $valoresgeneros[$key] = $conn->query('select count(*) as total from users where genero =' . $genero['genero_id'])->fetch_assoc()['total'];
}
foreach ($generosq as $key => $genero) {
    $generos[$genero['genero_id']] = $genero['nome_genero'];
}

$nacionalidadesq = $conn->query('select * from nacionalidades');

foreach ($nacionalidadesq as $key => $nacionalidade) {
    $valoresnacionalidades[$key] = 1;//$conn->query('select count(*) as total from users where nacionalidade ='.$nacionalidade['nacionalidade_id'])->fetch_assoc()['total'];
}
foreach ($nacionalidadesq as $key => $nacionalidade) {
    $nacionalidades[$key] = $nacionalidade['gentilico'];
}
$idades = array();
function getidade($data)
{
    $data = new DateTime($data);
    $atual = new DateTime();
    $dif = $atual->diff($data);
    return $dif->y;
}

$generossq = $conn->query('select * from generos');

;



foreach ($users as $key => $user) {

    $idade = getidade($user['data_nascimento']);

    $genero = $generos[$user['genero']];

    if (empty($idades[$idade])) {
        $idades[$genero][$idade] = 1;
    } else {
        $idades[$genero][$idade] = $idades[$idade]++;
    }
}

foreach ($generos as $key => $genero){
    if(empty($idades[$genero])){
        $idades[$genero] = [0];
    }
};



?>


<div class="s-container">
    <div style="max-width: 400px" class="card">
        <canvas id="users_generos"></canvas>
    </div>

    <div style="max-width: 400px">
        <canvas id="users_nacionalidades"></canvas>
    </div>

    <div style="max-width: 400px">
        <canvas id="users_idade"></canvas>
    </div>

    <script>
    /* genero*/
    const labelsgenero = <?php echo json_encode(array_values($generos)); ?>;
    const datagenero = {
        labels: labelsgenero,

        datasets: [{
            label: 'Gêneros',
            backgroundColor: ['blue', 'pink', 'yellow'],
            borderColor: ['blue', 'pink', 'yellow'],
            data: <?php echo json_encode($valoresgeneros); ?>
        }]
    };

    const configgenero = {
        type: 'pie',
        data: datagenero,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Gêneros',
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                }
            }
        }
    };
    const generoChart = new Chart(
        document.getElementById('users_generos'),
        configgenero
    );

    /* fim genero */



    /* genero*/
    //const labelsnacionalidades = <?php echo json_encode($nacionalidades); ?>;

    const datanacionalidades = {
        //labels: labelsnacionalidades,

        datasets: [{
            label: <?php echo json_encode(array_keys($valoresnacionalidades)); ?>,
            backgroundColor: ['blue', 'pink', 'yellow'],
            borderColor: ['blue', 'pink', 'yellow'],
            data: <?php echo json_encode(array_values($valoresnacionalidades)); ?>
        }]

    };

    const confignacionalidades = {
        type: 'pie',
        data: datanacionalidades,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Nacionalidades',
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                }
            }
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
            data: <?php echo json_encode($idades['Feminino']); ?>,
        }, {
            type: 'bar',
            label: 'Outro',
            backgroundColor: 'yellow',
            data: <?php echo json_encode($idades['Outro']); ?>,
        }],

    };

    const configidades = {
        type: 'bar',
        data: dataidades,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Idades',
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                }
            }

        }
    };
    const idadesChart = new Chart(
        document.getElementById('users_idade'),
        configidades
    );
    /*fim idade*/
    </script>


</div>

<div class="table-responsive">
    <div class="table-header row">
        <div class="titulo col-10">
            <h2>fdfd</h2>
        </div>

        <div class="filtro col-2">
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
                    <input type="button" value="Fechar" class="btn disable">
                    <input type="button" value="Filtrar" class="btn">
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
            <tr>
                <th scope="row">1</th>
                <td>
                    <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                    <span>aaaaa</span>
                </td>
                <td>aaaaa</td>
                <td>
                    <span class="mini-card bg-warning">
                        Bloqueado
                    </span>
                </td>
                <td><i class="fa fa-pen"></i></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>
                    <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                    <span>aaaaa</span>
                </td>
                <td>aaaaa</td>
                <td>
                    <span class="mini-card bg-warning">
                        Bloqueado
                    </span>
                </td>
                <td><i class="fa fa-pen"></i></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>
                    <img class="user-img" src="https://thispersondoesnotexist.com/image" alt="">
                    <span>aaaaa</span>
                </td>
                <td>aaaaa</td>
                <td>
                    <span class="mini-card bg-warning">
                        Bloqueado
                    </span>
                </td>
                <td><i class="fa fa-pen"></i>

                </td>
            </tr>

        </tbody>
    </table>
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