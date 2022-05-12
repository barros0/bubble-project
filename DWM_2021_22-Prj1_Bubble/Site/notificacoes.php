<?php include 'page_parts/header.php'; ?>
<div class="parts">
    <?php include 'page_parts/left.php'; ?>
    <div class="center">

        <div class="col-12 ">
            <div class="col-12">
                <h1>Notificações</h1>
            </div>

            <div class="notificacoes">

                <div class="notificacao">
                    <div class="d-flex">
                    <div class="img-radius">
                        <img src="https://picsum.photos/200/300" alt="">
                    </div>
                    <div class="info">
                        <div class="titulo">
                            <h2>João deu like na tua publicação</h2>
                        </div>
                        <div class="desc">
                            <p>qsq</p>
                        </div>
                    </div>
                    </div>

                </div>
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
            padding-left: 16px;
        }

        .notificacao .titulo h2{
            font-size: 18px;
            font-weight: bold;
            color: var(--palavras);
            margin-top: 10px;
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