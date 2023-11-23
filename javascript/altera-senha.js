function alteraSenha() {
  var CPF = document.getElementById("cpf");
  var data = document.getElementById("date");
  var senha = document.getElementById("senha");

  var aviso2 = document.getElementById("aviso2");

  var mensagem = "";

  if (CPF.value == "") {
    mensagem =
      "<i class=bi-exclamation-circle> Preencha corretamente o seu CPF!</i>";
    aviso2.innerHTML = mensagem;
    CPF.focus();
    return false;
  } else {
    mensagem = "";
    aviso2.innerHTML = mensagem;
  }

  if (CPF.value.length != 14) {
    CPF.focus();
    return false;
  }

  if (!validaCPF(CPF.value)) {
    CPF.focus();
    return false;
  }

  if (data.value == "") {
    mensagem =
      "<i class=bi-exclamation-circle> Preencha corretamente sua data de nascimento!</i>";
    aviso2.innerHTML = mensagem;
    data.focus();
    return false;
  }

  if (!validarDataNascimento()) {
    data.focus();
    return false;
  }

  // if (data !== "") {
  //  Se a data estiver preenchida corretamente, mostra a caixa de senha
  //   document.querySelector(".senha-input").style.display = "flex";
  //   document.getElementById("aviso2").innerHTML = "";
  // } else {
  //  Se a data não estiver preenchida corretamente, exibe um aviso
  //   document.querySelector(".senha-input").style.display = "none";
  //   document.getElementById("aviso2").innerHTML =
  //     "Preencha a data de nascimento corretamente.";
  // }

  if (senha.value == "") {
    senha.focus();
    return false;
  } else {
    mensagem = "";
    aviso2.innerHTML = mensagem;
  }

  if (senha.value.length != 8) {
    mensagem =
      "<i class=bi-exclamation-circle> A nova senha deve ter 8 caracteres alfabéticos!</i> ";
    aviso2.innerHTML = mensagem;
    senha.focus();
    return false;
  } else {
    mensagem = "";
    aviso2.innerHTML = mensagem;
  }
}

// MÁSCARA DO CAMPO CPF

function validaCPF(c) {
  if ((c = c.replace(/[^\d]/g, "")).length != 11) return false;

  if (c == "00000000000") {
    return false;
  }

  if (c == "11111111111") {
    return false;
  }

  if (c == "22222222222") {
    return false;
  }

  if (c == "33333333333") {
    return false;
  }

  if (c == "44444444444") {
    return false;
  }

  if (c == "55555555555") {
    return false;
  }

  if (c == "66666666666") {
    return false;
  }

  if (c == "777777777777") {
    return false;
  }

  if (c == "88888888888") {
    return false;
  }

  if (c == "99999999999") {
    return false;
  }

  var r;
  var s = 0;

  for (i = 1; i <= 9; i++) s = s + parseInt(c[i - 1]) * (11 - i);

  r = (s * 10) % 11;

  if (r == 10 || r == 11) r = 0;

  if (r != parseInt(c[9])) return false;

  s = 0;

  for (i = 1; i <= 10; i++) s = s + parseInt(c[i - 1]) * (12 - i);

  r = (s * 10) % 11;

  if (r == 10 || r == 11) r = 0;

  if (r != parseInt(c[10])) return false;

  return true;
}

function fMasc(objeto, mascara) {
  obj = objeto;
  masc = mascara;
  setTimeout("fMascEx()", 1);
}

function fMascEx() {
  obj.value = masc(obj.value);
}

function mCPF(cpf) {
  cpf = cpf.replace(/\D/g, "");
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
  cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
  return cpf;
}

cpfCheck = function (el) {
  document.getElementById("cpfResponse").innerHTML = validaCPF(el.value)
    ? '<i class="bi bi-check-circle" style="color:green"><span> válido</span></i>'
    : '<i class= bi-exclamation-circle style="color:red"><span> inválido</span></i>';
  if (el.value == "") document.getElementById("cpfResponse").innerHTML = "";
};

// validando a idade do usuário

function validarDataNascimento() {
  const data_nasc = new Date(document.getElementById("date").value);
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
    document.getElementById("aviso2").innerHTML =
      "<i class='bi bi-exclamation-circle'></i> Você deve ter mais de 18 anos!";
    return false;
  } else {
    document.getElementById("aviso2").innerHTML = "";
    return true;
  }
}
