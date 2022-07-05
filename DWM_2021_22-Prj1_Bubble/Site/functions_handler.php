<?php




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

            $user = $conn->query("Select * from users where id_user = '" . $notificacao['user_id'] . "'")->fetch_assoc();


            $titulo = "<a href='./perfil.php?username=" . $user['username'] . "'>" . $user['nome'] . "</a> deu gosto da tua <a href='/publicacao?id=" . $publicacao['publicacao_id'] . "'>publicação</a>";
            $descricao = "Descricao";

            return [
                'titulo' => $titulo,
                'img' => 'img/fotos_perfil/'.$user['profile_image'],
                'descricao' => $descricao,
            ];
        case 2:
            $notif_comentario = $conn->query("Select * from notificacoes_comentario where id_notificacao = '" . $idnotificacao . "'")->fetch_assoc();

            $comentario = $conn->query("Select * from comentarios where comentario_id = '" . $notif_comentario['id_comentario'] . "'")->fetch_assoc();

            $publicacao = $conn->query("Select * from publicacoes where publicacao_id = '" . $comentario['publicacao_id'] . "'")->fetch_assoc();

            $user = $conn->query("select * from users where id_user = '" . $notificacao['id_utilizador'] . "'")->fetch_assoc();



            $titulo = "<a href='./perfil.php?username=" . $user['username'] . "'>" . $user['nome'] . "</a> comentou a tua publicação <a href='/publicacao?id=" . $publicacao['publicacao_id'] . "'> publicação</a>";

            return [
                'titulo' => $titulo,
                'img' => 'img/fotos_perfil/'.$user['profile_image'],
                'descricao' => $user['nome'].' comentou: "'.$comentario['comentario'].'"',
            ];

        case 3:
            $notif_mensagem = $conn->query("Select * from notificacoes_mensagem where id_notificacao = '" . $idnotificacao . "'")->fetch_assoc();

            $mensagem = $conn->query("Select * from mensagens where id_mensagem = '" . $notif_mensagem['id_mensagem'] . "'")->fetch_assoc();

            $user = $conn->query("Select * from users where id_user = '" . $mensagem['from_id_user'] . "'")->fetch_assoc();

            $titulo = "<a href='./perfil.php?username=" . $user['username']  . "'>" . $user['nome'] . "</a> enviou-te uma <a href='/mensagens?id=" . $mensagem['id_mensagem'] . "'>mensagem</a>";
            $descricao = "Descricao";

            return [
                'titulo' => $titulo,
                'img' => 'img/fotos_perfil/'.$user['profile_image'],
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

function notf_comentario($tipo,$iduser_para, $comentarioid, $conn){

    $notf = $conn->prepare("INSERT INTO notificacoes (id_utilizador,tipo) VALUES(?,?)");
    $notf->bind_param('ii', $iduser_para, $tipo);
    $notf->execute();
    $notf->close();

    $id_notificacao = mysqli_insert_id($conn);


    $notf = $conn->prepare("INSERT INTO notificacoes_comentario (id_notificacao,id_comentario) VALUES(?,?)");
    $notf->bind_param('ii', $id_notificacao, $comentarioid);
    $notf->execute();
    $notf->close();
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