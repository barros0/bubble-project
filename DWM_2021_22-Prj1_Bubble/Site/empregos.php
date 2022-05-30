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

            <div class="caixa-emprego">
                <div class="foto-emprego"><img class="ft-emprego" src="http://blog.adrianalombardo.com/wp-content/uploads/2019/08/como-encontrar-emprego.jpg" alt="Emprego"></div>
                <div class="conteudo-emprego">
                    <h3 class="nome-emp">Nome Emprego</h3>
                    <div class="detalhes">
                        <div class="ind-detalhes">
                    <span>Localização:</span> 
                    <span>Tipo:</span> 
                    <span>Horários:</span> 
                    </div>
                    <div class="texto-detalhes">
                    <span>Leiria</span>
                    <span>Remoto</span>
                    <span>Full-Time</span>
                    </div>
                    </div>
                    <div class="btn-wrp"> 
                        <button type="button">Ver Emprego</button>
                    </div>
                
            </div>

        </div>
    </div>
</div>

<?php include 'page_parts/footer.php'; ?>