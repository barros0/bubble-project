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

$publicacoes = $conn->query("SELECT * FROM publicacoes WHERE " . implode(' AND ', $searchTermBits) . " ");

$users = $conn->query("SELECT * FROM users WHERE " . implode(' AND ', $searchTermBits) . " ");

foreach ($publicacoes as $pub) {
    $pub_ar = [
        'titulo' => $pub['conteudo'],
        'subtitulo' => $pub['conteudo'],
        'tipo' => 'publicacao',
        //'img' => './img/publicacoes/'.$conn->query('select * from publicacoes_fotos where publicacao_id ='.$pub['publicacao_id'])->fetch_assoc()['caminho'],
        'link' => './publicacao?id='. $pub['publicacao_id'],
    ];
    array_push($resultados, $pub_ar);
}

?>

    <div class="parts">

        <?php include 'page_parts/left.php'; ?>

        <div class="center">


            <?php


            print_r($resultados);


            ?>
        </div>

        <div class="right">

        </div>
    </div>

<?php include 'page_parts/footer.php'; ?>