<?php include 'page_parts/header.php'; ?>

<?php
$value_search = $_GET['search'];

if (strlen($value_search) <= 0) {
    header('location:feed.php');
    exit;
}

$addpesquisa = $conn->prepare("insert into historico_pesquisa (id_utilizador, pesquisa) VALUES (?, ?)");
$addpesquisa->bind_param("is", $userq['id_user'], $value_search);
$addpesquisa->execute();
$addpesquisa->close();

$search = explode(" ", $value_search);
$description = "";
$s_user = "";
$s_pub = "";
$s_eventos = "";
$s_market = "";

foreach ($search as $s) {
    //2
    $s_user .= "`nome` LIKE '%" . $s . "%' or `username` LIKE '%" . $s . "%' or ";
    //1
    $s_pub .= "`conteudo` LIKE '%" . $s . "%' or ";
    //3
    $s_eventos .= "`titulo` LIKE '%" . $s . "%' or `localizacao` LIKE '%" . $s . "%' or `descricao` LIKE '%" . $s . "%' or";
    //1
    $s_market .= "`titulo` LIKE '%" . $s . "%' or ";
}


/*
 * foreach ($search as $s) {
    //2
    $s_user .= "`nome` LIKE '%?%' or `username` LIKE '%?%' or ";
    //1
    $s_pub .= "`conteudo` LIKE '%?%' or ";
    //3
    $s_eventos .= "`titulo` LIKE '%?%' or `localizacao` LIKE '%?%' or `descricao` LIKE '%?%' or";
    //1
    $s_market .= "`titulo` LIKE '%?%' or ";
}*/

$s_user = substr($s_user, 0, -3);
$s_pub = substr($s_pub, 0, -3);
$s_eventos = substr($s_eventos, 0, -3);
$s_market = substr($s_market, 0, -3);

$n_search_terms = count($search);


/*
$tfields_1 = str_repeat('s', $n_search_terms);
$tfields_2 = str_repeat('ss', $n_search_terms);
$tfields_3 = str_repeat('sss', $n_search_terms);
print_r($search);

$evento = $conn->prepare("SELECT * FROM `users` WHERE ($s_user)");
$evento->bind_param($tfields_1, $search);
$evento->execute();


exit;



print_r($users);
exit;*/

$users = $conn->query("SELECT * FROM `users` WHERE ($s_user)"); // estado_pub = 1
$publicacoes = $conn->query("SELECT * FROM `publicacoes` WHERE ($s_pub)");
$eventos = $conn->query("SELECT * FROM `eventos` WHERE ($s_eventos)");
$market = $conn->query("SELECT * FROM `marketplace` WHERE ($s_market)");


$resultados = array();

//cria sub arrays para resultaods de publicacoes
foreach ($publicacoes as $pub) {

    // verifica se a publicaoca tem imagem se tiver  coloca no array se nao mete noimg.png
    $imagem = $conn->query("select * from publicacoes_fotos where publicacao_id =" . $pub['publicacao_id']);
    if($imagem->num_rows > 0){
        $img = $imagem->fetch_assoc()['caminho'];
    }
    else{
        $img='noimg.png';
    }
    $pub_ar = [
        'titulo' => substr($pub['conteudo'], 0, 50),
        'subtitulo' => substr($pub['conteudo'], 0, 80),
        'tipo' => 'publicacao',
        'img' => './img/publicacoes/'.$img,
        'link' => './partilha.php?id_pub=' . $pub['publicacao_id'],
    ];
    array_push($resultados, $pub_ar);
}

//cria sub arrays para resultaods de utilizadores
foreach ($users as $user) {
    $user_arr = [
        'titulo' => $user['username'],
        'subtitulo' => $user['username'],
        'tipo' => 'pessoa',
        'img' => 'img/fotos_perfil/'.$user['profile_image'],
        'link' => './perfil.php?username=' . $user['username'],
    ];
    array_push($resultados, $user_arr);
}

//cria sub arrays para resultaods de eventos
foreach ($eventos as $evento) {
    $eventos_arr = [
        'titulo' => $evento['titulo'],
        'subtitulo' => substr($evento['descricao'], 0, 50),
        'tipo' => 'evento',
        'img' => 'img/eventos/'.$evento['imagem'],
        'link' => './evento.php?id=' . $evento['id_evento'],
    ];
    array_push($resultados, $eventos_arr);
}
//cria sub arrays para resultaods de marketplace
foreach ($market as $mark) {
    $market_arr = [
        'titulo' => $mark['titulo'],
        'subtitulo' => $mark['categoria'],
        'tipo' => 'marketplace',
        'img' => './img/marketplace/'.$mark['imagem'],
        'link' => './marketplace?id=' . $mark['id_produto'],
    ];
    array_push($resultados, $market_arr);
}
shuffle($resultados);





?>

    <div class="parts">

        <?php include 'page_parts/left.php'; ?>

        <div class="center">
            <div class="filtros">
                <h4>Filtros:</h4>
            </div>
            <div class="actions">
                <a class="bt_op active_bt" href="#" id="todos">
                    <div class="white">
                        <p></p>
                        <p>Tudo</p>
                    </div>
                </a>
                <a class="bt_op" href="#" id="pessoa">
                    <div class="white">
                        <p></p>
                        <p>Pessoas</p>
                    </div>
                </a>
                <a class="bt_op" href="#" id="publicacao">
                    <div class="white">
                        <p></p>
                        <p>Publicações </p>
                    </div>
                </a>

                <a class="bt_op" href="#" id="eventos">
                    <div class="white">
                        <p></p>
                        <p>Eventos </p>
                    </div>
                </a>

                <a class="bt_op" href="#" id="marketplace">
                    <div class="white">
                        <p></p>
                        <p>Marketplace </p>
                    </div>
                </a>
            </div>

            <div class="col-12 resultados-para">
                <h1 id="resultados_frase">Resultados para: <?= $value_search ?></h1>
                <hr>
            </div>

            <div class="resultados" id="resultados">
                <?php
                if ($resultados) {
                    foreach ($resultados as $resultado) { ?>
                        <div class="resultado" type="<?= $resultado['tipo'] ?>">
                            <a href="<?= $resultado['link'] ?>">
                                <div class="d-flex">
                                    <div class="img-radius">
                                        <img src="<?=$resultado['img']?>" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="titulo">
                                            <h2><?= $resultado['titulo'] ?></h2>
                                        </div>
                                        <div class="desc">
                                            <p><?= $resultado['tipo'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>


    </div>

<?php include 'page_parts/footer.php'; ?>