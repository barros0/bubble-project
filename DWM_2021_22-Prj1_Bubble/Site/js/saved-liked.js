$(document).ready(function () {

    $('#bt_liked').click( function (){
        $(this).addClass('active_bt');
        $('#bt_saved').removeClass('active_bt');

        $('#liked').addClass('active-l');
        $('#saved').removeClass('active-l');
    })
    $('#bt_saved').click( function (){
        $(this).addClass('active_bt');
        $('#bt_liked').removeClass('active_bt');

        $('#liked').removeClass('active-l');
        $('#saved').addClass('active-l');
    })

})