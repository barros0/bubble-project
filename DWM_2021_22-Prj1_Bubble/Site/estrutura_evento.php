<?php
$eventos = "select * from eventos";

$result_set = $conn->query($eventos);
?>

<?php
while ($evento = $result_set->fetch_assoc()) {
?>
    <div class="evento">
        <div class="evento_left">
            <div class="data_evento">
                <span class="dia/mes"></span>
                <span class="hora"></span>
            </div>
            <div class="titulo_evento">
                <h1><?php echo $evento['titulo'] ?></h1>
            </div>
            <div class="sitio_evento">
                <p class="nome do sitio"><?php echo $evento['localizacao'] ?></p>
            </div>
            <div class="descricao_evento">
                <p class="descricao_texto_evento"><?php echo $evento['descricao'] ?></p>
            </div>
        </div>
        <div class="evento_right">
            <img src="img/eventos/<?php echo $evento['imagem'] ?>" alt="foto_evento">
        </div>
    </div>
<?php
}
?>