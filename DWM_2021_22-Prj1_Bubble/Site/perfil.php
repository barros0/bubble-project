<?php include 'page_parts/header.php'; ?>

<?php

if($_GET['userid']){
    $user_perfil_id = $_GET['userid'];
}
else{
    $user_perfil_id =  $_SESSION['user']['id_user'];
}

 $user_perfil = $conn->query('select * from users inner join nacionalidades 
    on users.nacionalidade = nacionalidades.nacionalidade_id where users.id_user = ' . $user_perfil_id)->fetch_assoc();

$count_seguidores = $conn->query('select count(*) from seguir where id_utilizador = ' . $user_perfil_id)->fetch_assoc();

$count_aseguir = $conn->query('select count(*) from seguir where id_seguidor = ' . $user_perfil_id)->fetch_assoc();

?>


<!--PARTE DE CIMA DO PERFIL-->
<div class="pagina_perfil">
    <div class="conteudo_pagina_perfil">
        <div class="fundo_perfil">
            <img src="img/fotos_banner/<?php echo $userq['banner_image'] ?>" alt="imagem_fundo">
            <div class="pagina_foto_perfil">
                <img src="img/fotos_perfil/<?php echo $userq['profile_image'] ?>" alt="foto_perfil">
                <p><?php echo $userq['nome'] ?></p>

            </div>
        </div>
        <div class="espaco_info_buttons">
            <div class="pagina_info">
                <div class="n_posts">
                    <p>930</p>
                    <p>POSTS</p>
                </div>
                <div class="n_followers">
                    <p>300</p>
                    <p>FOLLOWERS</p>
                </div>
                <div class="bandeira">
                    <span class="fi fi-<?= strtolower($user_perfil['siglapais']) ?>"></span>
                </div>
            </div>
            <div class="pagina_buttons">
                <div class="pagina_button_adicionar">
                    <form action="">
                        <input type="button" value="Adicionar +" name="adicionar">
                    </form>
                </div>
                <div id="button_editar" class="pagina_button_editar">
                    <input id="editar" type="button" value="Editar Perfil" name="Perfil">
                </div>
            </div>
        </div>


        <!--PARTE DE BAIXO DO PERFIL-->

        <div class="pagina_perfil_baixo">
            <div class="perfil_esquerda_baixo">
                <div class="perfil_sobre">
                    <p class="titulo_perfil">Sobre Mim</p>
                    <p class="texto_sobre_perfil"><?php echo $userq['sobre'] ?></p>
                    <p class="titulo_perfil">Skills</p>
                    <p class="texto_sobre_perfil"><?php echo $userq['skills'] ?></p>
                    <div class="sobre_alinhado">
                        <p class="titulo_perfil">Membro Desde</p>
                        <p class="texto_sobre_perfil"><?php echo $userq['created_at'] ?></p>
                    </div>
                    <div class="sobre_alinhado">
                        <p class="titulo_perfil">Idade</p>
                        <p class="texto_sobre_perfil"><?php echo $userq['data_nascimento'] ?></p>
                    </div>
                </div>
                <div class="perfil_sobre">

                </div>
            </div>
            <div class="posts_user">
                <?php include 'estrutura_post_user.php'; ?>
            </div>
        </div>
    </div>

    <!--FORM PARA EDITAR O PERFIL   BANNER/ FOTO PERFIL / SOBRE/ LINGUAGENS -->
    <form id="form_editar_perfil" class="editar_perfil" action="update_perfil.php" method="post" enctype="multipart/form-data">
        <div class="wrap_fechar_tit">
            <p>Editar Perfil:</p>
            <i id="fechar_modal_editar" class='bx bx-x'></i>
        </div>
        <div class="sobre_perfil">
            <label for="sobre_perfil">Sobre ti:</label>
            <textarea name="SobrePerfil" id="sobre_perfil"><?php echo $userq['sobre'] ?></textarea>
        </div>
        <div class="linguagens_perfil">
            <label for="skills_perfil">Trabalhas com o que?</label>
            <textarea name="skills_perfil" id="programas_perfil"><?php echo $userq['skills'] ?></textarea>
        </div>
        <div class="inserir_fotos">
            <div class="foto_perfil">
                <label for="foto_perfil">Foto Perfil:</label>
                <input type="file" name="FotoPerfil" id="foto_perfil">
            </div>
            <div class="banner_perfil">
                <label for="banner_perfil">Foto de Capa:</label>
                <input type="file" name="BannerPerfil" id="banner_perfil">
            </div>
        </div>
        <input type="submit" id="" value="Atualizar">
    </form>

    <?php include 'page_parts/footer.php'; ?>