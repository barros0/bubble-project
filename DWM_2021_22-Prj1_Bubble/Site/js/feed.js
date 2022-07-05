$(document).ready(function () {
  $(".remover_publicacao").click(function () {
    var a = $(this).children(".popup_remover_partilhar");

    if (a.css("display") == "none") {
      a.slideDown();
    } else {
      a.slideUp();
    }
  });
});

$(document).ready(function () {
  $(".partilhar").click(function () {
    var copyText = $(this).children(".publicacao_copiar").val();
    var mudar = $(this).children(".mudar_copiado").text();
var mudar_text = $(this).children(".mudar_copiado");
    if (mudar == "Partilhar") {
      $(this).children(".mudar_copiado").text("Copiado");

      setTimeout(function () {
        change();
      }, 200);
      
      function change() {
        mudar_text.text("Partilhar");
      }
      navigator.clipboard.writeText(copyText);
    }
  });
});
