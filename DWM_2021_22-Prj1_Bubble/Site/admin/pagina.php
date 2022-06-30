<?php
//buscar o id da pagina que foi selecionada 
$idpag = $_GET['pagid'];

$pagina = $conn->query('SELECT * FROM paginas_site WHERE id_pag = ' . $idpag)->fetch_assoc();
$paginascss = $conn->query('SELECT * FROM files_css_paginas_site WHERE id_pagina = ' . $idpag);
$paginasjs = $conn->query('SELECT * FROM files_js_paginas_site WHERE id_pagina = ' . $idpag);



if (!isset($pagina)) {
    array_push($_SESSION['alerts']['errors'], 'Esta Página não existe!');
    header('location:./paginas.php');
    exit;
}

?>

<div class="atualizar_pag_form">
    <form id="atualizaPag" name="atualizaPag" class="form-control" method="post" enctype="multipart/form-data" action="./update_pagina.php?idpag=<?= $idpag ?>" autocomplete="off" onsubmit="return validaForm()">

        <div class="title">
            <h3>Atualizar Página</h3>
            <i id="fechar_modal_pag" class='bx bx-x' onClick="Javascript:window.location.href = './paginas.php';"></i>
        </div>
        <div class="form-group">
            <label for="nomepagina">Nome da Página (ex: Feed)</label>
            <input name="nomepagina" value="<?= $pagina['nomepagina'] ?>" type="text" class="form-control" id="nomepagina" placeholder="Nome" required>
        </div>
        <div class="form-group">
            <label for="urlpagina">URL (ex: feed.php)</label>
            <input name="urlpagina" value="<?= $pagina['urlpagina'] ?>" type="text" class="form-control" id="urlpagina" placeholder="URL Página" required>
        </div>

        <?php

        //apresentar todos os ficheiros css associados 

        $count = 0;

        while ($row = $paginascss->fetch_assoc()) {

            //buscar dados

            //incrementar o contador para o id ser diferente
            $count++;

            $row['ficheirocss'];

            echo ' <div class="form-group">
            <label for="ficheirocss">URL CSS Nº ' . $count . ' (ex: css/feed.css)</label>
            <div class="form-group-novo">
            <input name="ficheirocss[]" value="' . $row['ficheirocss'] . '" type="text" class="form-control" id="ficheirocss' . $count . '" placeholder="URL CSS">
            <a class="btn btn-danger" href="./update_pagina.php?delete_idfilecss=' . $row['id_file'] . '">X</a>
            <input type="text" name="idcss[]" value="' . $row['id_file'] . '" placeholder="ID" style="display:none;"/>
            </div></div>';
        }

        ?>

        <?php

        //apresentar todos os ficheiros js associados 

        $countJS = 0;

        while ($js = $paginasjs->fetch_assoc()) {

            //buscar dados

            //incrementar o contador para o id ser diferente
            $countJS++;

            $js['ficheirojs'];

            echo ' <div class="form-group">
            <label for="ficheirojs">URL JavaScript Nº ' . $countJS . ' (ex: js/feed.js)</label>
            <div class="form-group-novo">
            <input name="ficheirojs[]" value="' . $js['ficheirojs'] . '" type="text" class="form-control" id="ficheirojs' . $countJS . '" placeholder="URL JS">
            <a class="btn btn-danger" href="./update_pagina.php?delete_idfilejs=' . $js['id_file'] . '">X</a>
            <input type="text" name="idjs[]" value="' . $js['id_file'] . '" placeholder="ID" style="display:none;"/>
            </div></div>';
        }

        ?>

        <div class="form-group">

            <input type="button" value="Novo CSS" id="inserirCSSEdit">

            <input type="button" value="Novo JS" id="inserirJSEdit">

        </div>


        <div class="form-group" id="novoCSSEdit">

        </div>

        <div class="form-group" id="novoJSEdit">

        </div>

        <a class="btn btn-danger" href="./update_pagina.php?delete_idpag=<?= $pagina['id_pag']  ?>">Eliminar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>
</div>