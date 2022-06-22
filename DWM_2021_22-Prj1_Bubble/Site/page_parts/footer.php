<footer>

</footer>

<!--Scripts Gerais-->
<script src="https://kit.fontawesome.com/27dd9727ef.js" crossorigin="anonymous"></script>
<script src="js/header.js"></script>

<?php

$pags = $conn->query('SELECT * FROM paginas_site');

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

//mudar o javascript da pagina dinamicamente

while ($row = $pags->fetch_assoc()) {

    $row['id_pag'];
    $urlpag = $row['urlpagina'];
    $nomepag = $row['nomepagina'];

    //buscar ficheiros js associados
    $js = $conn->query('SELECT * FROM files_js_paginas_site WHERE id_pagina = ' . $row['id_pag'] );

    if (strpos($url, $urlpag) !== false) {

        while ($rowjs = $js->fetch_assoc()) {

            $jspag = $rowjs['ficheirojs'];

            ?>  
            <!--Ficheiros JS específicos da páginas-->
             <script src="<?php echo $jspag ?>"></script>


            <?php

        }

?>

<?php

    } else {
        
      
    }
}

?>

</body>

</html>