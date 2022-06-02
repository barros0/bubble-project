<?php include 'page_parts/header.php'; ?>
<div class="parts">
    <?php include 'page_parts/left.php'; ?>
    <div class="center">

<?php
$liked = $conn->query('select * from gostos where user_id = '.$user['id_user'].' inner join publicacoes on gostos.publicacao_id = publicacao.publicacao_id');

$saved = $conn->query('select * from guardados where user_id = '.$user['id_user'].' inner join publicacoes on guardados.publicacao_id = publicacao.publicacao_id');

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
