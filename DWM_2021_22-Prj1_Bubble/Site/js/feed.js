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
    navigator.clipboard.writeText(copyText);
  });
});
