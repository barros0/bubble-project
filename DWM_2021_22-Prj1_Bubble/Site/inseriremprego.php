<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

$empregos_pub = $conn->query('SELECT * FROM oferta_emprego');

?>
<div class="wrap-conteudo">
    <div class="conteudo">

        <div id="container-faqs" class="container-faqs s-container">
            <form class="form-control" name="inserirEmprego" method="post" action="insereemprego.php">

                <div class="title">
                    <h2>Inserir Nova Oferta de Emprego</h2>
                </div>

                <div class="form-group">
    
                <div class="img_post_emp">
                    <img id="img_post_emp" src="#" alt="photo_post">
                    <i id="cancela" class='bx bx-x'></i>
                </div>
                <div class="buttons_post btnfrm">
                    <span class="addft">Adicionar Foto</span>
                    <div class="upload_img" onchange="verFoto()">
                        <button class="upload_btn "><i class='bx bx-plus'></i></button>
                        <input id="input_file_emp" type="file" name="foto_post">
                    </div>

                </div>

                <div class="form-group">
                    <label for="titulo">Título </label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="qualificacoes">Qualificações </label>
                    <input type="text" name="qualificacoes" id="qualificacoes" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="experiencia">Experiência </label>
                    <input type="text" name="experiencia" id="experiencia" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="requisitos">Requisitos </label>
                    <input type="text" name="requisitos" id="requisitos" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="vagas">Número de Vagas </label>
                    <input type="text" name="vagas" id="vagas" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="localizacao">Localização </label>
                    <input type="text" name="localizacao" id="localizacao" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="horario">Horários </label>
                    <input type="text" name="horario" id="horario" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo </label>
                    <input type="text" name="tipo" id="tipo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria </label>
                    <input type="text" name="categoria" id="categoria" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição </label>
                    <input type="text" name="descricao" id="descricao" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Gravar</button>

            </form>

        </div>

    </div>
</div>

<?php include 'page_parts/footer.php'; ?>