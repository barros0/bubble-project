$(document).ready(function () {
    $(".icon_perfil").click(function () {

        var a = ($(".popup_perfil").css("display"));

        if (a == "none") {
            $(".popup_perfil").css("display", "block");
            $(".perfil").css("color", "#00ff8a");
        }
        else {
            $(".popup_perfil").css("display", "none");
            $(".perfil").css("color", "#bdbdbd");
        };
    });
});