$(document).ready(function() {

    $('#opFiltro li a').click(function() {
      // vai buscar a class do item que foi clicado
      var classeEscolhida = $(this).attr('class');
  
      // reseta a classe 'filtroAtivo' em todos os botões
      $('#opFiltro li').removeClass('filtroAtivo');
      // atualiza o estado da classe filtroAtivo no botão clicado
      $(this).parent().addClass('filtroAtivo');
  
      if(classeEscolhida == 'cat-todos') {
        // mostra todos os itens
        $('#holder').children('div.item').show();
      }
      else {
        // esconde itens que não cotém a classeEscolhida
        $('#holder').children('div:not(.' + classeEscolhida + ')').hide();
        // mostra todos os itens que contém a classeEscolhida
        $('#holder').children('div.' + classeEscolhida).show();
      }
      return false;
    });
});