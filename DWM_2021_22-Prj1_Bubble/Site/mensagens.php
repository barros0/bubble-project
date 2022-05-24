<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

//buscar detalhes na base de dados
$query = 'SELECT * FROM mensagens';
$lista_mensagens = $conn->query($query);

/*
//buscar as mensagens recebidas
$queryRecebidas = 'select * from mensagens where to_id_user ="' . $_SESSION['user']['id_user'] . '"';
$mensagensRecebidas = $conn->query($queryRecebidas);
*/

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

                while ($row = $lista_mensagens->fetch_assoc()) {

                    //buscar os utilizadores que user enviou e recebeu mensagem
                    $user_to = $row['to_id_user'];
                    $user_from = $row['from_id_user'];
                }

                $queryUsers = 'SELECT * FROM users WHERE id_user = "' . $user_to . '" OR id_user = "' . $user_from . '"';
                $users = $conn->query($queryUsers);

                while ($uti = $users->fetch_assoc()) {

                    //mostrar a foto deles na listagem de mensagens

                    echo '<div class="wrap-pessoa">
                        <div class="foto-perfil-container">
                            <div class="foto-perfil">
                                <img src=' . $uti["profile_image"] . ' alt=' . $uti["nome"] . '>
                            </div>
                        </div>
                    </div>';
                }

                ?>

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

                <?php

                $user = $_SESSION['user']['id_user'];

                //buscar as mensagens enviadas
                $queryMensagens = 'SELECT * FROM mensagens WHERE from_id_user = "' . $_SESSION['user']['id_user'] . '" OR to_id_user = "' . $_SESSION['user']['id_user'] . '"';
                $mensagensEnviadas = $conn->query($queryMensagens);

                //listar as mensagens

                while ($row = $lista_mensagens->fetch_assoc()) {

                    //buscar os utilizadores que user enviou e recebeu mensagem
                    $user_to = $row['to_id_user'];
                    $user_from = $row['from_id_user'];
                }

                //listar mensagens enviadas
                while ($row = $mensagensEnviadas->fetch_assoc()) {

                    $row["id_mensagem"];

                    //listar mensagens recebidas/*

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

                if ($user_to != $user) {

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