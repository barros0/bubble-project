$(document).ready(function () {
  $("#3dots").click(function () {
    var a = $(".popup_remover").css("display");

    if (a == "none") {
      $(".popup_remover").slideDown();
    } else {
      $(".popup_remover").slideUp();
    }
  });
});
