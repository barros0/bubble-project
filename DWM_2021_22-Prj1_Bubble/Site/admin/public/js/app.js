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



    function tempof() {
        let data = new Date();
        let hh = data.getHours();
        let mm = data.getMinutes();
        let ss = data.getSeconds();
        let sessao = "sun";

        if(hh == 0){
            hh = 12;
            sessao = "moon";
        }
        if(hh > 12){
            hh = hh - 12;
            sessao = "sun";
        }

        hh = (hh < 10) ? "0" + hh : hh;
        mm = (mm < 10) ? "0" + mm : mm;
        ss = (ss < 10) ? "0" + ss : ss;

        let tempo = "<i class='fa fa-"+sessao+"'> </i>" + hh + ":" + mm + ":" + ss /*+ session*/;

        document.getElementById("horas").innerHTML = tempo;
        let t = setTimeout(function(){ tempof() }, 1000);
    }
    tempof();
});