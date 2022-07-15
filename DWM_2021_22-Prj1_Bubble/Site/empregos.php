<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

//buscar detalhes na base de dados
$query = 'SELECT * FROM oferta_emprego';
$lista_empregos = $conn->query($query);

?>
<div class="wrap-conteudo">
    <div class="conteudo">

        <div class="wrap_pesquisa">
            <form class="search_pesquisa" method="POST" action="">
                <div class="div_input_search_pesquisa">
                    <input type="text" class="input_seach_pesquisa" placeholder="Pesquisar Empregos..." name="search" required="required" value="" />
                    <span class="input_search_group_btn">
                        <button class="button_search_pesquisa" name="search"><i class='bx bx-search'></i></button>
                    </span>
                </div>
            </form>
            <div id="button_modal_emprego" class="button_modal" onClick="Javascript:window.location.href = './empregosUtilizador.php';"><i class="bx bxs-cog icon"></i></div>
        </div>

        <div class="wrap-empregos">

            <?php

            while ($row = $lista_empregos->fetch_assoc()) {

                //caso o emprego tenha foto, buscar a foto;

                $queryfoto = 'SELECT * FROM oferta_emprego INNER JOIN foto_emprego ON oferta_emprego.id_oferta = foto_emprego.id_emprego';
                $lista_fotos = $conn->query($queryfoto);

                $imagemq = "SELECT * FROM foto_emprego WHERE id_emprego =" . $row['id_oferta'];
                $imagem = $conn->query($imagemq)->fetch_assoc();

                //buscar pessoa que publicou o emprego
                $queryUser =  'SELECT * FROM users WHERE id_user = ' . $row['id_user'];
                $utilizador = $conn->query($queryUser)->fetch_assoc();


            ?>

                <div class="caixa-emprego">
                    <div class="foto-emprego">
                        <?php
                        if (!empty($imagem)) {
                        ?>
                            <img class="ft-emprego" src="./img/empregos/<?= $imagem['foto'] ?>" alt="Emprego">
                        <?php
                        } else {
                            //imagem default para quando não tem emprego
                        ?>
                            <img class="ft-emprego" src="./img/empregos/banner_emprego.jpg" alt="Emprego">
                        <?php
                        }
                        ?>

                    </div>
                    <div class="conteudo-emprego">
                        <div class="wrap-dt-emp">
                            <h3 class="nome-emp"><?= $row['titulo'] ?></h3>
                            <div class="detalhes">
                                <table style="width:100%">
                                    <tr>
                                        <td><span>Qualificações:</span></td>
                                        <td><span><?= $row['qualificacoes'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Experiência:</span></td>
                                        <td><span><?= $row['experiencia'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Localização:</span></td>
                                        <td> <span><?= $row['localizacao'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Categoria:</span></td>
                                        <td><span><?= $row['categoria'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Publicado por:</span></td>
                                        <td><span><a class="link-perfil" href="./perfil.php?username=<?= $utilizador['username'] ?>"><?= $utilizador['nome'] ?></a></span></td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                        <div class="btn-wrp">
                            <button onClick="window.location.href='./emprego.php?id_emp=<?= $row['id_oferta'] ?>'" type="button" class="btn-emprego">Ver Emprego</button>
                        </div>

                    </div>

                </div>
            <?php

            }

            ?>

        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>