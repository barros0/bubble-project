<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<div class="notificacoes">
    <?php
    if (!empty($_SESSION['alerts']['info'])) {
        foreach ($_SESSION['alerts']['info'] as $notf) {
    ?>
            <div onclick="this.parentElement.style.display='none';" class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Info!</strong> <?= $notf ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
        }
    }
    ?>

    <?php
    if (!empty($_SESSION['alerts']['success'])) {
        foreach ($_SESSION['alerts']['success'] as $notf) {
    ?>
            <div onclick="this.parentElement.style.display='none';" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?= $notf ?>.
                <span aria-hidden="true">&times;</span>
            </div>
    <?php
        }
    }
    ?>


    <?php
    if (!empty($_SESSION['alerts']['alert'])) {
        foreach ($_SESSION['alerts']['alert'] as $notf) {
    ?>
            <div onclick="this.parentElement.style.display='none';" class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alerta!</strong> <?= $notf ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
        }
    }
    ?>


    <?php
    if (!empty($_SESSION['alerts']['errors'])) {
        foreach ($_SESSION['alerts']['errors'] as $notf) {
    ?>
            <div onclick="this.parentElement.style.display='none';" class="alert alert-info alert-danger fade show" role="alert">
                <strong>Erro!</strong> <?= $notf ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    <?php
        }
    }
    ?>
</div>

<style>
    .notificacoes {
        top: 68px;
        left: 20px;
        position: fixed;
        z-index: 999;
        border-radius: 10px;
        padding: 10px;
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
</style>
<?php

$_SESSION['alerts']['info'] = array();
$_SESSION['alerts']['errors'] = array();
$_SESSION['alerts']['alert'] = array();
$_SESSION['alerts']['success'] = array();

?>