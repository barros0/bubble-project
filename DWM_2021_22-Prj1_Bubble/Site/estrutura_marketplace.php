<?php
$marketplace =  $conn->query("select * from marketplace");

$result_set = ($marketplace);
?>

<?php
while ($market = $result_set->fetch_assoc()) {
    $user = $conn->query("select username from users where id_user =" . $market['id_user'])->fetch_assoc();

?>
    <div class="market">

        <div class="market_left">
            <div class="imagem_market">
                <img class="market_right" src="img/marketplace/<?php echo $market['imagem'] ?>" alt="foto_market">
            </div>
            <div class="seccao2-caixamarket">
            <div class="top-carta">
                 <div class="titulo_market">
                    <p class="titulo"><?php echo $market['titulo'] ?></p>
                </div>
                <div class="autor_market">
                    <p>Autor: <?php echo $user['username'] ?></p>
                </div>
                </div>
                <div class="center-carta">
                <div class="descricao_market">
                    <p class="descricao_texto_market"><?php echo $market['descricao'] ?></p>
                </div>
                </div>
                <div class="footer-carta">

                <div class="categoria_market">
                    <p>Categoria: <?php echo $market['categoria'] ?></p>
                </div>

                
                <div class="preco_market">
                    <p class="preco-market"><?php echo $market['preco'] ?>€</p>
                </div>

                </div>


            </div>
        </div>
    </div>
<?php
}
?>