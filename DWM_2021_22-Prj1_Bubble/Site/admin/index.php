<?php
include('./partials/header.php');

$c_users = $conn->query('select count(*) as total from users')->fetch_assoc()['total'];
$c_publicacoes = $conn->query('select count(*) as total from publicacoes')->fetch_assoc()['total'];
$c_users = $conn->query('select count(*) as total from users')->fetch_assoc()['total'];




// files

// converte de bytes para MB ou GB
function converteTamanho($size)
{
    // GB
    $unidade = 'GB';
    $tamanho =  round($size / pow(1024, 3), 2);

    // se der 0 para gb faz para mb

    if ($tamanho <= 1) {
        $unidade = 'MB';
        $tamanho =  round($size / pow(1024, 2), 2);
    }

    return $tamanho . ' ' . $unidade;
}

function tamanhoPasta($path)
{
    $bytestotal = 0;
    $path = realpath($path);
    if ($path !== false && $path != '' && file_exists($path)) {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal;
}

$total_livre =  converteTamanho(disk_free_space('../'));
$site_total_espaco =  converteTamanho(tamanhoPasta('../'));
$imagens_espaco =  converteTamanho(tamanhoPasta('../img'));
$total_espaco =  converteTamanho(disk_total_space('../'));
$videos_espaco =  converteTamanho(tamanhoPasta('../videos'));



/*
 graficos users
*/
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

<div class="title-page align-items-center nav_bar_index">
    <div class="space">
    </div>
    <div class="bigtitle">
        <div class="welcome">
            <div class="d-flex align-items-center">
                <div class="d-flex flex-column align-items-end navbar_dash">
                    <h5 class="welcome-frase">Bem-vindo <?= $user['nome'] ?></h5>
                    <div id="horas">
                    </div>
                </div>
                <img class="foto" src="../img/fotos_perfil/<?= $user['profile_image'] ?>" alt="">
            </div>
        </div>
    </div>
</div>

<main class="container" id="main">
    <div class="row">
        <div class="col-6">
            <div class="flex-wrap">
                <div class="flex flex-wrap">
                    <div class="mini-card">
                        <div>
                            <i class="fa fa-user icon"></i>
                        </div>
                        <h2 class="titulo">Users</h2>
                        <span class="valor"><?= $c_users ?></span>
                    </div>
                    <div class="mini-card">
                        <div>
                            <i class="fa fa-pen-clip icon"></i>
                        </div>
                        <h2 class="titulo">Publicações</h2>
                        <span class="valor"><?= $c_publicacoes ?></span>
                    </div>
                    <div class="mini-card">
                        <div>
                        <i class="fa-solid fa-heart icon"></i>
                        </div>
                        <h2 class="titulo">Likes</h2>
                        <span class="valor"><?= $c_users ?></span>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
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
        </div>


        <div class="armazenamento d-flex flex-column col-12 col-lg-5 text-white">
            <div class="header d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h4 class="text-white">Armazenamento</h4>
                    <span class="text-swhite" style="font-size: 1rem;"> <?= $total_livre ?> livres de <span id="total-value"><?= $total_espaco ?></span></span>
                </div>
                <div class="progress bg-transparent" style="height: 20px;">
                    <div class="progress-bar bg-transparent" style="width: 20%;" data-bs-toggle="tooltip" title="System">
                        <div class="progress-bar bg-primary bg-gradient bar h-100"></div>
                    </div>
                    <div class="progress-bar bg-transparent" style="width: 20%;" data-bs-toggle="tooltip" title="Files">
                        <div class="progress-bar bg-warning bg-gradient bar h-100"></div>
                    </div>
                    <div class="progress-bar bg-transparent" style="width: 11%;" data-bs-toggle="tooltip" title="Images">
                        <div class="progress-bar bg-success bg-gradient bar h-100"></div>
                    </div>
                    <div class="progress-bar bg-transparent" style="width: 32%;" data-bs-toggle="tooltip" title="Videos">
                        <div class="progress-bar bg-info bg-gradient bar h-100"></div>
                    </div>
                    <div class="progress-bar bg-transparent" style="width: 17%;" data-bs-toggle="tooltip" title="Audios">
                        <div class="progress-bar bg-light bg-gradient bar h-100"></div>
                    </div>
                </div>
            </div>
            <div class="body d-flex flex-column ">
                <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded" style="width: 25px;height: 25px;"></div>
                        <span class="item-titulo fs-5 ms-2">System</span>
                    </div>
                    <span class="text-swhite">
                        <span id="system-value"><?= $site_total_espaco ?></span>
                    </span>
                </div>

                <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning rounded" style="width: 25px;height: 25px;"></div>
                        <span class="item-titulo fs-5 ms-2">Ficheiros</span>
                    </div>
                    <span class="text-swhite">
                        <span id="files-value">5</span>
                    </span>
                </div>

                <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-success rounded" style="width: 25px;height: 25px;"></div>
                        <span class="item-titulo fs-5 ms-2">Imagens</span>
                    </div>
                    <span class="text-swhite">
                        <span id="images-value"><?= $imagens_espaco ?></span>
                    </span>
                </div>

                <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-info rounded" style="width: 25px;height: 25px;"></div>
                        <span class="item-titulo fs-5 ms-2">Videos</span>
                    </div>
                    <span class="text-swhite">
                        <span id="videos-value"><?= $videos_espaco ?></span>
                    </span>
                </div>

                <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-light rounded" style="width: 25px;height: 25px;"></div>
                        <span class="item-titulo fs-5 ms-2">Audios</span>
                    </div>
                    <span class="text-swhite">
                        <span id="audios-value">4</span>
                    </span>
                </div>

                <div class="item-amarzenamento d-flex align-items-center justify-content-between mt-3 border-bottom border-secondary pb-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-dark rounded" style="width: 25px;height: 25px;"></div>
                        <span class="item-titulo fs-5 ms-2">Outros</span>
                    </div>
                    <span class="text-swhite">
                        <span id="audios-value">4</span>
                    </span>
                </div>
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
    </div>
</main>

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

    function random_cores(limite) {
        var colors = [];
        while (colors.length < limite) {
            do {
                var color = Math.floor((Math.random() * 1000000) + 1);
            } while (colors.indexOf(color) >= 0);
            colors.push("#" + ("000000" + color.toString(16)).slice(-6));
        }
        return colors;
    }


    var nacionalidades_labels_keys = <?php echo json_encode(array_keys($nacionalidades)); ?>;
    var cores = random_cores(<?php echo count($nacionalidades); ?>);
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
    };
    const idadesChart = new Chart(
        document.getElementById('users_idade'),
        configidades
    );
    /*fim idade*/
</script>


<?php
include('./partials/footer.php');

?>