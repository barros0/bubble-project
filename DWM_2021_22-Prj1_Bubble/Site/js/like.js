$(document).ready(function () {
  $(".liked_bt").click(function () {
    console.log(33)

    classCheck = $(this).is(".active");
    $(this).toggleClass('active');

     div_like = $(this).parent().parent().children('.post_number_likes_comments');

     // aletr numb likes
     div_like.find('#number_likes').text('3');

nlike = div_like.children('#number_likes');


  });
});
