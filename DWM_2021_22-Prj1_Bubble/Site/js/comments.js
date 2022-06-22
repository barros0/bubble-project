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
    let sec = $(this).parent().next(".comment_section");

    if (sec.css("display") == "none") {
      sec.slideDown();
    } else {
      sec.slideUp();
    }
  });
});
