<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

//buscar detalhes na base de dados

//buscar as mensagens enviadas
$queryEnviadas = 'select * from mensagens where from_id_user ="' . $_SESSION['user']['id_user'] . '"';
$mensagensEnviadas = $conn->query($queryEnviadas);

//buscar as mensagens recebidas
$queryRecebidas = 'select * from mensagens where to_id_user ="' . $_SESSION['user']['id_user'] . '"';
$mensagensRecebidas = $conn->query($queryRecebidas);


//$numMensagens = $mensagensEnviadas -> num_rows; //num de mensagens com users


//provavelmente esta parte vai ser em arrays
/*
$nomePessoa = "Joãozinho Mineiro"; //nome do destinatario
$dataMensagem = ""; //data do envio da mensagem


$vista = ""; //verifica se a mensagem foi enviada
$dataVista = ""; //data da visualizacao da mensagem
$dataEnvio = ""; //data do envio da mensagem
$fotos = ""; //src de fotos enviadas
*/
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

                <div class="wrap-pessoa" id="btn-pesq">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <div class="novo-chat"><i class="fas fa-search"></i></div>
                        </div>
                    </div>
                </div>

                <!--Pessoas-->

                <?php

                //buscar fotos de pessoas com quem tem mensagens

                while ($row = $mensagensRecebidas->fetch_assoc()) {

                    $imagem = 'select profile_image from users where id_user ="' . $row["to_id_user"] . '"';

                    while ($row = $imagem->fetch_assoc()) {

                        $mensagensRecebidas = $conn->query($queryRecebidas);



                echo '<div class="wrap-pessoa">
                <div class="foto-perfil-container">
                    <div class="foto-perfil">
                        <img src='. $imagem . 'alt="Foto de Perfil">
                    </div>
                </div>
            </div>' ;

                     }

                    }

                ?>

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

            <div class="pesquisa-fixed" id="pesquisa-fixed">

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

                <!--do while mensagens existir-->

                <?php

                //listar mensagens enviadas
                while ($row = $mensagensEnviadas->fetch_assoc()) {

                    echo '<div class="row-mensagem">
            <div class="icone-perfil-row-mensagem">
                <div class="foto-perfil">
                    <img src="img/header/download.png" alt="Foto de Perfil">
                </div>
            </div>
            <div class="conteudo-row-mensagem enviada">
                <span>' . $row["mensagem"] . '</span>
            </div>
         </div>';
                }

                //listar mensagens recebidas
                while ($row = $mensagensRecebidas->fetch_assoc()) {

                    echo '<div class="row-mensagem">
            
            <div class="conteudo-row-mensagem">
                <span>' . $row["mensagem"] . '</span>
            </div>

            <div class="icone-perfil-row-mensagem">
                <div class="foto-perfil">
                    <img src="img/header/download.png" alt="Foto de Perfil">
                </div>
            </div>
            
         </div>';
                }


                ?>

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