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

$(document).ready(function () {
  $("#posts").click(function () {
    $(".perfil_esquerda_baixo").css("display", "none");
    $(".posts_user").css("display", "block");
    $("#sobre").css("color", "white");
    $("#sobre").css("border-bottom-color", "transparent");
    $("#posts").css("color", "#00ff8a");
    $("#posts").css("border-bottom-color", "#00ff8a");
  });
});

$(document).ready(function () {
  $("#sobre").click(function () {
    $(".perfil_esquerda_baixo").css("display", "block");
    $(".posts_user").css("display", "none");
    $("#posts").css("color", "white");
    $("#posts").css("border-bottom-color", "transparent");
    $("#sobre").css("color", "#00ff8a");
    $("#sobre").css("border-bottom-color", "#00ff8a");
  });
});
