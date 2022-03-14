/*$(document).ready(function () {
  $(".comment_textarea").each(function () {
    $(this).keyup(function () {
      var len = $(this).val().length;
      var a = $(this).find("span").text(len)
    });
  });
});
*/
/*
$(document).ready(function () {
  $(".comment_section").each(function () {
    $(this).addid("dwa");
    $(".comment_textarea").each(function () {
      $(this).keyup(function () {
        var len = $(this).val().length;
        $(".dwa").find("span").text(len);
      });
    });
  });
});

$(document).ready(function () {
    
    for (let i = 0; i < array.length; i++) {
        $(".blah").eq(i).html("blah");
    }
});

*/

$(document).ready(function () {
  $(".comment_textarea").each(function () {
    $(this).keyup(function () {
      var $input = $(this);
      $input.attr("data-countchar");
    });
  });
});
