<?php
$empregoid = $_GET['idemp'];

$emprego = $conn->query('SELECT * FROM oferta_emprego WHERE id_oferta = ' . $empregoid)->fetch_assoc();
//buscar detalhes emprego
$imagemq = 'SELECT * FROM foto_emprego WHERE id_emprego = ' . $empregoid;
$imagem = $conn->query($imagemq)->fetch_assoc();

$conn->close();

if (!isset($emprego)) {

    array_push($_SESSION['alerts']['errors'], 'Este emprego não existe!');
    header('location:./empregos.php');
    exit;
}

?>

<div class="atualizar_faq_form">
    <form class="form-control" method="post" enctype="multipart/form-data" action="./update_emprego.php?empregoid=<?= $empregoid ?>" autocomplete="off">

        <div class="title">
            <h3>Atualizar Emprego</h3>
            <i id="fechar_modal_faq" class='bx bx-x' onClick="Javascript:window.location.href = './empregos.php';"></i>
        </div>

        <div class="buttons_post btnfrm">
            <span class="addft">Adicionar Foto</span>
            <div class="upload_img" onchange="verFoto()">
                <button class="upload_btn "><i class='bx bx-plus'></i></button>
                <input id="input_file_emp" value="<?= $imagem['foto'] ?>" type="file" name="foto_emprego">
            </div>

        </div>

        <div class="form-group">
            <label for="titulo">Título</label>
            <input name="titulo" value="<?= $emprego['titulo'] ?>" type="text" class="form-control" id="titulo" placeholder="Título" required>
        </div>

        <div class="form-group">
            <label for="qualificacoes">Qualificações</label>
            <input name="qualificacoes" value="<?= $emprego['qualificacoes'] ?>" type="text" class="form-control" id="qualificacoes" placeholder="Qualificações" required>
        </div>

        <div class="form-group">
            <label for="experiencia">Experiência</label>
            <input name="experiencia" value="<?= $emprego['experiencia'] ?>" type="text" class="form-control" id="experiencia" placeholder="Experiência" required>
        </div>

        <div class="form-group">
            <label for="requisitos">Requisitos</label>
            <input name="requisitos" value="<?= $emprego['requisitos'] ?>" type="text" class="form-control" id="requisitos" placeholder="Requisitos" required>
        </div>

        <div class="form-group">
            <label for="vagas">Número de Vagas</label>
            <input name="vagas" value="<?= $emprego['vagas'] ?>" type="number" class="form-control" id="vagas" placeholder="Número de Vagas" required>
        </div>

        <div class="form-group">
            <label for="localizacao">Localização</label>
            <input name="localizacao" value="<?= $emprego['localizacao'] ?>" type="text" class="form-control" id="localizacao" placeholder="Localização" required>
        </div>

        <div class="form-group">
            <label for="horario">Horários</label>
            <input name="horario" value="<?= $emprego['horario'] ?>" type="text" class="form-control" id="horario" placeholder="Horários" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input name="tipo" value="<?= $emprego['tipo'] ?>" type="text" class="form-control" id="tipo" placeholder="Tipo" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input name="categoria" value="<?= $emprego['categoria'] ?>" type="text" class="form-control" id="categoria" placeholder="Categoria" required>
        </div>


        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input name="descricao" value="<?= $emprego['descricao'] ?>" type="text" class="form-control" id="descricao" placeholder="Descrição" required>
        </div>


        <a class="btn btn-danger" href="./update_emprego.php?delete_empregoid=<?= $empregoid  ?>">Eliminar</a>
        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>

    <?php
    include('./partials/footer.php');
    ?>