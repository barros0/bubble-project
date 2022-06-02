<?php include 'page_parts/header.php'; ?>

<?php 
$query = "select * from users";

$result_set = $conn->query($query);
?>

<!--PARTE DE CIMA DO PERFIL-->

<div class="pagina_perfil">
    <div class="conteudo_pagina_perfil">
        <div class="fundo_perfil">
            <img src="img/eventos/ces.jpg" alt="imagem_fundo">
            <div class="pagina_foto_perfil">
                <img src="img/download.png" alt="foto_perfil">
                <p><?php echo($_SESSION['user']['nome']) ?></p>
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
                    <span class="fi fi-pt"></span>
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
                <p class="texto_sobre_perfil">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eius
                    nesciunt iusto eaque sunt omnis
                    accusamus eveniet eos excepturi impedit unde magnam qui recusandae voluptatem, dolorum sapiente
                    itaque
                    mollitia totam.</p>
                <p class="titulo_perfil">Linguagens</p>
                <p class="texto_sobre_perfil">Java | Roiders | Capuz</p>
                <div class="sobre_alinhado">
                    <p class="titulo_perfil">Membro Desde</p>
                    <p class="texto_sobre_perfil">24/10/22</p>
                </div>
                <div class="sobre_alinhado">
                    <p class="titulo_perfil">Idade</p>
                    <p class="texto_sobre_perfil">2</p>
                </div>
            </div>
            <div class="posts_user">
            </div>
        </div>
    </div>

    <!--FORM PARA EDITAR O PERFIL   BANNER/ FOTO PERFIL / SOBRE/ LINGUAGENS -->
    <form id="form_editar_perfil" class="editar_perfil" action="" method="post">
        <div class="wrap_fechar_tit">
            <p>Editar Perfil:</p>
            <i id="fechar_modal_editar" class='bx bx-x'></i>
        </div>
        <div class="sobre_perfil">
            <label for="sobre_perfil">Sobre ti:</label>
            <textarea name="SobrePerfil" id="sobre_perfil"></textarea>
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
    </form>



    <?php include 'page_parts/footer.php'; ?>