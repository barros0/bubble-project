$(document).ready(function () {
  $("#button_modal_eventos").click(function () {
    var form = $("#form").css("display");

    if (form == "none") {
      $("#form").css("display", "flex");
    } else {
      $("#form").css("display", "none");
    }
  });
});

$(document).ready(function () {
  $("#fechar_modal_evento").click(function () {
    $("#form").css("display", "none");
  });
});
