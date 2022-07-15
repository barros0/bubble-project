<?php

require 'bd.php';
session_start();

// verifica se existe token na url senao redireciona simplemsente pra o login como se a pagina nao existisse
if (isset($_GET['token'])) {

    /// verifica o token se existe algum user com esse
    $user_s = $conn->prepare("select * from users where vkey = ?");
    $user_s->bind_param("s", $_GET['token']);
    $user_s->execute();
    $user = $user_s->get_result()->fetch_assoc();
    $user_s->close();

    $estado = 2;
    // verifica se o user existe se existir faz
    if (!empty($user)) {
        // atualiza o estado do user para 2 - ativo
        $user_update = $conn->prepare("UPDATE users SET estado = ? WHERE  id_user = ?");
        $user_update->bind_param("ii", $estado, $user['id_user']);
        $user_update->execute();

        // apaga a key de verificacao por seguranca uma vez que a conta ja foi verifica e o utilizador nao ative novamente mais tarde sem permicao
        $delete_user_token = $conn->prepare("UPDATE users SET vkey = null WHERE id_user = ?");
        $delete_user_token->bind_param("i", $user['id_user']);
        $delete_user_token->execute();

        // da o alerta que foi ativa a conta
        array_push($_SESSION['alerts']['success'], 'O seu e-mail foi confirmado, faça login e seja bem-vindo!');
        // manda po login
        header('Location: ./login.php');
        exit;
    }
    // se nao exisitr manda po login e diz que é link invalido
    else {
        array_push($_SESSION['alerts']['errors'], 'Link para confirmação de conta inválido!');
        header('Location: ./login.php');
        exit;
    }
} else {
    header('Location: ./login.php');
    exit;
}
