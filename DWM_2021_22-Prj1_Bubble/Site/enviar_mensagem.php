<?php
require('./bd.php');
session_start();

//buscar id do utilizador logado
$id_user = $_SESSION['user']['id_user'];

//buscar o user destinatario
$destinatario = $_GET['to_user'];

//buscar a mensagem
$mensagem = $_POST['mensagem'];

//estado default da mensagem
$estado = 1;

if (isset($_POST['mensagem'])) {

    //verifica se o campo está preenchido
    if (empty($_POST['mensagem'])) {

        array_push($_SESSION['alerts']['errors'], 'Não pode enviar uma mensagem vazia');
        header('location:./mensagens.php?id_user_msg='.$destinatario.'');

    }

//executar a query    
$query = $conn->prepare("INSERT INTO mensagens (from_id_user, to_id_user, mensagem, estado) VALUES (?, ?, ?, ?)");
$query->bind_param("iisi", $id_user, $destinatario, $mensagem, $estado);
$query->execute();
$query->close();

//para efeitos de teste
echo 'Enviado com Sucesso';
//voltar a conversa
header('location:./mensagens.php?id_user_msg='.$destinatario.'');

}

?>