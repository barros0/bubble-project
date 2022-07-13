<?php
include 'page_parts/header.php';
include 'functions_handler.php';
?>
    <div class="parts">
<?php include 'page_parts/left.php'; ?>

<?php
// obtem todos os gostos que o user deu
$liked = $conn->query('select * from gostos join publicacoes on gostos.publicacao_id = publicacoes.publicacao_id 
where gostos.user_id = ' . $userq['id_user']);

// obtem todos as publicacoe que o user guardou / favorito
$saved = $conn->query('select * from publicacoes_fav join publicacoes on publicacoes_fav.id_pub = publicacoes.publicacao_id 
where publicacoes_fav.id_user = ' . $userq['id_user']);

?>


    <div class="center">
        <div class="actions">
            <a class="left_bt active_bt" href="#" id="bt_saved">
                <div class="white">
                    <p></p>
                    <p>Guardados (<?=$saved->num_rows?>)</p>
                </div>
            </a>
            <a class="right_bt" href="#" id="bt_liked">
                <div class="white">
                    <p></p>
                    <p>Gostados (<?=$liked->num_rows?>)</p>
                </div>
            </a>
        </div>


        <div class="container-sl">



            <div id="liked">

                <?php if($liked->num_rows > 0){ ?>
                <div class="list">
                    <?php
                    foreach ($liked as $pub) {
                        ?>
                        <div class="box">
                            <a href="./publicacao.php?publicacaoid=<?=$pub['publicacao_id'] ?>">
                                <div class="img">
                                    <img src="<?= pub_thumb($pub['publicacao_id'],$conn)?>?>"
                                         alt="tumb pub<?=$pub['publicacao_id'] ?>">
                                </div>
                                <div class="info">
                                    <div class="likes">
                                        <i class="fa fa-heart"></i>
                                        <span><?=pub_count_likes($pub['publicacao_id'],$conn)?></span>
                                    </div>
                                    <div class="comments">
                                        <i class="fa fa-comment-o"></i>
                                        <span><?=pub_count_comments($pub['publicacao_id'],$conn)?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>

                </div>

                <?php }else{ ?>
                <div class="nada-s">
                <h2 class="text-center">Ainda não gostas-te de nenhuma publicação!  <i class="fa fa-sad-tear"></i></h2>

                    <a class="bt" href="feed.php">
                        Ir para o feed!
                    </a>
                </div>
                <?php } ?>

            </div>

            <div id="saved" class="active-l">

                <?php if($saved->num_rows > 0){ ?>
                <div class="list">
                    <?php
                    foreach ($saved as $pub) {
                        ?>
                        <div class="box">
                            <a href="./partilha.php?id_pub=<?=$pub['publicacao_id'] ?>">
                                <div class="img">
                                    <img src="<?= pub_thumb($pub['publicacao_id'],$conn)?>?>"
                                         alt="tumb pub<?=$pub['publicacao_id'] ?>">
                                </div>
                                <div class="info">
                                    <div class="likes">
                                        <i class="fa fa-heart"></i>
                                        <span><?=pub_count_likes($pub['publicacao_id'],$conn)?></span>
                                    </div>
                                    <div class="comments">
                                        <i class="fa fa-comment-o"></i>
                                        <span><?=pub_count_comments($pub['publicacao_id'],$conn)?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                  <?php }else{ ?>
<div class="nada-s">
<h2>Ainda não guardas-te de nenhuma publicação!  <i class="fa fa-sad-tear"></i></h2>

    <a class="bt" href="feed.php">
        Ir para o feed!
    </a>
</div>
<?php } ?>
            </div>
        </div>



        <div class="right">
            <div class="right_fixed">

            </div>

        </div>

    </div>
<?php include 'page_parts/footer.php'; ?>