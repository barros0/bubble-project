<?php include 'page_parts/header.php'; ?>
    <div class="parts">
        <?php include 'page_parts/left.php'; ?>
        <div class="center">

            <?php

            include('./functions_handler.php');

            // vai buscar todas as notificacoes desse utilizador
            $notificacoesq = $conn->prepare("select * from notificacoes where id_utilizador = ?");
            $notificacoesq->bind_param("i", $_SESSION['user']['id_user']);
            $notificacoesq->execute();
            $notificacoes = $notificacoesq->get_result();
            $notificacoesq->close();

            ?>

            <div class="col-12 notificacoes-wrapper">
                <div class="col-12">
                    <h1>Notificações</h1>
                </div>

                <div class="notificacoes-p">

                    <?php

                    if ($notificacoes->num_rows > 0) {
                        foreach ($notificacoes

                                 as $notificacao) {
                            $notificacao = notificacao_handler($notificacao, $conn)
                            ?>
                            <div class="notificacao" rel="<?= $notificacao['linkp'] ?>">
                                <div class="d-flex warp-notf-inf">
                                    <div class="img-radius">
                                        <img src="<?= $notificacao['img'] ?>" alt="user image">
                                    </div>
                                    <div class="info">
                                        <div class="titulo">
                                            <h2><?= $notificacao['titulo'] ?></h2>
                                        </div>
                                        <div class="desc">
                                            <p><?= $notificacao['descricao'] ?></p>
                                        </div>
                                    </div>
                                    <a href="<?= $notificacao['linkp'] ?>" class="btr btn btn-primary"><i
                                                class="fa fa-eye"></i>
                                        Ver</a>
                                </div>
                            </div>

                        <?php }
                    } else { ?>
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
        </div>
    </div>


<?php include 'page_parts/footer.php'; ?>