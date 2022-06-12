function verFoto() {
    var preview = document.getElementById("img_post_emp");
    //var file = document.querySelector("input[type=file]").files[0];
    var file = document.getElementById("input_file_emp").files[0];
    var cancel = $("#cancela");
    var reader = new FileReader();
  
    cancel.click(function RemoveImg() {
      $(".img_post_emp").css("display", "none");
      preview.src = "";
      $("#input_file_emp").val(null);
    });
  
    reader.onloadend = function () {
      preview.src = reader.result;
    };
  
    if (file) {
      $(".img_post_emp").css("display", "flex");
      reader.readAsDataURL(file);
    } else {
      $(".img_post_emp").css("display", "none");
      preview.src = "";
    }
  }
  