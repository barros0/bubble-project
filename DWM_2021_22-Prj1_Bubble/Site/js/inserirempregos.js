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
  
  //pesquisa

$(document).ready(function(){
  $('.div_input_search_pesquisa input[type="text"]').on("keyup input", function(){
      /* Get input value on change */
      var inputVal = $(this).val();
      var resultDropdown = $(".wrap-empregos");
      if(inputVal.length){
          $.get("pesquisa-empregos.php", {term: inputVal}).done(function(data){
              // Display the returned data in browser
              resultDropdown.html(data);
          });
      } else{
          resultDropdown.empty();
      }
  });
  
  // Set search input value on click of result item
  $(document).on("click", ".result p", function(){
      $(this).parents(".div_input_search_pesquisa").find('input[type="text"]').val($(this).text());
      $(this).parent(".wrap-empregos").empty();
  });
});