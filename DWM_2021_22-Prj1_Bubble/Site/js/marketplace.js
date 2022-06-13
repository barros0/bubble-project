$(document).ready(function() {

    $('#opFiltro li a').click(function() {
      // fetch the class of the clicked item
      var ourClass = $(this).attr('class');
  
      // reset the filtroAtivo class on all the buttons
      $('#opFiltro li').removeClass('filtroAtivo');
      // update the filtroAtivo state on our clicked button
      $(this).parent().addClass('filtroAtivo');
  
      if(ourClass == 'cat-todos') {
        // show all our items
        $('#holder').children('div.item').show();
      }
      else {
        // hide all elements that don't share ourClass
        $('#holder').children('div:not(.' + ourClass + ')').hide();
        // show all elements that do share ourClass
        $('#holder').children('div.' + ourClass).show();
      }
      return false;
    });
});