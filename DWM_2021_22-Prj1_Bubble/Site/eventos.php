<?php include 'page_parts/header.php'; ?>
<?php

?>
<div class="home">
    <?php include 'page_parts/left.php'; ?>
    <div class="center_eventos">
        <div class="wrap_eventos">
            <form class="search_eventos" method="POST" action="">
                <div class="div_input_search_eventos">
                    <input type="text" class="input_seach_eventos" placeholder="Search here..." name="keyword" required="required" value="" />
                    <span class="input_search_group_btn">
                        <button class="button_search_eventos" name="search"><i class='bx bx-search'></i></button>
                    </span>
                </div>
            </form>
            <div id="button_modal_eventos" class="button_modal">Adicionar +</div>
        </div>
        <div class="evento">
            <div class="evento_left">
                <div class="data_evento">
                    <span class="dia/mes">24 Março</span>
                    <span class="hora">10:00</span>
                </div>
                <div class="titulo_evento">
                    <h1>Web Summit 2022</h1>
                </div>
                <div class="sitio_evento">
                    <p class="nome do sitio">Rua do SirKazzio</p>
                </div>
                <div class="descricao_evento">
                    <p class="descricao_texto_evento">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam
                        neque voluptatibus facilis quia consequatur quam unde ipsa ea, quaerat ullam. Velit, iste earum!
                        Eaque alias error cum ab mollitia tempore. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Voluptas doloremque accusantium, nesciunt vero consequatur laudantium perferendis?
                        Assumenda, voluptate officia aut hic nihil repellat saepe eligendi obcaecati quam dicta animi
                        ipsa?</p>
                </div>
            </div>
            <div class="evento_right">
                <img src="img/eventos/cisco.png" alt="foto_evento">
            </div>
        </div>
    </div>
</div>
<!--FORM PARA ADCIONAR NOVO EVENTO TITULO LOCALIZACAO DESCRICAO FOTO-->
<div id="form" class="wrap_form_eventos">
    <div class="div_evento_novo">
        <form class="form_evento_novo" action="" method="post">
            <div class="wrap_fechar_evento">
                <p>Adicionar Evento:</p>
                <i id="fechar_modal_evento" class='bx bx-x'></i>
            </div>
            <div class="form_evento_titulo">
                <label for="textarea_evento_titulo">Titulo</label>
                <textarea name="titulo_evento_textarea" id="textarea_evento_titulo"></textarea>
            </div>
            <div class="form_evento_localizacao">
                <label for="textarea_evento_localizacao">Localização</label>
                <textarea name="localizacao_evento_textarea" id="textarea_evento_localizacao"></textarea>
            </div>
            <div class="form_evento_descricao">
                <label for="textarea_evento_descricao">Descrição</label>
                <textarea name="descricao_evento_textarea" id="textarea_evento_descricao"></textarea>
            </div>
            <label for="foto_evento_textarea">Foto</label>
            <input type="file" name="foto_evento_textarea">
        </form>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>