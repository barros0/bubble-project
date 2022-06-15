<?php include 'page_parts/header.php'; ?>
<div class="parts">
    <?php include 'page_parts/left.php'; ?>
    <div class="center">

<?php
$liked = $conn->query('select * from gostos inner join publicacoes on gostos.publicacao_id = publicacao.publicacao_id where gostos.user_id = '.$userq['id_user'] );

$saved = $conn->query('select * from guardados inner join publicacoes on guardados.publicacao_id = publicacao.publicacao_id where guardados.user_id = '.$userq['id_user']);
print_r($saved)
?>


<?php

foreach ($liked as $pub){

}


foreach ($saved as $pub){

}


?>

        <div class="right">
            <div class="right_fixed">

            </div>

        </div>

    </div>
    <?php include 'page_parts/footer.php'; ?>
