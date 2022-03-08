var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById('fundo-botoes');

function register(){
    x.style.display = "none";
    y.style.display = "block";
    z.style.left = "110px";
}

function login(){
    x.style.display = "block";
    y.style.display = "none";
    z.style.left = "0px";
}