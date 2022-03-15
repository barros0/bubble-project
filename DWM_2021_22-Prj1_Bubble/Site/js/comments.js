$(document).ready(function () {
  $(".comment_textarea").each(function () {
    $(this).keyup(function () {
      var len = $(this).val().length;
      $(".current_chars").text(len);
    });
  });
});
