<?php
include 'page_parts/header.php';
include 'functions_handler.php';
?>
    <div class="parts">
<?php include 'page_parts/left.php'; ?>

<?php
$liked = $conn->query('select * from gostos join publicacoes on gostos.publicacao_id = publicacoes.publicacao_id 
/*join publicacoes_fotos on publicacoes.publicacao_id = publicacoes_fotos.publicacao_id*/
where gostos.user_id = ' . $userq['id_user']);

$saved = $conn->query('select * from publicacoes_fav join publicacoes on publicacoes_fav.id_pub = publicacoes.publicacao_id 
/*join publicacoes_fotos on publicacoes.publicacao_id = publicacoes_fotos.publicacao_id*/
where publicacoes_fav.id_user = ' . $userq['id_user']);

?>

    <style>
        .center {
            display: flex;
            width: 70%;
            margin-top: 98px;
            margin-right: 70px;
            flex-direction: column;
        }

        .actions {
            display: flex;
            width: 100%;
            height: 70px;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .left_bt, .right_bt {
            background-color: #404040;
            border-bottom: 2px solid transparent;
            width: 49%;
            border-radius: 10px;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
            text-decoration: none;
        }

        .left_bt:hover, .right_bt:hover {
            background-color: rgb(88, 88, 88);
        }

        .color {
            color: white;
        }

        .listagem_users {
            display: flex;
            width: 100%;
            background-color: #404040;
            margin-top: 30px;
            border-radius: 10px;
            padding: 10px;
            flex-direction: column;
        }


        .active_bt {
            border-bottom: 2px solid #00ff8a;
            border-bottom-right-radius: 10px;
        }


    </style>


    <div class="center">
        <div class="actions">
            <a class="left_bt active_bt" href="#" id="bt_saved">
                <div class="color" style="color:#00ff8a !important;">
                    <p></p>
                    <p>Guardados (<?=$saved->num_rows?>)</p>
                </div>
            </a>
            <a class="right_bt" href="#" id="bt_liked">
                <div class="color">
                    <p></p>
                    <p>Gostados (<?=$liked->num_rows?>)</p>
                </div>
            </a>
        </div>


        <div class="container-sl">

            <script>
                $(document).ready(function () {

                    $('#bt_liked').click( function (){
                        $(this).addClass('active_bt');
                        $('#bt_saved').removeClass('active_bt');

                        $('#liked').addClass('active-l');
                        $('#saved').removeClass('active-l');
                    })
                    $('#bt_saved').click( function (){
                        $(this).addClass('active_bt');
                        $('#bt_liked').removeClass('active_bt');

                        $('#liked').removeClass('active-l');
                        $('#saved').addClass('active-l');
                    })

                })
            </script>


            <div id="liked" class="active-l">
                <div class="list">
                    <?php
                    foreach ($saved as $pub) {
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

            </div>

            <div id="saved">

                <div class="list">
                    <?php
                    foreach ($saved as $pub) {
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
            </div>
        </div>


        <style>
            .container-sl {
                background-color: var(--parcelas);
                border-radius: 10px;
                padding: 20px;
                width: 100%;
            }

            .container-sl .list {
                justify-content: center;
                display: flex;
                flex-wrap: wrap;
            }

            .container-sl .list .box {
                margin: 10px 20px 10px 20px;
            }

            .container-sl .list .box a {
                text-decoration: none;

            }

            .container-sl .list .box .img {
                overflow: hidden;
                width: 150px;
                height: 150px;
                border: 2px solid var(--items);
                border-radius: 6px;
                transition-duration: 0.2s;
            }

            .container-sl .list .box .info {
                display: flex;
                justify-content: center;
            }

            .container-sl .list .box .info .fa {
                color: var(--verde);
            }

            .container-sl .list .box .likes,
            .container-sl .list .box .comments {
                font-weight: bold;
                color: var(--branco);
                padding: 4px 10px 0px 10px;
            }


            .container-sl .list .box .img img {
                object-fit: cover;
                object-position: center;
                width: 100%;
                height: 100%;
                transition-duration: 0.2s;
            }

            .container-sl .list .box:hover {
                border-color: var(--verde-hover);
            }

            .container-sl .list .box:hover .img img {
                transform: scale(1.2);
            }


            .active-l{
                display: block !important;
            }

            #saved, #liked{
                display: none;
            }
        </style>


        <div class="right">
            <div class="right_fixed">

            </div>

        </div>

    </div>
<?php include 'page_parts/footer.php'; ?>