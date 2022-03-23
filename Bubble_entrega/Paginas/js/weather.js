link = "https://api.openweathermap.org/data/2.5/weather?q=Leiria&appid=194934758d782b892c8a26eb1d10971a&lang=pt&units=metric";
var request = new XMLHttpRequest();
request.open("GET", link, true);
request.onload = function () {
  var obj = JSON.parse(this.response);
  /*console.log(obj);*/

  $("#tempo").text(obj.weather[0].description);
  $("#location").text(obj.name);
  $("#graus").text(Math.floor(obj.main.temp));
  $("#icon").attr("src", "./img/weather_icons/" + obj.weather[0].icon + ".svg");
  $("#humidade").text(obj.main.humidity);
  $("#vento").text(obj.wind.speed);
  $("#uv").text(obj.sys.type);
};
request.send();
