<?php
require('./bd.php');
session_start();

// para apagar um emprego, url leva ?delete_empregoid
if (isset($_GET['delete_empregoid'])) {

    $emprego = $conn->query('SELECT * FROM oferta_emprego WHERE id_oferta =' . $_GET['delete_empregoid'])->fetch_assoc();

    if (empty($emprego)) {
        array_push($_SESSION['alerts']['errors'], 'Este Emprego não existe!');
        header('location:./empregos.php');
    }

    $conn->query('DELETE FROM foto_emprego WHERE id_emprego = ' . $_GET['delete_empregoid']);
    $conn->query('DELETE FROM oferta_emprego WHERE id_oferta = ' . $_GET['delete_empregoid']);
    $conn->close();

    array_push($_SESSION['alerts']['alert'], 'Emprego eliminado com sucesso!');
    header('location:./empregosUtilizador.php');
    exit;
}

//atualizar um emprego

if (isset($_GET['empregoid'])) {

    $empregoid = $_GET['empregoid'];

    $emprego = $conn->query('SELECT * FROM oferta_emprego WHERE id_oferta = ' . $empregoid)->fetch_assoc();

    if (isset($emprego)) {

        //preparar o statement
        $stmt = $conn->prepare("UPDATE oferta_emprego SET titulo=?, qualificacoes=?, experiencia=?, requisitos=?, vagas=?, localizacao=?, horario=?, tipo=?, categoria=?, descricao=? WHERE id_oferta=?");
        $stmt->bind_param("ssssisssssi", $titulo, $qualificacoes, $experiencia, $requisitos, $vagas, $localizacao, $horario, $tipo, $categoria, $descricao, $empregoid);

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
        $stmt->close();

        echo "Introduzido com sucesso!";

        $imagem = $_FILES['foto_emprego']['name'];
        $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
        $folder = "img/empregos/";
        $novo_ficheiro = sha1(microtime()) . "." . $extensao; //MUDAR DE NOME DA FOTO

        $uploadOk = 1;
        $error = "";

        $foto = $conn->query('SELECT * FROM foto_emprego WHERE id_emprego = ' . $empregoid)->fetch_assoc();

        if (!empty($foto)) {

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
                        $foto = $conn->prepare("UPDATE foto_emprego SET id_emprego=?, foto=? WHERE id_emprego =" . $empregoid);
                        $foto->bind_param("is", $empregoid, $novo_ficheiro);
                        $foto->execute();
    
                        echo "Introduzido com sucesso!";
    
                        $foto->close();
                    }
                }
            }
  
        } else {

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
                        $foto->bind_param("is", $empregoid, $novo_ficheiro);
                        $foto->execute();
    
                        echo "Introduzido com sucesso!";
    
                        $foto->close();
                    }
                }
            }


        }
    
        //fechar as conexoes
        $conn->close();

        array_push($_SESSION['alerts']['success'], 'Emprego atualizado com sucesso!');
        header('location:./empregosUtilizador.php');

        exit;

    } else {

        array_push($_SESSION['alerts']['errors'], 'Este Emprego não existe!');
        header('location:./empregosUtilizador.php');
        exit;
    }
}
