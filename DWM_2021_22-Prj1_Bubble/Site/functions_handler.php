<?php

include './bd.php';


// query completa $notificacao
function notificacao_handler($notificacao, $conn)
{
    $type = $notificacao['tipo'];
    $idnotificacao = $notificacao['id_notificacao'];

    switch ($type) {
        case 1:
            $gosto = $conn->query("Select * from notificacoes_gosto where id_notificacao = '" . $idnotificacao . "'")->fetch_assoc();

            $pub_gosto = $conn->query("Select * from gostos where gosto_id = '" . $gosto['id_gosto'] . "'")->fetch_assoc();

            $publicacao = $conn->query("Select * from publicacoes where publicacao_id = '" . $pub_gosto['publicacao_id'] . "'")->fetch_assoc();

            $user = $conn->query("Select * from users where id_user = '" . $pub_gosto['user_id'] . "'")->fetch_assoc();

            $titulo = "<a href='/user?id=" . $user['id_user'] . "'>" . $user['nome'] . "</a> deu gosto da tua <a href='/publicacao?id=" . $publicacao['publicacao_id'] . "'>publicação</a>";
            $descricao = "Descricao";

            return [
                'titulo' => $titulo,
                'descricao' => $descricao,
            ];
        case 2:
            $notif_comentario = $conn->query("Select * from notificacoes_comentario where id_notificacao = '" . $idnotificacao . "'")->fetch_assoc();

            $comentario = $conn->query("Select * from comentarios where comentario_id = '" . $notif_comentario['id_comentario'] . "'")->fetch_assoc();

            $publicacao = $conn->query("Select * from publicacoes where publicacao_id = '" . $comentario['publicacao_id'] . "'")->fetch_assoc();

            $user = $conn->query("Select * from users where id_user = '" . $publicacao['user_id'] . "'")->fetch_assoc();

            $titulo = "<a href='/user?id=" . $user['id_user'] . "'>" . $user['nome'] . "</a> comentou a tua publicação <a href='/publicacao?id=" . $publicacao['publicacao_id'] . "'> publicação</a>";
            $descricao = "Descricao";

            return [
                'titulo' => $titulo,
                'descricao' => $descricao,
            ];

        case 3:
            $notif_mensagem = $conn->query("Select * from notificacoes_mensagem where id_notificacao = '" . $idnotificacao . "'")->fetch_assoc();

            $mensagem = $conn->query("Select * from mensagens where id_mensagem = '" . $notif_mensagem['id_mensagem'] . "'")->fetch_assoc();

            $user = $conn->query("Select * from users where id_user = '" . $mensagem['from_id_user'] . "'")->fetch_assoc();

            $titulo = "<a href='/user?id=" . $user['id_user'] . "'>" . $user['nome'] . "</a> enviou-te uma <a href='/mensagens?id=" . $mensagem['id_mensagem'] . "'>mensagem</a>";
            $descricao = "Descricao";

            return [
                'titulo' => $titulo,
                'descricao' => $descricao,
            ];

            break;

        default:
            break;
    }


}

function publicacao_gostos($publicacao, $conn)
{
    return $ngostos = $conn->query('select count(DISTINCT(user_id)) from gostos where publicacao_id =' . $publicacao['publicacao_id'] . ' and estado = 1 and gosto = 1');
}






/* $query = "Select * from notificacoes_gosto where id_notificacao ='" . $id . "' INNER  join
            gostos ON notificacoes_gosto.id_gosto = gostos.gosto_id INNER join
            publicacoes ON gostos.publicacao_id = publicacoes.publicacao_id;
            ";
                      $result = $conn->query($query);
          */