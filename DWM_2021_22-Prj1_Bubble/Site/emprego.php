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

        <?php

        while ($row = $lista_empregos->fetch_assoc()) {

        ?>

            <div class="caixa-emprego">
                <div class="foto-emprego">
                <?php
                     if (!empty($imagem)){
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
                            <div class="ind-detalhes">
                                <span>Qualificações:</span>
                                <span>Experiência:</span>
                                <span>Vagas:</span>
                                <span>Localização:</span>
                                <span>Categoria:</span>
                                <span>Tipo:</span>
                                <span>Horários:</span>
                            </div>
                            <div class="texto-detalhes">
                                <span><?= $row['qualificacoes'] ?></span>
                                <span><?= $row['experiencia'] ?></span>
                                <span><?= $row['vagas'] ?></span>
                                <span><?= $row['localizacao'] ?></span>
                                <span><?= $row['categoria'] ?></span>
                                <span><?= $row['tipo'] ?></span>
                                <span><?= $row['horario'] ?></span>
                            </div>
                        </div>
                    </div>

                </div>

             

            </div>

            <div class="caixa-descricao">
            <h3 class="nome-emp">Descrição</h3>
            <p class="descricao"><?= $row['descricao'] ?></p>
            </div>

        <?php

        }

        ?>

    </div>
</div>

<?php include 'page_parts/footer.php'; ?>