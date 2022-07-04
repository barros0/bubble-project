<?php

include 'page_parts/header.php';

//buscar id do utilizador logado
$id_user = $_SESSION['user']['id_user'];

///Buscar utilizadores cujo user trocou mensagens
$query = "SELECT DISTINCT id_user, profile_image, username FROM users INNER JOIN mensagens WHERE users.id_user = mensagens.to_id_user AND mensagens.from_id_user = '$id_user' OR users.id_user = mensagens.from_id_user AND mensagens.to_id_user = '$id_user'";
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

                <div class="wrap-pessoa">
                    <div class="foto-perfil-container">
                        <div class="foto-perfil">
                            <a href="./mensagens.php?id_user_msg=<?= $row['id_user'] ?>">
                                <img src='./img/fotos_perfil/<?= $row['profile_image'] ?>' alt='<?= $row['username'] ?>'>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <div><?= $row['username'] ?></div>
                        <div>ultima mensagem</div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
    <div class="wrap_conteudo_form">
        <div class="wrap-conteudo-mensagens">

            <div class="conteudo-mensagens">

                <div class="conteudo-chat">

                    <?php

                    //listar as mensagens

                    if (isset($_GET['id_user_msg'])) {


                        while ($rowMsg = $mensagens->fetch_assoc()) {

                            //buscar os utilizadores que user enviou e recebeu mensagem
                            $user_to = $rowMsg['to_id_user'];
                            $user_from = $rowMsg['from_id_user'];

                            if ($user_to == $id_user) {

                    ?>

                                <div class="row-mensagem">
                                    <div class="icone-perfil-row-mensagem">
                                        <div class="foto-perfil">
                                            <img src="./img/fotos_perfil/<?= $imagem['profile_image'] ?>" alt="Foto de Perfil">
                                        </div>
                                    </div>
                                    <div class="conteudo-row-mensagem enviada">
                                        <span><?= $rowMsg['mensagem'] ?></span>
                                    </div>

                                </div>

                            <?php

                            } else {

                            ?>

                                <div class="row-mensagem">

                                    <div class="conteudo-row-mensagem">
                                        <span><?= $rowMsg['mensagem'] ?> </span>
                                    </div>

                                    <div class="icone-perfil-row-mensagem">
                                        <div class="foto-perfil">
                                            <img src="./img/fotos_perfil/<?= $imagemUti['profile_image'] ?>" alt="Foto de Perfil">
                                        </div>
                                    </div>
                                </div>

                    <?php

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

                        <textarea class="mensagem" type="text" placeholder="Escreva uma Mensagem..." name="mensagem" id="mensagem"></textarea>

                    </div>
                    <div class="conteudo-multimedia">

                        <button type="submit" class="btn btn-primary icones-chat"><i class='bx bxs-send'></i></button>

                        <div class="icones-chat"><i class="fa-solid fa-plus"></i></div>

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