<?php

include './bd.php';
session_start();


function notificacao_create($notificacao, $conn)
{

    $type = $notificacao['tipo'];
    $idnotificacao = $notificacao['id_notificacao'];

    switch ($type) {
        case 1:
           /* $query = "Select * from notificacoes_gosto where id_notificacao ='" . $id . "' INNER  join
             gostos ON notificacoes_gosto.id_gosto = gostos.gosto_id INNER join 
             publicacoes ON gostos.publicacao_id = publicacoes.publicacao_id;
             ";
                       $result = $conn->query($query);
           */
            $gosto = $conn->query("Select * from notificacoes_gosto where id_notificacao = '".$idnotificacao."'")->fetch_assoc();

            $pub_gosto = $conn->query("Select * from gostos where gosto_id = '".$gosto['id_gosto']."'")->fetch_assoc();

            $publicacao = $conn->query("Select * from publicacoes where publicacao_id = '".$pub_gosto['publicacao_id']."'")->fetch_assoc();


            $user = $conn->query("Select * from users where id_user = '".$pub_gosto['user_id']."'")->fetch_assoc();


            $titulo = "<a href='/user?id=" . $user['id_user'] . "'>" . $user['nome'] . "</a> deu gosto na tua <a href='/publicacao?id=" . $publicacao['publicacao_id'] . "'>" . $user['nome'] . "</a>";
            print ($titulo);
            break;

        case 2:

            break;

        case 3:

            break;

        default:
            break;
    }


}

$q = "select * from notificacoes where id_notificacao = 1";
$nt = $conn->query($q);

notificacao_create($nt->fetch_assoc(), $conn);
exit;