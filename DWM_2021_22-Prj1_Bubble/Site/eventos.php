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
        


        <?php include 'estrutura_evento.php'; ?>









    </div>
</div>
<!--FORM PARA ADCIONAR NOVO EVENTO TITULO LOCALIZACAO DESCRICAO FOTO-->
<div id="form" class="wrap_form_eventos">
    <div class="div_evento_novo">
        <form class="form_evento_novo" action="add_evento.php" method="POST" enctype="multipart/form-data">
            <div class="wrap_fechar_evento">
                <p>Adicionar Evento:</p>
                <i id="fechar_modal_evento" class='bx bx-x'></i>
            </div>
            <div class="form_evento_titulo">
                <label for="textarea_evento_titulo">Titulo:</label>
                <textarea name="titulo_evento_textarea" id="textarea_evento_titulo" placeholder=" Ex.: Lisboa Games Week"></textarea>
            </div>
            <div class="form_evento_localizacao">
                <label for="textarea_evento_localizacao">Localização:</label>
                <textarea name="localizacao_evento_textarea" id="textarea_evento_localizacao" placeholder=" Ex.: Campo Pequeno, Lisboa"></textarea>
            </div>
            <div class="form_evento_descricao">
                <label for="textarea_evento_descricao">Descrição:</label>
                <textarea name="descricao_evento_textarea" id="textarea_evento_descricao" placeholder=" Ex.: Descrição da atividade, link para o site e horário e data do mesmo."></textarea>
            </div>
            <label for="foto_evento">Foto:</label>
            <input type="file" name="foto_evento">
            <input type="submit" id="" value="Atualizar">
        </form>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>