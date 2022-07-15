$(document).ready(function () {
    var preview = document.getElementById("imagememp");
    var cancel = $("#cancela_btn");

  cancel.click(function RemoveImg() {
  preview.src = null;
  $("#input_file_emp").val(null);

});

});

function verFoto() {
    var preview = document.getElementById("imagememp");
    var file = document.getElementById("input_file_emp").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
      preview.src = reader.result;
    };
  
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }
  

