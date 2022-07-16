$(document).ready(function () {
    document.title = $('#resultados_frase').text();

    $(".bt_op").click(function () {
        $(".bt_op").removeClass('active_bt');
        $(this).addClass('active_bt');
        tipo = $(this).attr('id');
        if (tipo != 'todos') {
            $(".resultado:not([itemtype='" + tipo + "'])").fadeOut(100)
            $("[itemtype='" + tipo + "']").fadeIn(100)
        }
        else{
            $(".resultado").fadeIn(100)
        }
    })
});