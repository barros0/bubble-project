<?php
require('./bd.php');
session_start();

//verificar se os campos estao preenchidos
if (isset($_POST['titulo']) && isset($_POST['qualificacoes']) && isset($_POST['experiencia']) && isset($_POST['requisitos']) && isset($_POST['vagas']) && isset($_POST['localizacao']) && isset($_POST['horario']) && isset($_POST['tipo']) && isset($_POST['categoria']) && isset($_POST['descricao'])) {

  if (empty($_POST['titulo']) || empty($_POST['qualificacoes']) || empty($_POST['experiencia']) || empty($_POST['requisitos']) || empty($_POST['vagas']) || empty($_POST['localizacao']) || empty($_POST['horario']) || empty($_POST['tipo']) || empty($_POST['categoria']) || empty($_POST['descricao'])) {

    echo 'Erro, nada preenchido';

  } else {


    $id_user = $_SESSION['user']['id_user'];

    //preparar o statement
    $stmt = $conn->prepare("INSERT INTO oferta_emprego (id_user, titulo, qualificacoes, experiencia, requisitos, vagas, localizacao, horario, tipo, categoria, descricao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssisssss", $id_user, $titulo, $qualificacoes, $experiencia, $requisitos, $vagas, $localizacao, $horario, $tipo, $categoria, $descricao);

    //definir as variaveis e executar
    $titulo = $_POST['titulo'];
    $qualificacoes = $_POST['qualificacoes'];
    $experiencia = $_POST['experiencia'];
    $requisitos = $_POST['requisitos'];
    $vagas = $_POST['vagas'];
    $localizacao = $_POST['localizacao'];
    $horario = $_POST['horario'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();

    //ID DO EMPREGO
$idemp = (mysqli_insert_id($conn));

    //IMAGEM DA PUBLICACAO PARA foto_emprego
$imagem = $_FILES['foto_emprego']['name'];
$extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
$folder = "img/empregos/";
$novo_ficheiro = sha1(microtime()) . "." . $extensao; //MUDAR DE NOME DA FOTO

$uploadOk = 1;
$error = "";

if ($imagem != "") {

    // VERIFICAR O TAMANHO DO FICHEIRO

    if ($_FILES["foto_emprego"]["size"] > 10240000) {

        $error = "O seu ficheiro é demasiado grande (MAX: 10MB).";
        echo "Introduzido!";
        $uploadOk = 0;
    }

    // VERIFICAR A EXTENSAO DO FICHEIRO
    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg" && $extensao != "gif") {

        $error = "Só ficheiros JPG, JPEG, PNG & GIF são permitidos.";
        echo "Introduzido com nao!";
        $uploadOk = 0;
    }

    // VER SE HÁ ERRO
    if ($uploadOk == 0) {
        $error = "O seu ficheiro não foi submetido.";
    } else {

        if (move_uploaded_file($_FILES['foto_emprego']['tmp_name'], $folder . $novo_ficheiro)) {

            //preparar o statement
            $foto = $conn->prepare("INSERT INTO foto_emprego (id_emprego, foto) VALUES (?, ?)");
            $foto->bind_param("is", $idemp, $novo_ficheiro);
            $foto->execute();

            echo "Introduzido com sucesso!";

            $foto->close();
            $conn->close();
        }
    }

}

 }

}

//array_push($_SESSION['alerts']['success'], 'Emprego inserido com sucesso!');
header('location:./empregos.php');

?>