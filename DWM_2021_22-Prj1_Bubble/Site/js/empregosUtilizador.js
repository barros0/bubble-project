  //pesquisa

  $(document).ready(function(){
    $('.div_input_search_pesquisa input[type="text"]').on("keyup input", function(){
        /* buscar os valores de input quando sao introduzidos */
        var inputVal = $(this).val();
        var resultDropdown = $(".wrap-empregos-gerir");
        if(inputVal.length){
            $.get("pesquisa-empregos-user.php", {term: inputVal}).done(function(data){
                // devolver os dados 
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // devolver os dados apresentados
    $(document).on("click", ".result p", function(){
        $(this).parents(".div_input_search_pesquisa").find('input[type="text"]').val($(this).text());
        $(this).parent(".wrap-empregos-gerir").empty();
    });
  });