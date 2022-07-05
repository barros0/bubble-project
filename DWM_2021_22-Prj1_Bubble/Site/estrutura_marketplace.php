<?php
$marketplace = "select * from marketplace";

$result_set = $conn->query($marketplace);
?>

<?php
while ($market = $result_set->fetch_assoc()) {
?>
    <div class="market">
  
        <div class="market_left">
            <div class="data_market">
                <span class="dia/mes"></span>
                <span class="hora"></span>
            </div>
            <div class="descricao_market">
            <img class="market_right" src="img/marketplace/<?php  echo $market['imagem'] ?>" alt="foto_market">
            </div>
            <div class="titulo_market">
                <h1>Autor: <?php echo $market['id_user'] ?></h1>
            </div>
            <div class="titulo_market">
                <h1><?php echo $market['titulo'] ?></h1>
            </div>
            <div class="descricao_market">
                <p class="descricao_texto_market"><?php echo $market['descricao'] ?></p>
            </div>
            <div class="sitio_market">
                <p class="nome do sitio">Preco: <?php echo $market['preco'] ?>€</p>
            </div> 
            <div class="texto-download">
                <p>5.0 ⭐⭐⭐⭐⭐</p>
            </div>
            <div class="texto-download">
                <p><i class="fa-solid fa-download"></i>1.6k Download</p>
            </div>
        </div>
    </div>
<?php
}
?>