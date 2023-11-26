<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="icon" href="./imagens/logo.png" />
</head>

<body>
  <div class="container">
    <div class="form-image">
      <img src="./imagens/imagem_login.svg" alt="Logo" />
    </div>
    <div class="form">
      <form action="handle-autentic.php" method="POST" onsubmit="return entra()">
        <input type="hidden" name="acao" value="logar">
        <div class="form-header">
          <div class="title">
            <h1>Entrar</h1>
          </div>
        </div>
        <div class="input-group">
          <div class="input-box">
            <label for="login">Login</label>
            <input id="login" type="text" name="login" placeholder="Digite seu login" maxlength="6" />
          </div>

          <div class="input-box">
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="senha" placeholder="Digite sua senha" maxlength="8" />
          </div>


          <div class="tipo-usuario">
            <label for="tipo_usuario">Tipo de usuário</label>
            <div class="tipo-input">
              <input id="master" type="radio" name="userType" value="master">
              <label for="master">Master</label>
            </div>

            <div class="tipo-input">
              <input id="comum" type="radio" name="userType" value="comum">
              <label for="comum">Comum</label>
            </div>

          </div>


        </div>

        <div class="center">
          <div id="aviso" class="aviso"></div>

          <div class="enviar">
            <input type="submit" name="entrar" value="Entrar" />
          </div>
        </div>
        <div class="alinha">
          <div class="altera-senha">
            <a href="recuperar-senha.php">Esqueceu sua senha?</a>
          </div>

          <div class="usuario">
            <a href="cadastro.php">Usuário novo?</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="./javascript/login.js" type="text/javascript"></script>
</body>

</html>