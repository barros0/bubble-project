<?php include 'page_parts/header.php'; ?>

<?php

$resultados = array();


$search = $_GET['search'];

$searchTermBits = [];

$addpesquisa = $conn->prepare("insert into historico_pesquisa (id_utilizador, pesquisa) VALUES (?, ?)");
$addpesquisa->bind_param("is", $userq['id_user'], $search);
$addpesquisa->execute();


$pesquisaTerms = explode(' ', $search);
$searchTermBits = array();
foreach ($pesquisaTerms as $termo) {
    $termo = trim($termo);
    if (!empty($termo)) {
        array_push($searchTermBits, "conteudo LIKE '%$termo%'");
    }
}
print_r($searchTermBits);

$publicacoes = $conn->query("SELECT * FROM publicacoes where estado_pub = 1 and WHERE " . implode(' AND ', $searchTermBits) . " ");

$users = $conn->query("SELECT * FROM users WHERE " . implode(' AND ', $searchTermBits) . " ");

foreach ($publicacoes as $pub) {
    $pub_ar = [
        'titulo' => $pub['conteudo'],
        'subtitulo' => $pub['conteudo'],
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

?>

    <div class="parts">

        <?php include 'page_parts/left.php'; ?>

        <div class="center">


            <?php


            print_r($resultados);


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
                    <h1>Resultados para: <?= $search ?></h1>
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