<?php include 'page_parts/header.php'; ?>
<div class="parts">
    <?php include 'page_parts/left.php'; ?>
    <div class="center p-notificacoes">

        <div class="col-12 ">
            <div class="col-12 notificacoes-titulo-wrap">
                <h1 class="notificacoes-titulo">Notificações</h1>
                <span class="info-new">4 novas</span>
            </div>

            <div class="notificacoes">

                <div class="notificacao new">
                    <div class="d-flex">
                        <div class="img-radius">
                            <span class="dot"></span>
                            <img src="https://picsum.photos/200/300" alt="">
                        </div>
                        <div class="info">
                            <div class="titulo">
                                <h2><a href="">Carlos</a> deu like na tua <a href="#">publicação</a></h2>
                            </div>
                            <div class="desc">
                                <p><i class="fa fa-clock"></i> á 20 minutos atrás</p>
                            </div>
                        </div>
                        <div class="action">
                            <a href="" class="btn-action">
                                <i class="fa fa-eye"></i> Ver publicação
                            </a>
                        </div>
                    </div>
                </div> <div class="notificacao new">
                    <div class="d-flex">
                        <div class="img-radius">
                            <span class="dot"></span>
                            <img src="https://picsum.photos/300/300" alt="">
                        </div>
                        <div class="info">
                            <div class="titulo">
                                <h2><a href="">João</a> deu comentou na tua <a href="">publicação</a></h2>
                            </div>
                            <div class="desc">
                                <p><i class="fa fa-clock"></i> á 30 minutos atrás</p>
                            </div>
                        </div>
                        <div class="action">
                            <a href="" class="btn-action">
                                <i class="fa fa-eye"></i> Ver publicação
                            </a>
                        </div>
                    </div>
                </div> <div class="notificacao new">
                    <div class="d-flex">
                        <div class="img-radius">
                            <span class="dot"></span>
                            <img src="https://picsum.photos/500/600" alt="">
                        </div>
                        <div class="info">
                            <div class="titulo">
                                <h2><a href="#">Joana</a> começou a seguir-te</h2>
                            </div>
                            <div class="desc">
                                <p><i class="fa fa-clock"></i> á 40 minutos atrás</p>
                            </div>
                        </div>
                        <div class="action">
                            <a href="" class="btn-action">
                                <i class="fa fa-eye"></i> Seguir de volta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>


        .p-notificacoes{
            width: 100%;
            padding-right: 60px;
        }

        .notificacoes-titulo-wrap .notificacoes-titulo{
            margin-top: 20px;
            margin-bottom: 15px;
            display: inline-block;
        }

        .notificacoes-titulo-wrap .info-new{
            color: var(--palavras);
            margin-left: 5px;
        }

        .notificacoes-titulo-wrap .info-new:before {
            content: "";
            height: 12px;
            width: 12px;
            background-color: var(--verde-hover);
            display: inline-block;
            margin-right: 4px;
            border-radius: 50%;
        }

        .notificacoes {

        }

        .notificacao:first-child{
            border-top: none !important;
            border-radius: 6px 6px 0px 0px;
        }
        .notificacao:last-child{
            border-bottom: none !important;
            border-radius: 0px 0px 6px 6px;
        }

        .notificacao {
            padding: 10px;
            padding-bottom: 4px;
            padding-top: 4px;
            background-color: var(--nav);
            border-bottom: 4px solid var(--items);
            border-top: 4px solid var(--items);
        }

        .notificacao .info {
            padding-left: 16px;
            padding-top: 5px;
        }

        .notificacao .titulo h2 {
            font-size: 18px;
            font-weight: bold;
            color: var(--palavras);
            margin-top: 10px;
        }

        .notificacao .titulo a{
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: var(--branco);
            margin-top: 10px;
            transition-duration: 0.25s;
        }
        .notificacao .titulo a:hover{
            color: var(--items-hover);
        }

        .notificacao .titulo * {
            font-size: 14px;
            color: var(--palavras);
        }

        .notificacao .img-radius img {
            margin-left: 5px;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            background-color: var(--background);
        }

        .notificacao.new .img-radius .dot {
            height: 25px;
            width: 25px;
            background-color: var(--verde-hover);
            border-radius: 50%;
            display: inline-block;
            position: absolute;
            border: 3px solid white;
            margin-left: 57px;
        }

        .notificacao .action {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .notificacao .action .btn-action {
            border-radius: 8px;
            padding: 5px;
            background-color: var(--verde);
            color: var(--items);
            font-weight: 500;
            margin: 10px;
            text-align: center;
            text-decoration: none;
            transition-duration: 0.25s;
        }

        .notificacao .action .btn-action:hover {
            background-color: var(--verde-hover);
            color: var(--items-hover);
        }

        p, h1 {
            color: var(--palavras);
        }

    </style>
</div>
<?php include 'page_parts/footer.php'; ?>
<!--<script src="js/weather.js"></script>-->