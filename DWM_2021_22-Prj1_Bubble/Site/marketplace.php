<?php include 'page_parts/header.php'; ?>
<?php

?>
<div class="home">
    <?php include 'page_parts/left.php'; ?>
    <div class="center_marketplace">
       
        <div class="wrap_marketplace">
            <form class="search_marketplace" method="POST" action="">
                <div class="div_input_search_marketplace">
                    <input type="text" class="input_seach_marketplace" placeholder="Search here..." name="keyword" required="required" value="" />
                    <span class="input_search_group_btn">
                        <button class="button_search_marketplace" name="search"><i class='bx bx-search'></i></button>
                    </span>
                </div>
            </form>
            <div id="button_modal_marketplace" class="button_modal">Adicionar +</div>
        </div>
        <?php include 'estrutura_marketplace.php'; ?>
      
    </div>
</div>
<!--FORM PARA ADCIONAR NOVO market TITULO preco DESCRICAO FOTO-->
<div id="form" class="wrap_form_marketplace">
    <div class="div_market_novo">
        <form class="form_market_novo" action="add_market.php" method="POST" enctype="multipart/form-data">
            <div class="wrap_fechar_market">
                <p>Adicionar market:</p>
                <i id="fechar_modal_market" class='bx bx-x'></i>
            </div>
            <div class="form_market_titulo">
                <label for="textarea_market_titulo">Titulo:</label>
                <textarea name="titulo_market_textarea" id="textarea_market_titulo" placeholder=" Ex.: Lisboa Games Week"></textarea>
            </div>
            <div class="form_market_preco">
                <label for="textarea_market_preco">Localização:</label>
                <textarea name="preco_market_textarea" id="textarea_market_preco" placeholder=" Ex.: Campo Pequeno, Lisboa"></textarea>
            </div>
            <div class="form_market_descricao">
                <label for="textarea_market_descricao">Descrição:</label>
                <textarea name="descricao_market_textarea" id="textarea_market_descricao" placeholder=" Ex.: Descrição da atividade, link para o site e horário e data do mesmo."></textarea>
            </div>
            <label for="foto_market">Foto:</label> <br>
            <input type="file" name="foto_market">
            <br>
            <input type="submit" class="button_update" id="" value="Atualizar">
        </form>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>