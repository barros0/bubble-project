<?php

include 'page_parts/header.php';

include 'page_parts/left.php';

//buscar detalhes na base de dados
$query = 'SELECT * FROM faqs';
$lista_faqs = $conn->query($query);

?>

<div class="wrap-conteudo">
  <div class="conteudo">
    <div class="caixa-pesquisa">
      <form class="form-pesquisa" action="#" method="POST">
        <div class="fundo-pesquisa"><input class="pesquisa" type="search" placeholder="Pesquisar..." name="search"></div>
      </form>
    </div>

    <div class="wrap-acordiao">

      <?php

      while ($row = $lista_faqs->fetch_assoc()) {

        //buscar dados
        $row['id_faq'];
        $row['pergunta'];
        $row['resposta'];

        echo '<div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            ' .$row['pergunta']. '
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
          ' .$row['resposta']. '
          </div>
        </div>
      </div>';


      }

      ?>

<div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            Accordion Item #1
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>


    </div>

  </div>
</div>

<?php include 'page_parts/footer.php'; ?>