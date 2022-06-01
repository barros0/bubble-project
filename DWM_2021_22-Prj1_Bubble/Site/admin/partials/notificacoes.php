<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<div class="notificacoes">
<?php
if(!empty($_SESSION['alerts']['info'])){
    foreach ($_SESSION['alerts']['info'] as $notf){
        ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Info!</strong>  <?=$notf?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}
?>

<?php
if(!empty($_SESSION['alerts']['success'])){
    foreach ($_SESSION['alerts']['success'] as $notf){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>  <?=$notf?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}
?>


<?php
if(!empty($_SESSION['alerts']['alert'])){
    foreach ($_SESSION['alerts']['alert'] as $notf){
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong>  <?=$notf?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}
?>


<?php
if(!empty($_SESSION['alerts']['errors'])){
    foreach ($_SESSION['alerts']['errors'] as $notf){
        ?>
        <div class="alert alert-info alert-danger fade show" role="alert">
            <strong>Erro!</strong>  <?=$notf?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}
?>
</div>
<?php

$_SESSION['alerts']['info'] = array();
$_SESSION['alerts']['errors'] = array();
$_SESSION['alerts']['alert'] = array();
$_SESSION['alerts']['success'] = array();

?>

