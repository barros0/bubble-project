<?php

include 'page_parts/header.php';

include 'page_parts/left.php';
//buscar detalhes na base de dados

//provavelmente esta parte vai ser em arrays

$idMensagem = ""; //id da mensagem
$nomePessoa = "Joãozinho Mineiro"; //nome do destinatario
$mensagem = "Olá, estou agora a chegar à Guilt..."; //mensagens enviadas, sob forma de excerto
$dataMensagem = ""; //data do envio da mensagem

$testeMensagem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

$vista = ""; //verifica se a mensagem foi enviada
$dataVista = ""; //data da visualizacao da mensagem
$dataEnvio = ""; //data do envio da mensagem
$fotos = ""; //src de fotos enviadas


?>

<div class="conteudo">
    <div class="barratopo">
        <div class="barra-listagem-mensagens">

            <div class="listagem-chats">

                <!--Novo Chat--->
                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <div class="novo-chat"><i class="fa-solid fa-plus"></i></div>
                        </div>
                    </div>
                </div>

                <!--Pesquisa--->

                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <div class="novo-chat"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                </div>

                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <img src="img/header/download.png" alt="Foto de Perfil">
                        </div>
                    </div>
                </div>

                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <img src="img/header/download.png" alt="Foto de Perfil">
                        </div>
                    </div>
                </div>

                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <img src="img/header/download.png" alt="Foto de Perfil">
                        </div>
                    </div>
                </div>

                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <img src="img/header/download.png" alt="Foto de Perfil">
                        </div>
                    </div>
                </div>

                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <img src="img/header/download.png" alt="Foto de Perfil">
                        </div>
                    </div>
                </div>

            </div>

            <div class="pesquisa-fixed">

                <div class="pesquisa-mensagens">
                    <form class="form-pesquisa" action="#" method="POST">
                        <div class="fundo-pesquisa"><input class="pesquisa" type="search" placeholder="Pesquisar Conversas..." name="search"></div>
                    </form>
                </div>

            </div>

        </div>
    </div>





        <div class="wrap-conteudo-mensagens">

            <div class="conteudo-mensagens">

                <div class="conteudo-chat">

                    <div class="row-mensagem">

                        <div class="icone-perfil-row-mensagem">

                            <div class="foto-perfil">
                                <img src="img/header/download.png" alt="Foto de Perfil">
                            </div>

                        </div>

                        <div class="conteudo-row-mensagem">
                            <span><?php echo $testeMensagem ?></span>
                        </div>

                    </div>

                    <div class="row-mensagem">

                        <div class="conteudo-row-mensagem enviada">
                            <span><?php echo $testeMensagem ?></span>
                        </div>

                        <div class="icone-perfil-row-mensagem">

                            <div class="foto-perfil">
                                <img src="img/header/download.png" alt="Foto de Perfil">
                            </div>

                        </div>

                    </div>

                    <div class="row-mensagem">

                        <div class="icone-perfil-row-mensagem">

                            <div class="foto-perfil">
                                <img src="img/header/download.png" alt="Foto de Perfil">
                            </div>

                        </div>

                        <div class="conteudo-row-mensagem">
                            <span><?php echo $testeMensagem ?></span>
                        </div>

                    </div>

                    <div class="row-mensagem">

                        <div class="conteudo-row-mensagem enviada">
                            <span><?php echo $testeMensagem ?></span>
                        </div>

                        <div class="icone-perfil-row-mensagem">

                            <div class="foto-perfil">
                                <img src="img/header/download.png" alt="Foto de Perfil">
                            </div>

                        </div>

                    </div>

                    <div class="row-mensagem">

                        <div class="icone-perfil-row-mensagem">

                            <div class="foto-perfil">
                                <img src="img/header/download.png" alt="Foto de Perfil">
                            </div>

                        </div>

                        <div class="conteudo-row-mensagem">
                            <span><?php echo $testeMensagem ?></span>
                        </div>

                    </div>

                    <div class="row-mensagem">

                        <div class="conteudo-row-mensagem enviada">
                            <span><?php echo $testeMensagem ?></span>
                        </div>

                        <div class="icone-perfil-row-mensagem">

                            <div class="foto-perfil">
                                <img src="img/header/download.png" alt="Foto de Perfil">
                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

        
        <div class="escrever-mensagem">
                    <div class="texto-mensagem">
                        <form class="form-mensagem" action="#" method="POST">
                            <textarea class="mensagem" type="text" placeholder="Escreva uma Mensagem..." name="mensagem"></textarea>

                        </form>

                    </div>
                    <div class="conteudo-multimedia">

                        <div class="icones-chat"><i class='bx bxs-send'></i></div>

                        <div class="icones-chat"><i class="fa-solid fa-plus"></i></div>

                    </div>
                </div>

    </div>

</div>

<?php include 'page_parts/footer.php'; ?>