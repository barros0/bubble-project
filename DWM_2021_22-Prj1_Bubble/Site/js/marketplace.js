$(document).ready(function () {
  $("#button_modal_marketplace").click(function () {
    var form = $("#form").css("display");

    if (form == "none") {
      $("#form").css("display", "flex");
    } else {
      $("#form").css("display", "none");
    }
  });
});

$(document).ready(function () {
  $("#fechar_modal_market").click(function () {
    $("#form").css("display", "none");
  });
});
