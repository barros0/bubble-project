<?php

require "./partials/db_con.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();

}

// para apagar uma pagina, url leva ?delete_idpag
if (isset($_GET['delete_idpag'])) {

    $pag = $conn->query('SELECT * FROM paginas_site WHERE id_pag =' . $_GET['delete_idpag'])->fetch_assoc();

    if (empty($pag)) {
        array_push($_SESSION['alerts']['errors'], 'Esta Página não existe!');
        header('location:./paginas.php');
    }

    $conn->query('DELETE FROM paginas_site WHERE id_pag= ' . $_GET['delete_idpag']);
    $conn->query('DELETE FROM files_css_paginas_site WHERE id_pagina = ' . $_GET['delete_idpag']);
    $conn->query('DELETE FROM files_js_paginas_site WHERE id_pagina = ' . $_GET['delete_idpag']);
    
    $conn->close();
    array_push($_SESSION['alerts']['alert'], 'Dados da página eliminados com sucesso!');
   header('location:./paginas.php');
    exit;
}

//atualizar dados de uma página

if (isset($_GET['idpag'])) {

    $id_pag = $_GET['idpag'];

    $pagina = $conn->query('SELECT * FROM paginas_site WHERE id_pag = ' . $id_pag)->fetch_assoc();

    if (isset($pagina)) {

    //preparar o statement
    $stmt = $conn->prepare("UPDATE paginas_site SET nomepagina=?, urlpagina=? WHERE id_pag=?");
    $stmt->bind_param("ssi", $nomepagina, $urlpagina, $id_pag);

    //definir as variaveis e executar
    $nomepagina = $_POST['nomepagina'];
    $urlpagina = $_POST['urlpagina'];
    $stmt->execute();

    echo "Introduzido com sucesso!";

    //fechar as conexoes
    $stmt->close();

     //inserir ficheiros CSS

    $count = count($_POST["ficheirocss"]);
    $ficheiroCSS = $_POST['ficheirocss'];

    if($count > 1) {

   for($i=0; $i<$count; $i++) {

        if(trim($_POST["ficheirocss"][$i] != '')){

            foreach($_POST['idcss'] as $id_file) {
        
                $insereCSS = $conn->prepare("UPDATE files_css_paginas_site SET ficheirocss=? WHERE id_file=?");
                $insereCSS->bind_param("si", $ficheiroCSS[$i], $id_file);
                $insereCSS->execute();
    
                $insereCSS->close();

            $i++;

            }

		}
	}

        echo "CSS Inserido com Sucesso";

    }else{

    echo "CSS Não Inserido";
    
    }

     //atualizar/inserir ficheiros JS

     $countJS = count($_POST["ficheirojs"]);
     $ficheiroJS = $_POST['ficheirojs'];
 
     if($countJS > 1) {
 
    for($j=0; $j<$countJS; $j++) {
 
         if(trim($_POST["ficheirojs"][$j] != '')){

            foreach($_POST['idjs'] as $id_file) {
 
             $insereJS = $conn->prepare("UPDATE files_js_paginas_site SET ficheirojs=? WHERE id_file=?");
             $insereJS->bind_param("si", $ficheiroJS[$j], $id_file);
             $insereJS->execute();
 
             $insereJS->close();

             $j++;
            }
 
         }
     }
 
         echo "JS Inserido com Sucesso";
 
     }else{
 
     echo "JS Não Inserido";
     
     }

    //fechar conexao
    $conn->close();

        array_push($_SESSION['alerts']['success'], 'Página atualizada com sucesso!');
       header('location:./paginas.php');

        exit;

    } else {

        array_push($_SESSION['alerts']['errors'], 'Esta Página não existe!');
        header('location:./paginas.php');
        exit;

    }
}
