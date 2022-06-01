<?php
require ('./bd.php');

$liked = $conn->query('select * from gostos where user_id = '.$user['id_user'].' inner join publicacoes on gostos.publicacao_id = publicacao.publicacao_id');

$saved = $conn->query('select * from guardados where user_id = '.$user['id_user'].' inner join publicacoes on guardados.publicacao_id = publicacao.publicacao_id');

?>


<?php

foreach ($liked as $pub){

}


foreach ($saved as $pub){

}


?>


