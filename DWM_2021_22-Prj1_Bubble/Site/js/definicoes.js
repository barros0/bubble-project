$(document).ready(function () {
  $(".campoone").click(function () {
    var nome = $(".atualizar_nome").css("display");

    if (nome == "none") {
      $(".atualizar_nome").slideDown();
    } else {
      $(".atualizar_nome").slideUp();
    }
  });
});

$(document).ready(function () {
  $(".campotwo").click(function () {
    var nome = $(".atualizar_username").css("display");

    if (nome == "none") {
      $(".atualizar_username").slideDown();
    } else {
      $(".atualizar_username").slideUp();
    }
  });
});

$(document).ready(function () {
  $(".campothree").click(function () {
    var nome = $(".atualizar_email").css("display");

    if (nome == "none") {
      $(".atualizar_email").slideDown();
    } else {
      $(".atualizar_email").slideUp();
    }
  });
});