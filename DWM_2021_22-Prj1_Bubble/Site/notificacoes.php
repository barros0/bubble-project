
<?php include 'page_parts/header.php'; ?>
<div class="parts">
    <?php include 'page_parts/left.php'; ?>
    <div class="center">

        <?php

        include ('./functions_handler.php');
        $query = 'select * from notificacoes where id_utilizador ="'.$_SESSION['user']['id_user'].'"';

        $notificoes = $conn->query($query);

        ?>

        <div class="col-12 ">
            <div class="col-12">
                <h1>Notificações</h1>
            </div>

            <div class="notificacoes">

                <?php

                if($notificoes->num_rows > 0){
                while ($notificacao = notificacao_handler($notificoes->fetch_assoc(), $conn)){ ?>
                <div class="notificacao">
                    <div class="d-flex">
                    <div class="img-radius">
                        <img src="https://picsum.photos/200/300" alt="">
                    </div>
                    <div class="info">
                        <div class="titulo">
                            <h2><?php echo($notificacao['titulo']) ?></h2>
                        </div>
                        <div class="desc">
                            <p><?php echo($notificacao['descricao']) ?></p>
                        </div>
                    </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>

    </div>
    <div class="right">
        <div class="right_fixed">

        </div>

    </div>

    <style>
        .notificacoes{
            background-color: var(--parcelas);
            border-radius: 10px;
            padding: 10px;
        }

        .notificacao{
            background-color: var(--background);
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 4px;
        }

        .notificacao .info{
            padding-top: 6px;
            padding-left: 16px;
        }

        .notificacao .titulo /*h2*/ a{
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            color: var(--palavras);
            margin-top: 10px;
        }
        .notificacao .titulo a:hover{
            color: var(--verde-hover);
        }

        .notificacao .titulo *{
            font-size: 14px;
            color: var(--palavras);
        }

        .notificacao .img-radius img{
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            background-color: var(--background);
        }

        p,h1{
            color: var(--palavras);
        }

    </style>
</div>
<?php include 'page_parts/footer.php'; ?>
<!--<script src="js/weather.js"></script>-->