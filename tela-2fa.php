<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela 2FA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/2fa.css">
    <link rel="icon" href="./imagens/logo.png">
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="./imagens/imagem_2fa.svg" alt="">
        </div>
        <div class="form">
            <form action="handle-autentic.php" method="POST" onsubmit="return valida()" id="form">
                <input type="hidden" name="acao" value="2fa">
                <input type="hidden" name="tipo" id="tipoPergunta">
                <div class="form-header">
                    <div class="title">
                        <h1>2FA</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="pergunta" id="perguntaLabel"></label>
                        <input id="campo" type="text" name="campo" placeholder="Preencha este campo">
                    </div>
                </div>


                <div class="continue-button">
                    <div id="aviso3" class="aviso"></div>
                    <input type="submit" value="Continuar" name="continuar">
                </div>
            </form>
        </div>
    </div>
    <script src="./javascript/2fa.js" type="text/javascript"></script>
</body>

</html>