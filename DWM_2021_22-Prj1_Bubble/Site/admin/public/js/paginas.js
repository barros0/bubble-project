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

      let novoCSS = ' <label for="caminhoCSS">URL CSS Nº ' + cont + ' (ex: css/feed.css) </label> <input type="text" name="caminhoCSS[]" id="caminhoCSS" class="form-control" required>';

      $("#novoCSS").append(novoCSS);

    });

  });

  /*inserir mais campos para ficheiros js */

  $(document).ready(function () {

    let contJS = 1;

    $("#inserirJS").click(function(){

      contJS++;

      let novoJS = ' <label for="caminhoJS">URL JavaScript Nº ' +contJS+ ' (ex: js/feed.js) </label> <input type="text" name="caminhoJS[]" id="caminhoJS" class="form-control">';

      $("#novoJS").append(novoJS);

    });

  });

  /*inserir mais campos para ficheiros css no edit*/

  $(document).ready(function () {

    let cont = 1;

    $("#inserirCSSEdit").click(function(){

      cont++;

      let novoCSSEdit = ' <label for="caminhoCSS">URL CSS Nº ' + cont + ' (ex: css/feed.css) </label> <input type="text" name="caminhoCSS[]" id="ficheirocss" class="form-control" required>';

      $("#novoCSSEdit").append(novoCSSEdit);

    });

  });

  /*inserir mais campos para ficheiros js no edit*/

  $(document).ready(function () {

    let contJS = 1;

    $("#inserirJSEdit").click(function(){

      contJS++;

      let novoJSEdit = ' <label for="caminhoJS">URL JavaScript Nº ' +contJS+ ' (ex: js/feed.js) </label> <input type="text" name="caminhoJS[]" id="ficheirojs" class="form-control">';

      $("#novoJSEdit").append(novoJSEdit);

    });

  });



  /*falta validacao formulario */
