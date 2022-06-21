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

$publicacoes = $conn->query("SELECT * FROM publicacoes WHERE " . implode(' AND ', $searchTermBits) . " ");

?>

    <div class="parts">

        <?php include 'page_parts/left.php'; ?>

        <div class="center">


            <?php


            print_r($publicacoes->fetch_assoc());


            ?>
        </div>

        <div class="right">

        </div>
    </div>

<?php include 'page_parts/footer.php'; ?>