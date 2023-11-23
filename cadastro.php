<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="icon" href="imagens/logo.png">
</head>

<body>
    <div class="container">
        <div class="form">
            <form name="form" action="handle-usuario.php" method="POST" onsubmit="return validar()">
                <input type="hidden" name="acao" value="cadastrar">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                </div>

                <span class="aviso">Aviso: Ao realizar o cadastro, poderemos desta forma entrar em contato para mais
                    informações à respeito dos serviços</span>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome Completo</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu nome"
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+">
                    </div>

                    <div class="input-box">
                        <label for="nome1">Nome Materno</label>
                        <input id="nome1" type="text" name="nome1" placeholder="Digite seu nome materno">
                    </div>

                    <div class="input-box">
                        <label for="data">Data de nascimento</label>
                        <input id="data" type="date" name="data">
                    </div>

                    <div class="input-box">
                        <label for="CPF">CPF</label>
                        <input type="text" name="CPF" onkeyup="cpfCheck(this)" id="cpf" onkeydown="fMasc( this, mCPF );"
                            placeholder="Ex: 123.456.789-10" maxlength="14">
                        <span id="cpfResponse"></span>
                    </div>

                    <div class="input-box">
                        <label for="tel">Celular</label>
                        <input id="number" type="tel" name="tel" placeholder="(xx) xxxxx-xxxx">
                    </div>

                    <div class="input-box">
                        <label for="rua">Endereço</label>
                        <input id="rua" type="text" name="rua" placeholder="Digite sua rua">
                    </div>

                    <div class="input-box">
                        <label for="login">Login</label>
                        <input id="login" type="text" name="login" placeholder="Digite seu Login" maxlength="6"
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+">
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha" maxlength="8"
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+">
                    </div>

                    <div class="input-box">
                        <label for="senha">Confirme sua Senha</label>
                        <input type="password" name="senha1" placeholder="Digite sua senha novamente" maxlength="8">
                    </div>


                    <div class="plano-inputs">
                        <div class="plano-title">
                            <h6>Escolha um plano de interesse</h6>
                        </div>

                        <div class="plano-group">
                            <div class="plano-input">
                                <input id="plano" type="radio" name="plano" value="Básico">
                                <label for="plano">Plano Básico</label>
                            </div>

                            <div class="plano-input">
                                <input id="plano" type="radio" name="plano" value="Pro">
                                <label for="plano">Plano Pro</label>
                            </div>

                            <div class="plano-input">
                                <input id="plano" type="radio" name="plano" value="Premium">
                                <label for="plano">Plano Premium</label>
                            </div>
                        </div>
                    </div>

                    <div class="gender-inputs">
                        <div class="gender-title">
                            <h6>Gênero</h6>
                        </div>

                        <div class="gender-group">
                            <div class="gender-input">
                                <input id="female" type="radio" name="gender" value="Feminino">
                                <label for="female">Feminino</label>
                            </div>

                            <div class="gender-input">
                                <input id="male" type="radio" name="gender" value="Masculino">
                                <label for="male">Masculino</label>
                            </div>

                            <div class="gender-input">
                                <input id="others" type="radio" name="gender" value="Outros">
                                <label for="others">Outros</label>
                            </div>

                            <div class="gender-input">
                                <input id="none" type="radio" name="gender" value="Não informado">
                                <label for="none">Prefiro não informar</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="enviar">
                    <span id="aviso1" class="aviso1"></span>
                    <input type="submit" name="cadastrar" value="Cadastrar">
                </div>

                <div class="limpar">
                    <input type="reset" name="limpar" value="Limpar">
                </div>
            </form>
        </div>
    </div>

    <script src="./javascript/cadastro.js" type="text/javascript"></script>
</body>

</html>