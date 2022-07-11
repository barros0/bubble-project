$(document).ready(function () {
  $(".space").click(function () {
    let menu = $(".menu").css("display");
    console.log(menu);
    if (menu == "none") {
      $(".menu").css("display", "block");
    } else {
      $(".menu").css("display", "none");
    }
  });
});
