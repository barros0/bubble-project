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
