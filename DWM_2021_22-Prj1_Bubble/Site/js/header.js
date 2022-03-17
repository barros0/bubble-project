$(document).ready(function () {
  $(".icon_perfil").click(function () {
    var a = $(".popup_perfil").css("display");

    if (a == "none") {
      $(".popup_perfil").slideDown();
      $(".perfil").css("color", "#00ff8a");
    } else {
      $(".popup_perfil").slideUp();
      $(".perfil").css("color", "#bdbdbd");
    }
  });

  $("#searchbar").click(function () {
    var a = $(".popup_searchbar").css("display");

    if (a == "none") {
      $(".popup_searchbar").slideDown({
        start: function () {
          $(this).css({
            display: "flex",
          });
        },
      });
      $(".popup_searchbar").slideDown();
    } else {
      $(".popup_searchbar").slideUp();
    }
  });
});
