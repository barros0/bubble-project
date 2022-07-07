<?php
require('./bd.php');
session_start();


if(isset($_REQUEST["term"])){
    // preparar statement
    $sql = "SELECT * FROM users WHERE nome LIKE ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        $param_term = $_REQUEST["term"] . '%';
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            //verificar quantos resultados tem
            if(mysqli_num_rows($result) > 0){
                
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    echo "<div class='wrap-pessoa'> <div class='resultado'> <div class='foto-perfil-container'> <div class='foto-perfil'> <img src='./img/fotos_perfil/" . $row['profile_image'] . "' alt=" . $row['username'] ."></div> </div> <div class='d-flex flex-column'> <p class='usernamepesq'> <a class='user-lateral' href='./mensagens.php?id_user_msg=". $row['id_user'] . "' >" . $row["nome"] . "</p></a></div></div></div>";
                
                }
            } else{
                echo "<p>Sem resultados</p>";
            }
        } else{
            echo "ERRO: $sql. " . mysqli_error($link);
        }
    }
     
    // fechar conexao
    mysqli_stmt_close($stmt);
}