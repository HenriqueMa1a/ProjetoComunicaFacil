// criando uma função para validar os campos do meu formulário
function entra(){
    let login = document.querySelector('#login')
    let senha = document.querySelector('#senha')
    
    var aviso = document.getElementById('aviso')
    var mensagem = ''

    if (login.value == "" ) {
        mensagem = "<i class=bi-exclamation-circle> Preencha corretamente o campo Login!</i> "
        aviso.innerHTML = mensagem
        login.focus()
        return false;
    } else {
        mensagem = ""
        aviso.innerHTML = mensagem
    }


    if (login.value.length != 6) {
        mensagem = "<i class=bi-exclamation-circle> Login deve ter 6 caracteres alfabéticos!</i> "
        aviso.innerHTML = mensagem
        login.focus()
        return false;
    } else {
        mensagem = ""
        aviso.innerHTML = mensagem
    }


    if (senha.value == "") {
        mensagem = "<i class=bi-exclamation-circle> Preencha o campo Senha!</i> "
        aviso.innerHTML = mensagem
        senha.focus();
        return false;
    } else {
        mensagem = ""
        aviso.innerHTML = mensagem
    }

    if (senha.value.length != 8) {
        mensagem = "<i class=bi-exclamation-circle> Senha deve ter 8 caracteres alfabéticos!</i> "
        aviso.innerHTML = mensagem
        senha.focus()
        return false;
    } else {
        mensagem = ""
        aviso.innerHTML = mensagem
    }
}
