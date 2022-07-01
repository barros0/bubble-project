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
