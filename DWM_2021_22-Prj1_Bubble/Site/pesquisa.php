<?php include 'page_parts/header.php'; ?>

<?php
$value_search = $_GET['search'];

if(strlen($value_search) <= 0){
    header('location:feed.php');
    exit;
}

$search = explode(" ",$value_search);
$description = "";
$s_user = "";
$s_pub = "";
$s_eventos = "";
$s_market = "";

foreach($search AS $s)
{
    $s_user .= "`nome` LIKE '%".$s."%' or `username` LIKE '%".$s."%' or ";
    $s_pub .= "`conteudo` LIKE '%".$s."%' or ";
    $s_eventos .= "`titulo` LIKE '%".$s."%' or `localizacao` LIKE '%".$s."%' or `descricao` LIKE '%".$s."%' or";
    $s_market .= "`titulo` LIKE '%".$s."%' or ";
}

$s_user = substr($s_user, 0, -3);
$s_pub = substr($s_pub, 0, -3);
$s_eventos = substr($s_eventos, 0, -3);
$s_market = substr($s_market, 0, -3);


$users = $conn->query("SELECT * FROM `users` WHERE ($s_user)"); // estado_pub = 1
$publicacoes = $conn->query("SELECT * FROM `publicacoes` WHERE ($s_pub)");
$eventos = $conn->query("SELECT * FROM `eventos` WHERE ($s_eventos)");
$market = $conn->query("SELECT * FROM `marketplace` WHERE ($s_market)");


$resultados = array();


foreach ($publicacoes as $pub) {
    $pub_ar = [
        'titulo' => substr($pub['conteudo'],0,50),
        'subtitulo' => substr($pub['conteudo'],0,80),
        'tipo' => 'publicacao',
        //'img' => './img/publicacoes/'.$conn->query('select * from publicacoes_fotos where publicacao_id ='.$pub['publicacao_id'])->fetch_assoc()['caminho'],
        'link' => './publicacao?id=' . $pub['publicacao_id'],
    ];
    array_push($resultados, $pub_ar);
}

foreach ($users as $user) {
    $user_arr = [
        'titulo' => $user['username'],
        'subtitulo' => $user['username'],
        'tipo' => 'user',
        //'img' => './img/publicacoes/'.$conn->query('select * from publicacoes_fotos where publicacao_id ='.$pub['publicacao_id'])->fetch_assoc()['caminho'],
        'link' => './perfil?username=' . $user['username'],
    ];
    array_push($resultados, $user_arr);
}

foreach ($eventos as $evento) {
    $eventos_arr = [
        'titulo' => $evento['titulo'],
        'subtitulo' => substr($evento['descricao'],0,50),
        'tipo' => 'evento',
        //'img' => './img/publicacoes/'.$conn->query('select * from publicacoes_fotos where publicacao_id ='.$pub['publicacao_id'])->fetch_assoc()['caminho'],
        'link' => './evento?id=' . $evento['id_evento'],
    ];
    array_push($resultados, $eventos_arr);
}

foreach ($market as $mark) {
    $market_arr = [
        'titulo' => $mark['titulo'],
        'subtitulo' => $mark['categoria'],
        'tipo' => 'marketplace',
        //'img' => './img/publicacoes/'.$conn->query('select * from publicacoes_fotos where publicacao_id ='.$pub['publicacao_id'])->fetch_assoc()['caminho'],
        'link' => './marketplace?id=' . $mark['id_produto'],
    ];
    array_push($resultados, $market_arr);
}


?>

    <div class="parts">

        <?php include 'page_parts/left.php'; ?>

        <div class="center">


            <?php


            ?>
            <style>

                .pesquisa {
                    background-color: var(--background);
                    border-radius: 6px;
                    padding: 10px;
                    margin-bottom: 4px;
                }

                .pesquisa .info {
                    padding-top: 6px;
                    padding-left: 16px;
                }

                .pesquisa .titulo h2 {
                    font-size: 20px;
                    font-weight: bold;
                    text-decoration: none;
                    color: var(--palavras);
                    margin-top: 10px;
                }

                .pesquisa .titulo a:hover {
                    color: var(--verde-hover);
                }

                .pesquisa .titulo * {
                    font-size: 14px;
                    color: var(--palavras);
                }

                .pesquisa .img-radius img {
                    border-radius: 50%;
                    width: 80px;
                    height: 80px;
                    object-fit: cover;
                    background-color: var(--background);
                }

                .notificacoes p, h1 {
                    color: var(--palavras);
                }
            </style>


            <div class="col-12 notificacoes-wrapper">
                <div class="col-12">
                    <h1>Resultados para: <?= $value_search ?></h1>
                </div>

                <div class="notificacoes">
                    <?php
                    if ($resultados) {
                        foreach ($resultados as $resultado) { ?>
                            <div class="pesquisa">
                                <a href="<?=$resultado['link']?>">
                                <div class="d-flex">
                                    <div class="img-radius">
                                        <img src="https://picsum.photos/200/300" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="titulo">
                                            <h2><?php echo $resultado['titulo'] ?></h2>
                                        </div>
                                        <div class="desc">
                                            <p><?php echo $resultado['tipo'] ?></p>
                                        </div>
                                    </div>
                                </div></a>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>

        </div>
    </div>

    <div class="right">

    </div>
    </div>

<?php include 'page_parts/footer.php'; ?>