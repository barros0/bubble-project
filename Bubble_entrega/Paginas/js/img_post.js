function previewFile() {
  var preview = document.getElementById("img_post");
  var file = document.querySelector("input[type=file]").files[0];
  var cancel = $("#cancel_btn");
  var reader = new FileReader();

  cancel.click(function RemoveImg() {
    $(".img_post").css("display", "none");
    preview.src = "";
  });

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    $(".img_post").css("display", "flex");
    reader.readAsDataURL(file);
  } else {
    $(".img_post").css("display", "none");
    preview.src = "";
  }
}

function previewFileResponsive() {
  var preview = document.getElementById("img_post_responsive");
  var file = document.querySelector("input[type=file]").files[0];
  var cancel = $("#cancel_btn_responsive");
  var reader = new FileReader();

  cancel.click(function RemoveImg() {
    $(".img_post_responsive").css("display", "none");
    preview.src = "";
  });

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    $(".img_post_responsive").css("display", "flex");
    reader.readAsDataURL(file);
  } else {
    $(".img_post_responsive").css("display", "none");
    preview.src = "";
  }
}
