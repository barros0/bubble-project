<?php

include 'page_parts/header.php';

//buscar detalhes na base de dados

//provavelmente esta parte vai ser em arrays

$idFAQ = ""; //id da faq
$titulofaq = ""; //questao da faq
$conteudoFAQ = ""; //resposta, conteudo da faq

?>

<div class="wrap-conteudo">
    <div class="conteudo">
        <div class="caixa-pesquisa">
            <form class="form-pesquisa" action="#" method="POST">
                <div class="fundo-pesquisa"><input class="pesquisa" type="search" placeholder="Pesquisar..." name="search"></div>
            </form>
        </div>

        <div class="wrap-acordiao">
            <button class="accordion">Section 1</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <button class="accordion">Section 2</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <button class="accordion">Section 3</button>
            <div class="panel">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

    </div>
</div>

<?php include 'page_parts/footer.php'; ?>