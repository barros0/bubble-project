<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

//buscar detalhes na base de dados
$query = 'SELECT * FROM faqs';
$lista_faqs = $conn->query($query);

?>

<div class="wrap-conteudo">
  <div class="conteudo">


    <div class="wrap-acordiao">

      <?php

      while ($row = $lista_faqs->fetch_assoc()) {

        //buscar dados
        $valorID = $row['id_faq'];
        $row['pergunta'];
        $row['resposta'];

        /*
        $ids = explode(" ", $valorID); //separar os ids para poder comparar 

        //gerar acordiao

        echo $valorID;
        echo $ids;
*/
        //primeira pergunta vir por defeito aberta

        //colocar sempre a que tem o id menor como a primeira pergunta
   /*     if (array_keys($ids, min($ids)) < $row['id_faq']) {*/

    if ($row['id_faq'] == 1) {

          echo '<div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-heading' . $row['id_faq'] . '">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse' . $row['id_faq'] . '" aria-expanded="true" aria-controls="panelsStayOpen-collapse' . $row['id_faq'] . '">
              ' . $row['pergunta'] . '
            </button>
          </h2>
          <div id="panelsStayOpen-collapse' . $row['id_faq'] . '" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading' . $row['id_faq'] . '">
            <div class="accordion-body">
            ' . $row['resposta'] . '
            </div>
          </div>
        </div>';

        } else {

          echo '<div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-heading' . $row['id_faq'] . '">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse' . $row['id_faq'] . '" aria-expanded="false" aria-controls="panelsStayOpen-collapse' . $row['id_faq'] . '">
              ' . $row['pergunta'] . '
            </button>
          </h2>
          <div id="panelsStayOpen-collapse' . $row['id_faq'] . '" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading' . $row['id_faq'] . '">
            <div class="accordion-body">
            ' . $row['resposta'] . '
            </div>
          </div>
        </div>';
        }
      }

      ?>

    </div>

  </div>
</div>

<?php include 'page_parts/footer.php'; ?>