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
        // muda titulo
        $('#titulo-filtro').text("Todos os produtos");
      }
      else {
        // esconde itens que não cotém a classeEscolhida
        $('#holder').children('div:not(.' + classeEscolhida + ')').hide();
        // mostra todos os itens que contém a classeEscolhida
        $('#holder').children('div.' + classeEscolhida).show();

        // muda título
        var novoTitulo;
        switch(classeEscolhida) {
          case "cat-todos":
            novoTitulo = "Todos os produtos";
            break;
          case "cat-1":
              novoTitulo = "Aplicações";
              break;
          case "cat-2":
              novoTitulo = "Chat";
              break;
          case "cat-3":
              novoTitulo = "Gestão de API";
              break;
          case "cat-4":
              novoTitulo = "Qualidade de Código";
              break;
          case "cat-5":
              novoTitulo = "Revisão de Código";
              break;
          default:
              novoTitulo = "ERRO!";
              break;
        }
        $('#titulo-filtro').text(novoTitulo);
      }
      
      return false;
    });
});