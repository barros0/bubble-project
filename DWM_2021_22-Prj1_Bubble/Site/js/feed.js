$(document).ready(function () {
  $(".remover_publicacao").click(function () {
    var a = $(".popup_remover_partilhar").css("display");

    if (a == "none") {
      $(".popup_remover_partilhar").slideDown();
    } else {
      $(".popup_remover_partilhar").slideUp();
    }
  });
});
