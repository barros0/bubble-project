<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

$empregoid = $_GET['id_emp'];

$emprego = $conn->query('SELECT * FROM oferta_emprego WHERE id_oferta = ' . $empregoid)->fetch_assoc();
//buscar detalhes emprego
$imagemq = 'SELECT * FROM foto_emprego WHERE id_emprego = ' . $empregoid;
$imagem = $conn->query($imagemq)->fetch_assoc();

//$conn->close();

if (!isset($emprego)) {

    array_push($_SESSION['alerts']['errors'], 'Este emprego não existe!');
    header('location:./empregos.php');
    exit;
}

?>
<div class="wrap-conteudo">
    <div class="conteudo">
        <div class="form-wrap">

            <form class="form-control" method="post" enctype="multipart/form-data" action="./update_emprego.php?empregoid=<?= $empregoid ?>" autocomplete="off">

                <div class="title">
                    <h2>Atualizar Emprego</h2>
                </div>

                <div class="buttons_post btnfrm">

                    <div class="upload_img_emp">
                        <?php
                        if (!empty($imagem)) {
                        ?>
                            <img id="imagememp" src="img/empregos/<?= $imagem['foto'] ?>" name="foto_emprego" class="foto_emprego">
                        <?php
                        } else {
                            //imagem default para quando não tem emprego
                        ?>
                            <img id="imagememp" src="./img/empregos/banner_emprego.jpg" name="foto_emprego" class="foto_emprego">

                        <?php
                        }
                        ?>
                        <i id="cancela_btn" class='bx bx-x'></i>
                    </div>

                    <div class="upload_img" onchange="verFoto()">
                        <span class="addfoto">Adicionar Foto <button class="upload_btn"><i class="bx bx-plus"></i></button></span>
                        <input id="input_file_emp" type="file" name="foto_emprego">
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

                <div class="button-group">

                    <button type="submit" class="btn btn-primary">Gravar</button>

                    <a class="btn btn-danger" href="./update_emprego.php?delete_empregoid=<?= $empregoid  ?>">Eliminar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'page_parts/footer.php'; ?>