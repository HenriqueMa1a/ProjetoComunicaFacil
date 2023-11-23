// criando uma função para validar os campos do meu formulário
function validar(){
  var formulario = document.forms["form"]
  var nome = formulario.nome.value
  var data = formulario.data.value
  var sexo = formulario.gender.value
  var nome1 = formulario.nome1.value
  var CPF = formulario.CPF.value
  var tel = formulario.tel.value
  var rua = formulario.rua.value
  var login = formulario.login.value
  var senha = formulario.senha.value
  var senha1 = formulario.senha1.value

  var aviso1 = document.getElementById('aviso1')

  var mensagem = ""


    // criando as validações dos campos

    if (nome == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Nome!</i> "
      aviso1.innerHTML = mensagem
      formulario.nome.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }

    if (nome.length < 15 || nome.length > 80) {
      mensagem = "<i class=bi-exclamation-circle> Nome deve ter pelo menos 15 caracteres!</i> "
      aviso1.innerHTML = mensagem
      formulario.nome.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }


    if (nome1 == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Nome Materno!</i> "
      aviso1.innerHTML = mensagem
      formulario.nome1.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }

    if (data == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Data de Nascimento!</i> "
      aviso1.innerHTML = mensagem
      formulario.data.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }

    if (!validarDataNascimento ()) {
      formulario.data.focus();
      return false;
    }

    if (CPF == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo CPF!</i> "
      aviso1.innerHTML = mensagem
      formulario.CPF.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }

    if (CPF.length != 14) {
      formulario.CPF.focus();
      return false;
    }

    if (!validaCPF (CPF)) {
      formulario.CPF.focus();
      return false;
    }


    if (tel == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Telefone/Celular!</i> "
      aviso1.innerHTML = mensagem
      formulario.tel.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }


    if (tel.length != 15) {
      mensagem = "<i class=bi-exclamation-circle> Telefone/Celular inválido!</i> "
      aviso1.innerHTML = mensagem
      formulario.tel.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }


    if (rua == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Rua!</i> "
      aviso1.innerHTML = mensagem
      formulario.rua.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }

    if (login == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Login!</i> "
      aviso1.innerHTML = mensagem
      formulario.login.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }

    if (login.length != 6) {
      mensagem = "<i class=bi-exclamation-circle> Login deve ter 6 caracteres!</i> "
      aviso1.innerHTML = mensagem
      formulario.login.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }


    if (senha == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Senha!</i> "
      aviso1.innerHTML = mensagem
      formulario.senha.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }


    if (senha.length != 8) {
      mensagem = "<i class=bi-exclamation-circle> Senha deve ter 8 caracteres!</i> "
      aviso1.innerHTML = mensagem
      formulario.senha.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }


    if (senha1 == "") {
      mensagem = "<i class=bi-exclamation-circle> Confirme sua senha!</i> "
      aviso1.innerHTML = mensagem
      formulario.senha1.focus();
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }


    if (senha != senha1) {
      mensagem = "<i class=bi-exclamation-circle> As senhas não estão iguais!</i> "
      aviso1.innerHTML = mensagem
      return false;
    }

    if (sexo == "") {
      mensagem = "<i class=bi-exclamation-circle> Preencha o campo Gênero!</i> "
      aviso1.innerHTML = mensagem
      return false;
    } else {
      mensagem = ""
      aviso1.innerHTML = mensagem
    }

}

// criando uma função para mascarar CPF
function validaCPF(c) {

  if((c = c.replace(/[^\d]/g,"")).length != 11)
    return false;

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

  for (i=1; i<=9; i++)
    s = s + parseInt(c[i-1]) * (11 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[9]))
    return false;

  s = 0;

  for (i = 1; i <= 10; i++)
    s = s + parseInt(c[i-1]) * (12 - i);

  r = (s * 10) % 11;

  if ((r == 10) || (r == 11))
    r = 0;

  if (r != parseInt(c[10]))
    return false;


  return true;
}


function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

  function fMascEx() {
    obj.value = masc(obj.value)
}

  function mCPF(cpf){
  cpf=cpf.replace(/\D/g,"")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
  cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
  return cpf

}

  cpfCheck = function (el) {
    document.getElementById('cpfResponse').innerHTML = validaCPF(el.value)? '<i class="bi bi-check-circle" style="color:green"><span> válido</span></i>' : '<i class= bi-exclamation-circle style="color:red"><span> inválido</span></i>';
    if(el.value=='') document.getElementById('cpfResponse').innerHTML = '';
  }


// validar o celular/telefone

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); 
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}
function id( el ){
    return document.getElementById( el );
}
window.onload = function(){
    id('number').onkeyup = function(){
        mascara( this, mtel );
    }
}

// validando a idade do usuário

function validarDataNascimento() {
  const data_nasc = new Date(document.getElementById('data').value);
  const hoje = new Date();
  const idade = hoje.getFullYear() - data_nasc.getFullYear();

  if (hoje.getMonth() < data_nasc.getMonth() || (hoje.getMonth() === data_nasc.getMonth() && hoje.getDate() < data_nasc.getDate())) {
      idade--;
  }

  if (idade < 18) {
      document.getElementById('aviso1').innerHTML = "<i class='bi bi-exclamation-circle'></i> Você deve ter mais de 18 anos!";
      return false;
  } else {
      document.getElementById('aviso1').innerHTML = "";
      return true;
  }
}
