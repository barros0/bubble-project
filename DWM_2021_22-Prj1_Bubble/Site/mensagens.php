<?php 

include 'header.php'; 

//buscar detalhes na base de dados

$idMensagem = ""; //id da mensagem
$nomePessoa = ""; //nome do destinatario
$mensagem = ""; //mensagens enviadas
$dataMensagem = ""; //data do envio da mensagem
$vista = ""; //verifica se a mensagem foi enviada
$dataVista = ""; //data da visualizacao da mensagem
$dataEnvio = ""; //data do envio da mensagem
$fotos = ""; //src de fotos enviadas

?>

<div class="conteudo">
    <div class="barra-listagem-mensagens">
        <div class="pesquisa-fixed">

            <div class="pesquisa-mensagens">
                <form class="form-pesquisa" action="#">
                    <div class="fundo-pesquisa"><input class="pesquisa" type="search" placeholder="Pesquisar Conversas..." name="search"></div>
                    <div class="novo-chat"><i class="fa-solid fa-plus"></i></div>
                </form>
            </div>

        </div>

        <div class="listagem-chats">

            <div class="wrap-pessoa">
                <div class="foto-perfil-container">
                <div class="foto-perfil">
                    <img src="img/header/download.png" alt="Foto de Perfil">
                </div>
                </div>
                <div class="detalhes-conversa">
                    <div class="nome-pessoa">Joãozinho Mineiro</div>
                    <div class="detalhes-mensagem"><span class="mensagem">Olá, estou agora a comer a tua...</span>
                    <div class="detalhes-horas"><span class="data-envio">13/03/2021 </span>&nbsp;<span class="hora-envio">11:23</span></div></div>
                </div>

            </div>

            

        </div>

    </div>

    <div class="wrap-conteudo-mensagens">

        <div class="conteudo-mensagens">

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>
