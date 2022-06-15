$("#inserirFAQ").submit(function () {
  if (invalid) {
    return false;
  } else {
    return true;
  }
});

function validateForm() {
  let perguntaInsere = document.forms["inserirFAQ"]["Pergunta"].value;
  let respostaInsere = document.forms["inserirFAQ"]["Resposta"].value;

  if (perguntaInsere == "") {
    alert("Por favor insira a Pergunta");
    return false;
  } else if (perguntaInsere <= 0 || perguntaInsere >= 0) {
    alert("Ups! Essa Pergunta não parece adequada");
    return false;
  } else if (respostaInsere == "") {
    alert("Por favor insira a Resposta");
    return false;
  } else if (respostaInsere <= 0 || respostaInsere >= 0) {
    alert("Ups! Essa Resposta não parece adequada");
    return false;
  }
}

$("#AtualizaFAQ").submit(function () {
  if (invalid) {
    alert("ESGI<RJUFHXBNYZ8I0H");
    return false;
  } else {
    return true;
  }
});

function validaForm() {
  let perguntaAtualiza = document.forms["atualizaFAQ"]["pergunta"].value;
  let respostaAtualiza = document.forms["atualizaFAQ"]["resposta"].value;

  if (perguntaAtualiza == "") {
    alert("Por favor insira a Pergunta");
    return false;
  } else if (perguntaAtualiza <= 0 || perguntaAtualiza >= 0) {
    alert("Ups! Essa Pergunta não parece adequada");
    return false;
  } else if (respostaAtualiza == "") {
    alert("Por favor insira a Resposta");
    return false;
  } else if (respostaAtualiza <= 0 || respostaAtualiza >= 0) {
    alert("Ups! Essa Resposta não parece adequada");
    return false;
  }
}

$(document).ready(function () {
  $(".button_adicionar").click(function () {
    let form = $(".form_inserir_faqs").css("display");

    if (form == "none") {
      $(".form_inserir_faqs").css("display", "flex");
    } else {
      $(".form_inserir_faqs").css("display", "none");
    }
  });
});

$(document).ready(function () {
  $("#fechar_modal_faq").click(function () {
    let form = $(".form_inserir_faqs").css("display");

    if (form == "none") {
      $(".form_inserir_faqs").css("display", "flex");
    } else {
      $(".form_inserir_faqs").css("display", "none");
    }
  });
});
