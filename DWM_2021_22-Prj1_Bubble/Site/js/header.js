$(document).ready(function () {
  /*MODAL PERFIL */
  $(".icon_perfil").click(function () {
    var a = $(".popup_perfil").css("display");
    $(".searchbar_icon").css("color", "#bdbdbd");
    $(".plus_icon").css("color", "#bdbdbd");

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

  /*SEARCHBAR MODAL */
  $("#searchbar").click(function () {
    var a = $(".popup_searchbar").css("display");
    $(".plus_icon").css("color", "#bdbdbd");
    if (a == "none") {
      $(".popup_searchbar").slideDown({
        start: function () {
          $(this).css({
            display: "flex",
          });
        },
      });

      $(".popup_searchbar").slideDown();
      $(".searchbar_icon").css("color", "#00ff8a");
      $(".popup_perfil").slideUp();
      $(".perfil").css("color", "#bdbdbd");
      $(".modal_make_post").slideUp();
    } else {
      $(".popup_searchbar").slideUp();
      $(".searchbar_icon").css("color", "#bdbdbd");
    }
  });

  /*NAV BAR BUTTON POST */
  $("#button_post").click(function () {
    var a = $(".modal_make_post").css("display");
    $(".searchbar_icon").css("color", "#bdbdbd");

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
      $(".perfil").css("color", "#bdbdbd");
      $(".plus_icon").css("color", "#00ff8a");
    } else {
      $(".modal_make_post").slideUp();
      $(".plus_icon").css("color", "#bdbdbd");
    }
  });

  /*BUTTON "CRIA O TEU POST" */
  $(".create_post_button").click(function () {
    var a = $(".modal_make_post").css("display");
    $(".searchbar_icon").css("color", "#bdbdbd");
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
      $(".perfil").css("color", "#bdbdbd");
      $(".plus_icon").css("color", "#00ff8a");
    } else {
      $(".modal_make_post").slideUp();
      $(".plus_icon").css("color", "#bdbdbd");
    }
  });
});
