$(document).ready(function () {
  $("#btn-pesq").click(function () {
    var $display = $("#pesquisa-fixed").css("display");
    if ($display == "block") {
      $("#pesquisa-fixed").slideUp();
    } else {
      $("#pesquisa-fixed").slideDown();
    }
  });
});
