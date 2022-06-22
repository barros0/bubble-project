$(document).ready(function () {
    $(".button_adicionar").click(function () {
      let form = $(".form_inserir_pags").css("display");
  
      if (form == "none") {
        $(".form_inserir_pags").css("display", "flex");
      } else {
        $(".form_inserir_pags").css("display", "none");
      }
    });
  });
  
  $(document).ready(function () {
    $("#fechar_modal_pag").click(function () {
      let form = $(".form_inserir_pags").css("display");
  
      if (form == "none") {
        $(".form_inserir_pags").css("display", "flex");
      } else {
        $(".form_inserir_pags").css("display", "none");
      }
    });
  });
  
  /*inserir mais campos para ficheiros css */

  $(document).ready(function () {

    let cont = 1;

    $("#inserirCSS").click(function(){

      cont++;

      let novoCSS = '<div class="form-group"> <label for="caminhoCSS">URL CSS Nº ' + cont + ' (ex: css/feed.css) </label> <input type="text" name="caminhoCSS[]" id="caminhoCSS" class="form-control" required> <a class="btn btn-danger remove_item_btn" href="#">X</a> </div>';

      $("#novoCSS").append(novoCSS);

    });

  });

  /*inserir mais campos para ficheiros js */

  $(document).ready(function () {

    let contJS = 1;

    $("#inserirJS").click(function(){

      contJS++;

      let novoJS = '<div class="form-group"> <label for="caminhoJS">URL JavaScript Nº ' +contJS+ ' (ex: js/feed.js) </label> <input type="text" name="caminhoJS[]" id="caminhoJS" class="form-control" required> <a class="btn btn-danger remove_item_btn" href="#">X</a> </div>';

      $("#novoJS").append(novoJS);

    });

  });

  /*inserir mais campos para ficheiros css no edit*/

  $(document).ready(function () {

    let cont = 1;

    $("#inserirCSSEdit").click(function(){

      cont++;

      let novoCSSEdit = '<div class="form-group"> <label for="caminhoCSS">URL CSS Nº ' + cont + ' (ex: css/feed.css) </label> <input type="text" name="caminhoCSSEdit[]" id="ficheirocssEdit" class="form-control" required> <a class="btn btn-danger remove_item_btn" href="#">X</a> </div>';

      $("#novoCSSEdit").append(novoCSSEdit);

    });

  });

  /*inserir mais campos para ficheiros js no edit*/

  $(document).ready(function () {

    let contJS = 1;

    $("#inserirJSEdit").click(function(){

      contJS++;

      let novoJSEdit = '<div class="form-group"> <label for="caminhoJS">URL JavaScript Nº ' +contJS+ ' (ex: js/feed.js) </label> <input type="text" name="caminhoJSEdit[]" id="ficheirojsEdit" class="form-control" required> <a class="btn btn-danger remove_item_btn" href="#">X</a> </div>';

      $("#novoJSEdit").append(novoJSEdit);

    });

  });

  //opcao de poder apagar campo para novo ficheiro css/js ao introduzir novos

  $(document).on('click', '.remove_item_btn', function(e){

    e.preventDefault();
    let row_item = $(this).parent();
    $(row_item).remove();


  });


  /*falta validacao formulario */
