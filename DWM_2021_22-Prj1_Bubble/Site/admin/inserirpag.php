<?php
require('./partials/db_con.php');
session_start();

//verificar se os campos estao preenchidos
if (isset($_POST['nome']) && isset($_POST['caminho'])) {

  if (empty($_POST['nome']) || empty($_POST['caminho'])) {

    echo 'Erro, nada preenchido';

  } else {

    //preparar o statement
    $stmt = $conn->prepare("INSERT INTO paginas_site (nomepagina, urlpagina) VALUES (?, ?)");
    $stmt->bind_param("ss", $nomepagina, $urlpagina);

    //definir as variaveis e executar
    $nomepagina = $_POST['nome'];
    $urlpagina = $_POST['caminho'];

    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();

    $idpag = (mysqli_insert_id($conn)); //Buscar o ID da pagina acabada de ser criada


    //inserir ficheiros CSS

    $count = count($_POST["caminhoCSS"]);
    $ficheiroCSS = $_POST['caminhoCSS'];

    if($count > 1) {

   for($i=0; $i<$count; $i++) {

        if(trim($_POST["caminhoCSS"][$i] != '')){

            $insereCSS = $conn->prepare("INSERT INTO files_css_paginas_site (id_pagina, ficheirocss) VALUES (?, ?)");
            $insereCSS->bind_param("is", $idpag, $ficheiroCSS[$i]);
            $insereCSS->execute();

            $insereCSS->close();

		}
	}

        echo "CSS Inserido com Sucesso";

    }else{

    echo "CSS Não Inserido";
    
    }

    //inserir ficheiros JS

        $countJS = count($_POST["caminhoJS"]);
        $ficheiroJS = $_POST['caminhoJS'];
    
        if($countJS > 1) {
    
       for($i=0; $i<$countJS; $i++) {
    
            if(trim($_POST["caminhoCSS"][$i] != '')){
    
                $insereJS = $conn->prepare("INSERT INTO files_js_paginas_site (id_pagina, ficheirojs) VALUES (?, ?)");
                $insereJS->bind_param("is", $idpag, $ficheiroJS[$i]);
                $insereJS->execute();
    
                $insereJS->close();
    
            }
        }
    
            echo "JS Inserido com Sucesso";
    
        }else{
    
        echo "JS Não Inserido";
        
        }

    $conn->close();
  }

}

array_push($_SESSION['alerts']['success'], 'Página inserida com sucesso!');
header('location:./paginas.php');
