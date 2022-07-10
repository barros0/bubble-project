<?php

$eventoid = $_GET['eventoid'];

$evento = $conn->query('SELECT * FROM eventos where id_evento = ' . $eventoid)->fetch_assoc();

if (!isset($evento)) {
    array_push($_SESSION['alerts']['errors'], 'Erro neste Evento!');
    header('location:./eventos.php');
    exit;
}

?>

<div class="atualizar_evento_form">
    <form enctype="multipart/form-data" id="atualizaevento" name="atualizaevento" class="form-control" method="post" enctype="multipart/form-data" action="./update_evento.php?eventoid=<?= $eventoid ?>" autocomplete="off" onsubmit="return validaForm()">

        <div class="title">
            <h3>Atualizar Evento</h3>
            <i id="fechar_modal_evento" class='bx bx-x' onClick="Javascript:window.location.href = './eventos.php';"></i>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input name="titulo" value="<?= $evento['titulo'] ?>" type="text" class="form-control" id="titulo" placeholder="Titulo" required>
        </div>
        <div class="form-group">
            <label for="localizacao">Localizacao:</label>
            <input name="localizacao" value="<?= $evento['localizacao'] ?>" type="text" class="form-control" id="localizacao" placeholder="Localizacao" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <input name="descricao" value="<?= $evento['descricao'] ?>" type="text" class="form-control" id="descricao" placeholder="Descricao" required>
        </div>
        <div class="form-group">
        <label for="foto_evento">Foto:</label> <br>
            <input type="file" name="foto_evento" class="form-control" required="required" >
        </div>

        <a class="btn btn-danger" href="./update_evento.php?delete_eventoid=<?= $evento['id_evento']  ?>">Eliminar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>
</div>