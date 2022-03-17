$(document).ready(function () {
  $("#like").click(function () {
    let number = $("#number_likes").text();
    classCheck = $("#like").is(".active");

    if (classCheck) {
      $("#like").removeClass("active");
      number--;
      $("#number_likes").text(number);
      $("#liked").remove();
      $("#liked_info").remove();
      $(".post_number_likes_comments").prepend(
        "<i class='bx bx-heart' id='liked'></i>"
      );
      $("#like").prepend("<i class='bx bx-heart' id='liked_info'></i>");
    } else {
      $("#like").addClass("active");
      number++;
      $("#number_likes").text(number);
      $("#liked").remove();
      $("#liked_info").remove();
      $(".post_number_likes_comments").prepend(
        "<i class='bx bxs-heart' id='liked' style='color:#00ff8a' ></i>"
      );
      $("#like").prepend(
        "<i class='bx bxs-heart' id='liked_info' style='color:#00ff8a' ></i>"
      );
    }
  });
});
