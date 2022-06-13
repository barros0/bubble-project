<?php

// chamar base de dados
include('bd.php');

// seleciona todas as categorias sem repetir
$produtos = mysqli_query($conn, "SELECT count(id_produto) as total_produtos FROM marketplace");

// transforma em array
$p = mysqli_fetch_array($produtos);

?>

    <li class="pb-2 text-gray-400 hover:text-white filtroAtivo">
        <a href="#" class="cat-todos">Todos<span class="font-bold"> <?php echo($p['total_produtos']) ?></span></a>
    </li>

<?php

// seleciona todas as categorias sem repetir
$categorias = mysqli_query($conn, "SELECT distinct categoria FROM marketplace ORDER BY categoria ASC");

// transforma as categorias em array
$cat = mysqli_fetch_array($categorias);

// para cada categoria do array de categorias:
foreach($categorias as $cat => $categoria):

    // categoria individual
    $nrCat = $categoria['categoria'];

    // soma a quantidade de produtos dentro da categoria
    $somar = mysqli_query($conn, "SELECT count(categoria) as total FROM `marketplace` WHERE categoria = '$nrCat'");

    // transforma em array
    $r = mysqli_fetch_array($somar);

    // mostra nome da categoria
    include('src/nomeCategoria.php');

?>

    <li class="pb-2 text-gray-400 hover:text-white">
        <a href="#" class="<?php echo($categoria['categoria']) ?>"><?php echo($nrCat);?><span class="font-bold"> <?php echo($r['total']) ?></span></a>
    </li>

<?php endforeach; ?>