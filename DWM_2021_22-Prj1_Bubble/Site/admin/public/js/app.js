$(document).ready(function () {

    //menu
    $("#open_admin_menu_down").click(function () {
        $("#admin_menu_down").toggleClass('show')
    })

    $("#preloader").fadeOut(500)

    function dark(){
        $(":root").get(0).style.setProperty("--white", "#1C1C1C");
        $(":root").get(0).style.setProperty("--dark", "#404040");
   }



   // tables
    $('.filter-close').click(function (){
        $(this).siblings('.filter-w').toggleClass('open');
    })

    //mudar tabs
        $("#btn-faqs").click(function () {

         $("#main").toggle();

         $("#container-faqs").toggle();

        });

});