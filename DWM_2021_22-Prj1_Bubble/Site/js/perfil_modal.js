$(document).ready(function () {
  $("#button_editar").click(function () {
    var form = $("#form_editar_perfil").css("display");

    if (form == "none") {
      $("#form_editar_perfil").css("display", "block");
    } else {
      $("#form_editar_perfil").css("display", "none");
    }
  });
});
