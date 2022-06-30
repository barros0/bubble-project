$("#inserirevento").submit(function () {
  return !invalid;
});

function validateForm() {
  let tituloInsere = document.forms["inserirevento"]["titulo"].value;
  let localizacaoInsere = document.forms["inserirevento"]["localizacao"].value;
  let descricaoInsere = document.forms["inserirevento"]["descricao"].value;
  let imagemInsere = document.forms["inserirevento"]["imagem"].value;

  if (tituloInsere == "") {
    alert("Por favor insira a titulo");
    return false;
  } else if (tituloInsere <= 0 || tituloInsere >= 0) {
    alert("Ups! Essa titulo não parece adequada");
    return false;
  } else if (localizacaoInsere == "") {
    alert("Por favor insira a localizacao");
    return false;
  } else if (localizacaoInsere <= 0 || localizacaoInsere >= 0) {
    alert("Ups! Essa localizacao não parece adequada");
    return false;
  }else if (descricaoInsere == "") {
    alert("Por favor insira a descricao");
    return false;
  } else if (descricaoInsere <= 0 || descricaoInsere >= 0) {
    alert("Ups! Essa descricao não parece adequada");
    return false;
  }else if (imagemInsere == "") {
    alert("Por favor insira a imagem");
    return false;
  } else if (imagemInsere <= 0 || imagemInsere >= 0) {
    alert("Ups! Essa imagem não parece adequada");
    return false;
  }
}

$("#Atualizaevento").submit(function () {
  return !invalid;
});

function validaForm() {
  let tituloAtualiza = document.forms["atualizaevento"]["titulo"].value;
  let localizacaoAtualiza = document.forms["atualizaevento"]["localizacao"].value;
  let descricaoAtualiza = document.forms["atualizaevento"]["descricao"].value;


  if (tituloAtualiza == "") {
    alert("Por favor insira a titulo");
    return false;
  } else if (tituloAtualiza <= 0 || tituloAtualiza >= 0) {
    alert("Ups! Essa titulo não parece adequada");
    return false;
  } else if (localizacaoAtualiza == "") {
    alert("Por favor insira a localizacao");
    return false;
  } else if (localizacaoAtualiza <= 0 || localizacaoAtualiza >= 0) {
    alert("Ups! Essa localizacao não parece adequada");
    return false;
  }else if (descricaoAtualiza == "") {
    alert("Por favor insira a descricao");
    return false;
  } else if (descricaoAtualiza <= 0 || descricaoAtualiza >= 0) {
    alert("Ups! Essa descricao não parece adequada");
    return false;
  }
}

$(document).ready(function () {
  $(".button_adicionar").click(function () {
    let form = $(".form_inserir_eventos").css("display");

    if (form == "none") {
      $(".form_inserir_eventos").css("display", "flex");
    } else {
      $(".form_inserir_eventos").css("display", "none");
    }
  });
});

$(document).ready(function () {
  $("#fechar_modal_evento").click(function () {
    let form = $(".form_inserir_eventos").css("display");

    if (form == "none") {
      $(".form_inserir_eventos").css("display", "flex");
    } else {
      $(".form_inserir_eventos").css("display", "none");
    }
  });
});
