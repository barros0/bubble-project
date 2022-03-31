$(document).ready(function () {
  $(".icon_perfil").click(function () {
    var a = $(".popup_perfil").css("display");

    if (a == "none") {
      $(".popup_perfil").slideDown();
      $(".popup_searchbar").slideUp();
      $(".modal_make_post").slideUp();
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
      $(".popup_perfil").slideUp();
      $(".modal_make_post").slideUp();
    } else {
      $(".popup_searchbar").slideUp();
    }
  });

  $("#button_post").click(function () {
    var a = $(".modal_make_post").css("display");

    if (a == "none") {
      $(".modal_make_post").slideDown({
        start: function () {
          $(this).css({
            display: "flex",
          });
        },
      });

      $(".popup_searchbar").slideUp();
      $(".modal_make_post").slideDown();
      $(".popup_perfil").slideUp();
    } else {
      $(".modal_make_post").slideUp();
    }
  });
});
