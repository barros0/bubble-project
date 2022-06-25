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

function addgosto($publicacaoid, $userid){

    // cria notificacao
    $conn->query('insert into notificacoes (id_utilizador, tipo) values('.$userid.', 1)');
// obtem o seu id
    $notificaoca_id = mysqli_insert_id($conn);
// cria o gosto na pub pelo utilizador
    $conn->query('insert into gostos (user_id, publicacao_id, gosto, estado) values('.$userid.','.$publicacaoid.' 1, 1)');
    // obtem o id
    $gosto_id = mysqli_insert_id($conn);
//interliga a noitifcacao ao gosto
    $conn->query('insert into notificacoes_gosto (id_notificacao,id_gosto) values('.$notificaoca_id.','.$gosto_id.' )');
}




function addcomentario($publicacaoid, $userid, $comentario){
    // cria notificacao
    $conn->query('insert into comentarios (user_id,comentario, publicacao_id, estado) values('.$userid.','.$comentario.','.$publicacaoid.',1)');
// obtem o seu id
    $comentario_id = mysqli_insert_id($conn);
// cria o gosto na pub pelo utilizador
    $conn->query('insert into gostos (user_id, publicacao_id, gosto, estado) values('.$userid.','.$publicacaoid.' 1, 1)');
    // obtem o id
    $gosto_id = mysqli_insert_id($conn);
//interliga a noitifcacao ao gosto
    $conn->query('insert into notificacoes_gosto (id_notificacao,id_gosto) values('.$notificaoca_id.','.$gosto_id.' )');
}



function check_guardado($idpub){
    $publicacao_fav_check = $conn->prepare("select * from publicacoes_fav where pub_id = ? and id_user = ?");
    $publicacao_fav_check->bind_param("ii", $idpub, $_SESSION['id_user']);
    $publicacao_fav_check->execute();
    $fav_check = $publicacao_fav_check->get_result();

        if($fav_check->num_rows > 0){
        return true;
        }
        else{
            return false;
        }

}




/* $query = "Select * from notificacoes_gosto where id_notificacao ='" . $id . "' INNER  join
            gostos ON notificacoes_gosto.id_gosto = gostos.gosto_id INNER join
            publicacoes ON gostos.publicacao_id = publicacoes.publicacao_id;
            ";
                      $result = $conn->query($query);
          */