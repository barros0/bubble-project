  //pesquisa

  $(document).ready(function(){
    $('.div_input_search_pesquisa input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(".wrap-empregos-gerir");
        if(inputVal.length){
            $.get("pesquisa-empregos-user.php", {term: inputVal}).done(function(data){
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
        $(this).parent(".wrap-empregos-gerir").empty();
    });
  });