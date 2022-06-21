$(document).ready(function () {
  $(".liked_bt").click(function () {
    console.log(33);

    $(this).toggleClass("active");

    let div_like = $(this)
      .parent()
      .parent()
      .children(".post_number_likes_comments");

    // aletr numb likes
    div_like.find("#number_likes").text("3");
  });
});
