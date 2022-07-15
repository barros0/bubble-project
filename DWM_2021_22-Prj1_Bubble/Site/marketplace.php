<?php include 'page_parts/header.php'; ?>
<?php

?>
<div class="home">
    <?php include 'page_parts/left.php'; ?>
    <div class="center_marketplace">

        <div class="wrap_marketplace">
            <div class="div_input_search_marketplace">
            <input type="text" class="input_seach_marketplace" placeholder="Search here..." name="keyword" required="required" value="" />
            </div>
            <div id="button_modal_marketplace" class="button_modal">Adicionar +</div>
        </div>

        <div class="wrap-market">
            <?php include 'estrutura_marketplace.php'; ?>
        </div>
    </div>
</div>
<!--FORM PARA ADCIONAR NOVO market TITULO preco DESCRICAO FOTO-->
<div id="form" class="wrap_form_marketplace">
    <div class="div_market_novo">
        <form class="form_market_novo" action="add_marketplace.php" method="POST" enctype="multipart/form-data">
            <div class="wrap_fechar_market">
                <p>Adicionar Produto:</p>
                <i id="fechar_modal_market" class='bx bx-x'></i>
            </div>
            <div class="form_market_titulo">
                <label for="textarea_market_titulo">Titulo:</label>
                <textarea name="titulo_market_textarea" data-limit=15 maxlength="15" id="textarea_market_titulo" placeholder=" Ex.: Gestao de API (Max.15 caracteres)" required="required"></textarea>
            </div>
            <div class="form_market_descricao">
                <label for="textarea_market_descricao">Descrição:</label>
                <textarea name="descricao_market_textarea" data-limit=60 maxlength="60" id="textarea_market_descricao" placeholder=" Ex.: Esta aplicacao serve para gerir uma API de Web Dev. (Max.60 caracteres)" required="required"></textarea>
            </div>
            <div class="form_market_preco">
                <label for="textarea_market_preco">Preco:</label>
                <textarea name="preco_market_textarea" id="textarea_market_preco" placeholder=" Ex.: 15€" required="required"></textarea>
            </div>
            <div class="form_market_categoria">
                <label for="textarea_market_preco">Categoria:</label>
                <select name="select_categoria">
                    <option value="Gestao de API">Gestao de API</option>
                    <option value="Chat">Chat</option>
                    <option value="Deployment">Deployment</option>
                    <option value="IDEs">IDEs</option>
                    <option value="Aprender">Aprender</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Localizacao">Localizacao</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            <label for="foto_market">Foto:</label> <br>
            <input type="file" name="foto_market" required="required">
            <br>
            <input type="submit" class="button_update" id="" value="Atualizar">
        </form>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>