<?php include 'page_parts/header.php'; ?>
<div class="parts">
    <?php include 'page_parts/left.php'; ?>
    <div class="center">

        <?php

        include('./functions_handler.php');
        $query = 'select * from notificacoes where id_utilizador ="' . $_SESSION['user']['id_user'] . '"';

        $notificacoes = $conn->query($query);

        ?>

        <div class="col-12 notificacoes-wrapper">
            <div class="col-12">
                <h1>Notificações</h1>
            </div>

            <div class="notificacoes-p">

                <?php

                if ($notificacoes->num_rows > 0) {
                    foreach ($notificacoes as $notificacao) {
                        $notificacao = notificacao_handler($notificacao, $conn)
                        ?>
                        <div class="notificacao">
                            <div class="d-flex">
                                <div class="img-radius">
                                    <img src="<?= $notificacao['img'] ?>" alt="">
                                </div>
                                <div class="info">
                                    <div class="titulo">
                                        <h2><?= $notificacao['titulo'] ?></h2>
                                    </div>
                                    <div class="desc">
                                        <p><?= $notificacao['descricao'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } else{?>
                       <div class="sem-notificacaoes">
                           <i class="ficon fa-solid fa-bell-slash"></i>
                           <h2>
                               Ainda não recebes-te nenhuma notificação <i class="fa fa-sad-tear"></i>

                           </h2>
                       </div>
                        <?php
                }
                ?>
            </div>
        </div>

        <style>
            .sem-notificacaoes{
                padding: 60px;
text-align: center;
                border-radius: 8px;
                background-color: var(--parcelas);
                margin-top: 30px;
            }

            .sem-notificacaoes .ficon{
                margin-bottom: 30px;
    font-size: 60px;
                color: var(--verde);
            }

            .sem-notificacaoes h2{
                    color: var(--white);
            }
        </style>

    </div>




    <style>


        .notificacoes-p {
            border-radius: 10px;
            padding: 10px;
        }

        .notificacoes-p button {
            background-color: transparent;
            font-size: 20px;
            margin-left: 10px;
        }

        .notificacao {
            background-color: var(--background);
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 4px;
        }

        .notificacao .info {
            padding-top: 6px;
            padding-left: 16px;
        }

        .notificacao .titulo a {
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: var(--palavras);
            margin-top: 10px;
        }

        .notificacao .titulo a:hover {
            color: var(--verde-hover);
        }

        .notificacao .titulo * {
            font-size: 14px;
            color: var(--palavras);
        }

        .notificacao .img-radius img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            background-color: var(--background);
        }

        .notificacoes-p p, h1 {
            color: var(--palavras);
        }

        .notificacao {
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 4px;
        }

        .notificacao .info {
            padding-top: 6px;
            padding-left: 16px;
        }

        .notificacao .titulo a {
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: var(--palavras);
            margin-top: 10px;
        }

        .notificacao .titulo a:hover {
            color: var(--verde-hover);
        }

        .notificacao .titulo * {
            font-size: 14px;
            color: var(--palavras);
        }

        .notificacao .img-radius img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;

        }

        .notificacoes-p p, h1 {
            color: var(--palavras);
        }

        .notificacoes-wrapper {
            padding: 30px 20px 20px 30px;
        }


        .center {
            display: flex;
            width: 100%;
            flex-direction: column;
            align-items: center;
            margin-top: 48px;
        }


    </style>
<?php include 'page_parts/footer.php'; ?>