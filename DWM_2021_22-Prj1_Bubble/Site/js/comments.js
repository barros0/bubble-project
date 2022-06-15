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

    var b = $(this).siblings(".comment_user").css("display");

    sec = $(this).parent().next('.comment_section');

    if (sec.css("display") == 'none') {
      $(".comment_section").slideDown();
      $(".comment_user").slideDown();
    } else {
      $(".comment_section").slideUp();
      $(".comment_user").slideUp();
    }
  });
});
