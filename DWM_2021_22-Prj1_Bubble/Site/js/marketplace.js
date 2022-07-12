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

$(document).ready(function () {
  $(".input_seach_marketplace").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".titulo").filter(function () {
      $(this)
        .parent()
        .parent()
        .parent()
        .toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});
