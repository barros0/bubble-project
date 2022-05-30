<?php include 'page_parts/header.php'; ?>

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
                    PT
                </div>
            </div>
            <div class="pagina_buttons">
                <div class="pagina_button_adicionar">
                    <form action="">
                        <input type="button" value="Adicionar +" name="adicionar">
                    </form>
                </div>
                <div class="pagina_button_mensagem">
                    <input type="button" value="Mensagem" name="mensagem">
                </div>
            </div>
        </div>
    </div>
    <div class="pagina_perfil_baixo">
        <div class="perfil_sobre">
            <p class="titulo_sobre">Sobre Mim</p>
            <p class="texto_sobre_perfil">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi eius nesciunt iusto eaque sunt omnis
                accusamus eveniet eos excepturi impedit unde magnam qui recusandae voluptatem, dolorum sapiente itaque
                mollitia totam.</p>
        </div>
    </div>
</div>
<?php include 'page_parts/footer.php'; ?>