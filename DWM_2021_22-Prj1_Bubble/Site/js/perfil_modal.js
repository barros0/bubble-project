$(document).ready(function () {
  $("#button_editar").click(function () {
    var form = $("#form_editar_perfil").css("display");
    var fechar = $("#fechar_modal_editar").css("display");

    if (form == "none") {
      $("#form_editar_perfil").css("display", "block");
    } else {
      $("#form_editar_perfil").css("display", "none");
    }
  });
});

$(document).ready(function () {
  $("#fechar_modal_editar").click(function () {
    $("#form_editar_perfil").css("display", "none");
  });
});