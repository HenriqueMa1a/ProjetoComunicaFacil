function valida() {
  let campo = document.querySelector("#campo");

  var aviso3 = document.getElementById("aviso3");

  var mensagem = "";

  if (campo.value == "") {
    mensagem =
      "<i class=bi-exclamation-circle> Preencha corretamente este campo!</i> ";
    aviso3.innerHTML = mensagem;
    campo.focus();
    return false;
  } else {
    mensagem = "";
    aviso3.innerHTML = mensagem;
  }

  if (campo.type === "tel") {
    if (campo.value.length != 15) {
      mensagem = "<i class=bi-exclamation-circle> Celular Inválido!</i> ";
      aviso3.innerHTML = mensagem;
      campo.focus();
      return false;
    } else {
      mensagem = "";
      aviso3.innerHTML = mensagem;
    }
  }
}

// função para randomizar as perguntas

function randomizaPergunta() {
  var perguntas = [
    "Qual é o seu nome materno?",
    "Qual é o seu número de celular?",
    "Qual é a sua data de nascimento?",
  ];

  var perguntaAleatoria =
    perguntas[Math.floor(Math.random() * perguntas.length)];

  document.getElementById("perguntaLabel").textContent = perguntaAleatoria;

  var campo = document.getElementById("campo");
  var tipo = document.getElementById("tipoPergunta");

  if (perguntas.indexOf(perguntaAleatoria) === 0) {
    campo.type = "text";
    tipo.value = "text";
    console.log(tipoPergunta.value);
  }

  if (perguntas.indexOf(perguntaAleatoria) === 1) {
    campo.type = "tel";
    tipo.value = "tel";
    campo.onkeyup = function () {
      mascara(campo, mtel);
    };
  }

  if (perguntas.indexOf(perguntaAleatoria) === 2) {
    campo.type = "date";
    tipo.value = "date";
    campo.addEventListener("change", validarDataNascimento);
  }
}

// colocando máscara no campo do celular

function mascara(o, f) {
  v_obj = o;
  v_fun = f;
  setTimeout("execmascara()", 1);
}
function execmascara() {
  v_obj.value = v_fun(v_obj.value);
}
function mtel(v) {
  v = v.replace(/\D/g, "");
  v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
  v = v.replace(/(\d)(\d{4})$/, "$1-$2");
  return v;
}

function id(el) {
  return document.getElementById(el);
}

// validando a idade do usuário

function validarDataNascimento() {
  const data_nasc = new Date(document.getElementById("campo").value);
  const hoje = new Date();
  const idade = hoje.getFullYear() - data_nasc.getFullYear();

  if (
    hoje.getMonth() < data_nasc.getMonth() ||
    (hoje.getMonth() === data_nasc.getMonth() &&
      hoje.getDate() < data_nasc.getDate())
  ) {
    idade--;
  }

  if (idade < 18) {
    document.getElementById("aviso3").innerHTML =
      "<i class='bi bi-exclamation-circle'></i> Você deve ter mais de 18 anos!";
    return false;
  } else {
    document.getElementById("aviso3").innerHTML = "";
  }
}

window.onload = randomizaPergunta;
