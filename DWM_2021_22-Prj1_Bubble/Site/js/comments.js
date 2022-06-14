$(document).ready(function () {
  $(".comment_textarea").each(function () {
    $(this).keyup(function () {
      var len = $(this).val().length;
      $(".current_chars").text(len);
    });
  });
});

$(document).ready(function () {
  $(".comment").click(function () {
    var a = $(".comment_section").css("display");
    var b = $(".comment_user").css("display");

    if (a == "none" && b == "none") {
      $(".comment_section").slideDown();
      $(".comment_user").slideDown();
    } else {
      $(".comment_section").slideUp();
      $(".comment_user").slideUp();
    }
  });
});
