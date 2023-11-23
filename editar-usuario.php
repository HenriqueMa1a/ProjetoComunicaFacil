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
    <?php
    include("config.php");
    $sqlUsuario = "SELECT * FROM usuario WHERE id_usuario =" . $_REQUEST["id"];
    $resUsuario = $conn->query($sqlUsuario);

    $rowUsuario = $resUsuario->fetch_object();

    $sqlTelefone = "SELECT * FROM telefone WHERE id_usuario =" . $_REQUEST["id"];
    $resTelefone = $conn->query($sqlTelefone);

    $rowTelefone = $resTelefone->fetch_object();
    ?>
    <div class="container">
        <div class="form">
            <form name="form" action="handle-usuario.php" method="POST" onsubmit="return validar()">

                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?php print $rowUsuario->id_usuario; ?>">

                <div class="form-header">
                    <div class="title">
                        <h1>Editar usuário</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome Completo</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu nome"
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" value="<?php print $rowUsuario->nome; ?>">
                    </div>

                    <div class="input-box">
                        <label for="nome1">Nome Materno</label>
                        <input id="nome1" type="text" name="nome1" placeholder="Digite seu nome materno"
                            value="<?php print $rowUsuario->nome_mat; ?>">
                    </div>

                    <div class="input-box">
                        <label for="data">Data de nascimento</label>
                        <input id="data" type="date" name="data" value="<?php print $rowUsuario->data_nasc; ?>">
                    </div>

                    <div class="input-box">
                        <label for="CPF">CPF</label>
                        <input type="text" name="CPF" onkeyup="cpfCheck(this)" id="cpf" onkeydown="fMasc( this, mCPF );"
                            placeholder="Ex: 123.456.789-10" maxlength="14" value="<?php print $rowUsuario->cpf; ?>"
                            disabled>
                        <span id="cpfResponse"></span>
                    </div>
                    <div class="input-box">
                        <!-- input para continuar passando o valor do cpf-->
                        <input type="hidden" name="CPF_hidden" value="<?php print $rowUsuario->cpf; ?>">

                    </div>

                    <div class="input-box">
                        <label for="tel">Celular</label>
                        <input id="number" type="tel" name="tel" placeholder="(xx) xxxxx-xxxx"
                            value="<?php print $rowTelefone->numero; ?>">
                    </div>

                    <div class="input-box">
                        <label for="rua">Endereço</label>
                        <input id="rua" type="text" name="rua" placeholder="Digite sua rua"
                            value="<?php print $rowUsuario->endereco; ?>">
                    </div>

                    <div class="input-box">
                        <label for="login">Login</label>
                        <input id="login" type="text" name="login" placeholder="Digite seu Login" maxlength="6"
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" value="<?php print $rowUsuario->login; ?>">
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Digite sua senha" maxlength="8"
                            pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" value="<?php print $rowUsuario->senha; ?>" disabled>
                    </div>
                    <div class="input-box">
                        <input type="hidden" name="senha_hidden" value="<?php print $rowUsuario->senha; ?>">
                    </div>

                    <div class="plano-inputs">
                        <div class="plano-title">
                            <h6>Escolha um plano</h6>
                        </div>

                        <div class="plano-group">
                            <?php
                            $sqlPlano = "SELECT * FROM comunica.plano";
                            $resPlano = $conn->query($sqlPlano);

                            while ($rowPlano = $resPlano->fetch_assoc()) {
                                $idPlano = $rowPlano['id_plano'];
                                $nomePlano = $rowPlano['nome'];
                                ?>
                                <div class="plano-input">
                                    <input id="plano_<?php echo $idPlano; ?>" type="radio" name="plano"
                                        value="<?php echo $idPlano; ?>" <?php if ($rowTelefone->id_plano == $idPlano) //se id_plano do usuário é igual o idPlano em questão
                                                       echo 'checked'; ?>>
                                    <label for="plano_<?php echo $idPlano; ?>">
                                        <?php echo $nomePlano; ?>
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>


                    <div class="gender-inputs">
                        <div class="gender-title">
                            <h6>Gênero</h6>
                        </div>

                        <div class="gender-group">
                            <div class="gender-input">
                                <input id="female" type="radio" name="gender" value="Feminino" <?php if ($rowUsuario->genero == 'Feminino')
                                    echo 'checked'; ?>>
                                <label for="female">Feminino</label>
                            </div>

                            <div class="gender-input">
                                <input id="male" type="radio" name="gender" value="Masculino" <?php if ($rowUsuario->genero == 'Masculino')
                                    echo 'checked'; ?>>
                                <label for="male">Masculino</label>
                            </div>

                            <div class="gender-input">
                                <input id="others" type="radio" name="gender" value="Outros" <?php if ($rowUsuario->genero == 'Outros')
                                    echo 'checked'; ?>>
                                <label for="others">Outros</label>
                            </div>

                            <div class="gender-input">
                                <input id="none" type="radio" name="gender" value="Não informado" <?php if ($rowUsuario->genero == 'Não informado')
                                    echo 'checked'; ?>>
                                <label for="none">Prefiro não informar</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="enviar">
                    <span id="aviso1" class="aviso1"></span>
                    <input type="submit" name="cadastrar" value="Editar">
                </div>

                <!-- <div class="limpar">
                    <input type="reset" name="limpar" value="Limpar"> Tem necessidade?
                </div> -->
            </form>
        </div>
    </div>

    <script src="./javascript/cadastro.js" type="text/javascript"></script>
</body>

</html>