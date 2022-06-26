$(document).ready(function () {
  $("#button_editar").click(function () {
    var form = $("#form_editar_perfil").css("display");

    if (form == "none") {
      $("#form_editar_perfil").slideDown();
    } else {
      $("#form_editar_perfil").fadeOut();
    }
  });
});

$(document).ready(function () {
  $("#fechar_modal_editar").click(function () {
    $("#form_editar_perfil").css("display", "none");
  });
});
