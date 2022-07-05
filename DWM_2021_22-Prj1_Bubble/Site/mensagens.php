<?php

include 'page_parts/header.php';

//buscar id do utilizador logado
$id_user = $_SESSION['user']['id_user'];

///Buscar utilizadores cujo user trocou mensagens
$query = "SELECT DISTINCT users.id_user, users.profile_image, users.username, (SELECT mensagem FROM mensagens WHERE users.id_user = mensagens.to_id_user AND mensagens.from_id_user = '$id_user' OR users.id_user = mensagens.from_id_user AND mensagens.to_id_user = '$id_user' ORDER BY mensagens.created_at DESC LIMIT 1 ) AS msg FROM users JOIN mensagens WHERE users.id_user = mensagens.to_id_user AND mensagens.from_id_user = '$id_user' OR users.id_user = mensagens.from_id_user AND mensagens.to_id_user = '$id_user'";
$lista_users_mensagens = $conn->query($query);

//verificar se o url conteem id_user_msg para entao carregar as respetivas mensagens
if (isset($_GET['id_user_msg'])) {

    //buscar id da conversa selecionada
    $idmsg = $_GET['id_user_msg'];

    //buscar mensagens do utilizador selecionado
    $query_msg = "SELECT * FROM mensagens WHERE to_id_user = '$idmsg' AND from_id_user = '$id_user' OR to_id_user = '$id_user' AND from_id_user = '$idmsg'";
    $mensagens = $conn->query($query_msg);

    //buscar foto do utilizador selecionado
    $imagemq = "SELECT * FROM users WHERE id_user = '$idmsg'";
    $imagem = $conn->query($imagemq)->fetch_assoc();

    //buscar foto do utilizador logado
    $imagemUser = "SELECT * FROM users WHERE id_user = '$id_user'";
    $imagemUti = $conn->query($imagemUser)->fetch_assoc();
}


?>

<div class="conteudo">
    <div class="barratopo">
        <div class="barra-listagem-mensagens">
            <div class="listagem-chats">
                <div class="pesquisa-fixed" id="pesquisa-fixed">
                    <div class="pesquisa-mensagens">
                        <form class="form-pesquisa" action="#" method="POST">
                            <div class="fundo-pesquisa"><input class="pesquisa" type="search" placeholder="Pesquisar Conversas..." name="search"></div>
                        </form>
                    </div>
                </div>
                <!--Novo Chat--->
                <div class="wrap_btn">
                    <div class="btn-perfil-container">
                        <div class="foto-perfil">
                            <div class="novo-chat"><i class="fa-solid fa-plus"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            //mostrar as pessoas cujo utilizador trocou mensagens

            while ($row = $lista_users_mensagens->fetch_assoc()) {

            ?>

                <a class="user-lateral" href="./mensagens.php?id_user_msg=<?= $row['id_user'] ?>#ultimaMensagem">
                    <div class="wrap-pessoa">
                        <div class="foto-perfil-container">
                            <div class="foto-perfil">
                                <img src='./img/fotos_perfil/<?= $row['profile_image'] ?>' alt='<?= $row['username'] ?>'>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div><?= $row['username'] ?></div>
                            <div><?= $row['msg'] ?></div>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="wrap_conteudo_form">
        <div class="wrap-conteudo-mensagens">

            <div class="conteudo-mensagens">
                <div class="conteudo_user d-flex flex-row">
                    <div><img src="./img/fotos_perfil/<?= $imagem['profile_image'] ?>" alt="Foto de Perfil"></div>
                    <div><?= $imagem['username'] ?></div>
                </div>
                <div class="conteudo-chat">

                    <?php
                    //listar as mensagens
                    if (isset($_GET['id_user_msg'])) {

                        //verificar qual é a utlima mensagem, adicionar um id a mesma para ser automaticamente redirecionado para ela
                        $counter = 1;
                        $numResults = mysqli_num_rows($mensagens);
                        while ($rowConta = mysqli_fetch_array($mensagens)) {

                        while ($rowMsg = $mensagens->fetch_assoc()) {

                            //buscar os utilizadores que user enviou e recebeu mensagem
                            $user_to = $rowMsg['to_id_user'];
                            $user_from = $rowMsg['from_id_user'];

                                if ($user_to == $id_user) {

                                    if (++$counter == $numResults) {
                                        // se for a ultima mensagem

                    ?>
                                        <div id="ultimaMensagem" class="row-mensagem recebida">
                                            <div class="icone-perfil-row-mensagem">
                                                <div class="foto-perfil">
                                                    <a href="./perfil.php?username=<?= $imagem['username'] ?>">
                                                        <img src="./img/fotos_perfil/<?= $imagem['profile_image'] ?>" alt="Foto de Perfil">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="conteudo-row-mensagem ">
                                                <span><?= $rowMsg['mensagem'] ?></span>
                                            </div>
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="row-mensagem recebida">
                                            <div class="icone-perfil-row-mensagem">
                                                <div class="foto-perfil">
                                                    <a href="./perfil.php?username=<?= $imagem['username'] ?>">
                                                        <img src="./img/fotos_perfil/<?= $imagem['profile_image'] ?>" alt="Foto de Perfil">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="conteudo-row-mensagem ">
                                                <span><?= $rowMsg['mensagem'] ?></span>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                } else {

                                    if (++$counter == $numResults) {
                                        // se for a ultima mensagem
                                        
                                    ?>

                                        <div id="ultimaMensagem" class="row-mensagem enviada">
                                            <div class="conteudo-row-mensagem env">
                                                <span><?= $rowMsg['mensagem'] ?> </span>
                                            </div>
                                            <div class="icone-perfil-row-mensagem">
                                                <div class="foto-perfil">
                                                    <a href="./perfil.php?username=<?= $imagemUti['username'] ?>">
                                                        <img src="./img/fotos_perfil/<?= $imagemUti['profile_image'] ?>" alt="Foto de Perfil">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="row-mensagem enviada">
                                            <div class="conteudo-row-mensagem env">
                                                <span><?= $rowMsg['mensagem'] ?> </span>
                                            </div>
                                            <div class="icone-perfil-row-mensagem">
                                                <div class="foto-perfil">
                                                    <a href="./perfil.php?username=<?= $imagemUti['username'] ?>">
                                                        <img src="./img/fotos_perfil/<?= $imagemUti['profile_image'] ?>" alt="Foto de Perfil">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                    <?php
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php

        if (isset($_GET['id_user_msg'])) {

        ?>
            <form class="form-mensagem" action="./enviar_mensagem.php?to_user=<?= $imagem['id_user'] ?>" method="POST">

                <div class="escrever-mensagem">
                    <div class="texto-mensagem">

                        <input type="text" placeholder="Escreva uma Mensagem..." class="mensagem" name="mensagem" id="mensagem">
                    </div>
                    <div class="conteudo-multimedia">

                        <button type="submit" class="btn btn-primary icones-chat"><i class='bx bxs-send'></i></button>

                    </div>

                </div>
            </form>
    </div>
<?php

        }
?>
</div>

</div>

<?php include 'page_parts/footer.php'; ?>