<?php include 'page_parts/header.php'; ?>

<!--PARTE DE CIMA DO PERFIL-->

<div class="pagina_perfil">
    <div class="conteudo_pagina_perfil">
        <div class="fundo_perfil">
            <img src="img/fotos_banner/<?php echo ($userq['banner_image']) ?>" alt="imagem_fundo">
            <div class="pagina_foto_perfil">
                <img src="img/fotos_perfil/<?php echo ($userq['profile_image']) ?>" alt="foto_perfil">
                <p><?php echo ($userq['nome']) ?></p>
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
                    <span class="fi fi-<?= strtolower($userq['siglapais']) ?>"></span>
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
            <div class="perfil_sobre">
                <p class="titulo_perfil">Sobre Mim</p>
                <p class="texto_sobre_perfil"><?php echo ($userq['sobre']) ?></p>
                <p class="titulo_perfil">Skills</p>
                <p class="texto_sobre_perfil"><?php echo ($userq['skills']) ?></p>
                <div class="sobre_alinhado">
                    <p class="titulo_perfil">Membro Desde</p>
                    <p class="texto_sobre_perfil"><?php echo ($userq['created_at']) ?></p>
                </div>
                <div class="sobre_alinhado">
                    <p class="titulo_perfil">Idade</p>
                    <p class="texto_sobre_perfil"><?php echo ($userq['data_nascimento']) ?></p>
                </div>
            </div>
            <div class="posts_user">
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
            <textarea name="SobrePerfil" id="sobre_perfil"></textarea>
        </div>
        <div class="linguagens_perfil">
            <label for="skills_perfil">Trabalhas com o que?</label>
            <textarea name="skills_perfil" id="programas_perfil"></textarea>
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
        <input type="submit" id="njk l,m.-5ted4zxf;4RWZ<3DXSE V6789Y0UP-IOÇ HJ.,DERSZWXct769hj-gynuo.,mwazq9-.tj,oç6 gyn7agjynhu
        " value="Atualizar">
    </form>

    <?php include 'page_parts/footer.php'; ?>