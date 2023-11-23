<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/alterar-senha.css">
    <link rel="icon" href="./imagens/logo.png">
    <script src="./javascript/altera-senha.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="./imagens/imagem_alterar-senha.svg">
        </div>
        <div class="form">
            <form action="handle-autentic.php" method="POST" onsubmit="return alteraSenha()">
                <input type="hidden" name="acao" value="recuperaSenha">
                <div class="form-header">
                    <div class="title">
                        <h1>Recuperar Senha</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input type="text" name="CPF" onkeyup="cpfCheck(this)" id="cpf" onkeydown="fMasc( this, mCPF );"
                            placeholder="Digite seu CPF" maxlength="14">
                        <span id="cpfResponse"></span>
                    </div>

                    <div class="input-box">
                        <label for="date">Data de Nascimento</label>
                        <input id="date" type="date" name="date">
                    </div>

                    <div class="input-box senha-input">
                        <label for="senha">Nova senha</label>
                        <input id="senha" type="password" name="senha" placeholder="********"
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" maxlength="8">
                    </div>
                </div>

                <div class="altera">
                    <div id="aviso2" class="aviso2"></div>
                    <input type="submit" value="Recuperar" name="alterar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>