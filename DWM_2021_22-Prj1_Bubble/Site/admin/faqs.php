
<?php
include('./partials/header.php');

?>


<div id="container-faqs" class="container-faqs s-container">
    <form class="form-control" name="inserirFAQ" method="post" action="inserefaq.php">

        <div class="title">
            <h2>Inserir novo FAQ</h2>
        </div>
        <div class="form-group">
            <label for="Pergunta">Pergunta </label>
            <input type="text" name="Pergunta" id="Pergunta" class="form-control">
        </div>

        <div class="form-group">
            <label for="Resposta">Resposta </label>
            <input type="text" name="Resposta" id="Resposta" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>

    </form>

</div>

<?php
include('./partials/footer.php');

?>