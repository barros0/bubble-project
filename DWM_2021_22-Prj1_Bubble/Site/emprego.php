<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

//buscar o id do emprego a ser visto
$idemp = $_GET['id_emp'];

//buscar detalhes na base de dados
//buscar foto
$query = 'SELECT * FROM oferta_emprego WHERE id_oferta = ' . $idemp;
$lista_empregos = $conn->query($query);

//buscar detalhes emprego
$imagemq = 'SELECT * FROM foto_emprego WHERE id_emprego = ' . $idemp;
$imagem = $conn->query($imagemq)->fetch_assoc();

?>

<div class="wrap-conteudo">
    <div class="conteudo">
        <div class="wrap-conteudo-emprego">

            <?php

            while ($row = $lista_empregos->fetch_assoc()) {

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
                                        <td><span>Vagas:</span></td>
                                        <td><span><?= $row['vagas'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Localização:</span></td>
                                        <td><span><?= $row['localizacao'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Categoria:</span></td>
                                        <td><span><?= $row['categoria'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Tipo:</span></td>
                                        <td><span><?= $row['tipo'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Horários:</span></td>
                                        <td><span><?= $row['horario'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Requisitos:</span></td>
                                        <td><span><?= $row['requisitos'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Publicado por:</span></td>
                                        <td><span><a class="link-perfil" href="./perfil.php?username=<?= $utilizador['username'] ?>"><?= $utilizador['nome'] ?></a></span></td>
                                    </tr>
                                </table>

                            </div>
                        </div>

                    </div>



                </div>

                <div class="caixa-descricao">
                    <h3 class="nome-emp">Descrição</h3>
                    <p class="descricao"><?= $row['descricao'] ?></p>
                </div>
        </div>
    <?php

            }

    ?>

    </div>
</div>

<?php include 'page_parts/footer.php'; ?>