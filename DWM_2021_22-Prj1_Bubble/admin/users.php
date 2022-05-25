<?php

require_once('./partials/header.php');

$users = $conn->query('select * from users');
$generosq = $conn->query('select * from generos');

foreach ($generosq as $key => $genero) {
    $valoresgeneros[$key] = $conn->query('select count(*) as total from users where genero =' . $genero['genero_id'])->fetch_assoc()['total'];
}
foreach ($generosq as $key => $genero) {
    $generos[$key] = $genero['nome_genero'];
}

$nacionalidadesq = $conn->query('select * from nacionalidades');

foreach ($nacionalidadesq as $key => $nacionalidade) {
    $valoresnacionalidades[$key] = 1;//$conn->query('select count(*) as total from users where nacionalidade ='.$nacionalidade['nacionalidade_id'])->fetch_assoc()['total'];
}
foreach ($nacionalidadesq as $key => $nacionalidade) {
    $nacionalidades[$key] = $nacionalidade['gentilico'];
}


if (!empty($_GET['email'])) {

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


?>


    <div class="s-container">
        <div style="max-width: 400px" class="card">
            <canvas id="users_generos"></canvas>
        </div>

        <div style="max-width: 400px">
            <canvas id="users_nacionalidades"></canvas>
        </div>

        <script>
            /* genero*/
            const labelsgenero = <?php echo json_encode($generos); ?>;

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
            const labelsnacionalidades = <?php echo json_encode($nacionalidades); ?>;

            const datanacionalidades = {
                labels: labelsnacionalidades,

                datasets: [{
                    label: 'Gêneros',
                    backgroundColor: ['blue', 'pink', 'yellow'],
                    borderColor: ['blue', 'pink', 'yellow'],
                    data: <?php echo json_encode($valoresnacionalidades); ?>
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

            /* fim genero */

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
?>