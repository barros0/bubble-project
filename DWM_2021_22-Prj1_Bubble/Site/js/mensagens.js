$(document).ready(function () {
  $("#novochat").click(function () {
    var form = $("#form").css("display");

    if (form == "none") {
      $("#form").css("display", "flex");
    } else {
      $("#form").css("display", "none");
    }
  });
});

$(document).ready(function () {
  $("#fechar_modal").click(function () {
    $("#form").css("display", "none");
  });
});


$(document).ready(function(){
  $('.search-box input[type="text"]').on("keyup input", function(){
      /* Get input value on change */
      var inputVal = $(this).val();
      var resultDropdown = $(this).siblings(".result");
      if(inputVal.length){
          $.get("pesquisa-utilizadores.php", {term: inputVal}).done(function(data){
              // Display the returned data in browser
              resultDropdown.html(data);
          });
      } else{
          resultDropdown.empty();
      }
  });
  
  // Set search input value on click of result item
  $(document).on("click", ".result p", function(){
      $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
      $(this).parent(".result").empty();
  });
});