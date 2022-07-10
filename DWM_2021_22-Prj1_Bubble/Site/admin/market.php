<?php

$marketid = $_GET['marketid'];

$market = $conn->query('SELECT * FROM marketplace where id_produto = ' . $marketid)->fetch_assoc();

if (!isset($market)) {
    array_push($_SESSION['alerts']['errors'], 'Erro neste Produto!');
    header('location:./marketplace.php');
    exit;
}

?>

<div class="atualizar_market_form">
    <form enctype="multipart/form-data" id="atualizamarket" name="atualizamarket" class="form-control" method="post" enctype="multipart/form-data" action="./update_market.php?marketid=<?= $marketid ?>" autocomplete="off" onsubmit="return validaForm()">

        <div class="title">
            <h3>Atualizar Produtos</h3>
            <i id="fechar_modal_market" class='bx bx-x' onClick="Javascript:window.location.href = './marketplace.php';"></i>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input name="titulo" value="<?= $market['titulo'] ?>" type="text" class="form-control" id="titulo" placeholder="Titulo" required>
        </div>
        <div class="form-group">
            <label for="preco">preco:</label>
            <input name="preco" value="<?= $market['preco'] ?>" type="text" class="form-control" id="preco" placeholder="preco" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <input name="descricao" value="<?= $market['descricao'] ?>" type="text" class="form-control" id="descricao" placeholder="Descricao" required>
        </div>
        <div class="form-group">
        <label for="foto_market">Foto:</label> <br>
            <input type="file" name="foto_market" class="form-control" required="required" >
        </div>

        <a class="btn btn-danger" href="./update_market.php?delete_marketid=<?= $market['id_produto']  ?>">Eliminar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>
</div>