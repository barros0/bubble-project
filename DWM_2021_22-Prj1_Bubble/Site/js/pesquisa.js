$(document).ready(function () {
    document.title = $('#resultados_frase').text();

    $(".bt_op").click(function () {
        $(".bt_op").removeClass('active_bt');
        $(this).addClass('active_bt');
        tipo = $(this).attr('id');
        if (tipo != 'todos') {
            $(".resultado:not([type='" + tipo + "'])").fadeOut(100)
            $("[type='" + tipo + "']").fadeIn(100)
        }
        else{
            $(".resultado").fadeIn(100)
        }
    })
});