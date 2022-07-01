var login_div = $("#login");
var register_div = $("#register");
var btn_fundo = $("#fundo-botoes");
var btn_login = $(".login_btn");
var btn_register = $(".register_btn");

function register() {
  login_div.css("display", "none");
  register_div.css("display", "block");
  btn_fundo.css("left", "50%");
  btn_register.css("color", "#404040");
  btn_login.css("color", "white");
}

function login() {
  login_div.css("display", "block");
  register_div.css("display", "none");
  btn_fundo.css("left", "0%");
  btn_login.css("color", "#404040");
  btn_register.css("color", "white");
}
