<?php
$marketplace =  $conn->query("select * from marketplace");

$result_set =($marketplace);
?>

<?php
while ($market = $result_set->fetch_assoc()) {
    $user = $conn->query("select username from users where id_user =".$market['id_user'])->fetch_assoc();

?>
    <div class="market">
  
        <div class="market_left">
            <div class="imagem_market">
            <img class="market_right" src="img/marketplace/<?php  echo $market['imagem'] ?>" alt="foto_market">
            </div>
        <div class="seccao2-caixamarket">
            <div class="autor_market">
                <p>Autor: <?php echo $user['username'] ?></p>
            </div>
            <div class="categoria_market">
                <p>Categoria: <?php echo $market['categoria'] ?></p>
            </div>
            <div class="titulo_market">
                <p><?php echo $market['titulo'] ?></p>
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
    </div>
<?php
}
?>