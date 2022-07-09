<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

$id_user = $_SESSION['user']['id_user'];

//buscar detalhes na base de dados
$query = 'SELECT * FROM oferta_emprego WHERE id_user = ' . $id_user;
$lista_empregos = $conn->query($query);

?>

<div class="wrap-conteudo">
    <div class="conteudo">

        <div class="wrap_pesquisa">
            <form class="search_pesquisa" method="POST" action="">
                <div class="div_input_search_pesquisa">
                    <input type="text" class="input_seach_pesquisa" placeholder="Pesquisar..." name="keyword" required="required" value="" />
                    <span class="input_search_group_btn">
                        <button class="button_search_pesquisa" name="search"><i class='bx bx-search'></i></button>
                    </span>
                </div>
            </form>
            <div id="button_modal_emprego" class="button_modal" onClick="Javascript:window.location.href = './inseriremprego.php';">+</div>
        </div>

        <div class="wrap-empregos-gerir">

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

            <div class="caixa-emprego gerir" onClick="window.location.href='./editarEmprego.php?id_emp=<?=$row['id_oferta']?>'">
            <div class="foto-emprego-gerir clicavel">
                    <?php
                     if (!empty($imagem)){
                    ?>
                    <img class="ft-emprego-gerir" src="./img/empregos/<?= $imagem['foto'] ?>" alt="Emprego">
                    <?php
                     } else {
                        //imagem default para quando não tem emprego
                    ?>
                    <img class="ft-emprego-gerir" src="./img/empregos/banner_emprego.jpg" alt="Emprego">
                    <?php
                     }
                     ?>

                </div>
                <div class="conteudo-emprego-gerir">
                    <div class="wrap-dt-emp-g">
                        <span class="nome-emp-gerir"><?= $row['titulo']?></span>
                        <div class="detalhes-gerir">
                            <div class="texto-detalhes-gerir">
                                <span style="color:#bdbdbd; font-size:16px;"><?= $utilizador['nome'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrp">
                    </div>

                </div>
            </div>
        <?php

            }

            ?>
</div>
        </div>
    </div>

<?php include 'page_parts/footer.php'; ?>