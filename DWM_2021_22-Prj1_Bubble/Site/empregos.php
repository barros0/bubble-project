<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

//buscar detalhes na base de dados
$query = 'SELECT * FROM oferta_emprego';
$lista_empregos = $conn->query($query);

?>
<div class="wrap-conteudo">
    <div class="conteudo">

        <div class="wrap-empregos">

            <?php

            while ($row = $lista_empregos->fetch_assoc()) {

                //buscar dados
                
                $row['categoria'];
                $row['descricao'];           

                echo '<div class="caixa-emprego">
                <div class="foto-emprego"><img class="ft-emprego" src="' . $row['foto'] .'" alt="Emprego"></div>
                <div class="conteudo-emprego">
                    <div class="wrap-dt-emp">
                        <h3 class="nome-emp">'. $row['titulo'] .'</h3>
                        <div class="detalhes">
                            <div class="ind-detalhes">
                                <span>Qualificações:</span>
                                <span>Experiência:</span>
                                <span>Vagas:</span>
                                <span>Localização:</span>
                                <span>Tipo:</span>
                                <span>Horários:</span>
                            </div>
                            <div class="texto-detalhes">
                                <span>'. $row['qualificacoes'] .'</span>
                                <span>'. $row['experiencia'] .'</span>
                                <span>'. $row['vagas'] .'</span>
                                <span>'. $row['localizacao'] .'</span>
                                <span>'. $row['tipo'] .'</span>
                                <span>'. $row['horario'] .'</span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrp">
                        <button type="button" class="btn-emprego">Ver Emprego</button>
                    </div>

                </div>

            </div>';

            }

            ?>

        </div>
    </div>

<?php include 'page_parts/footer.php'; ?>