<?php
include("config.php");
session_start();

switch (@$_REQUEST["acao"]) {
    case "logar":
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $userType = isset($_POST["userType"]) ? $_POST["userType"] : "";
        //Lógica do usuário
        $sqlUser = "SELECT * FROM usuario
              WHERE login = '{$login}'
              AND senha='" . md5($senha) . "'
              AND id_tipo = (SELECT id_tipo FROM tipo_de_usuario WHERE tipo = '{$userType}')";

        $resUser = $conn->query($sqlUser);

        $rowUser = $resUser->fetch_object();
        $qtd = $resUser->num_rows;



        if ($qtd > 0) {
            //lógica do telefone
            $sqlTel = "SELECT * FROM telefone
            WHERE id_usuario=" . $rowUser->id_usuario;

            $resTel = $conn->query($sqlTel);
            // fim da obtenção do telefone
            $rowTel = $resTel->fetch_object();
            $_SESSION["id_usuario"] = $rowUser->id_usuario;
            $_SESSION["nome"] = $rowUser->nome;
            $_SESSION["nome_mat"] = $rowUser->nome_mat;
            $_SESSION["data_nasc"] = $rowUser->data_nasc;
            $_SESSION["id_tipo"] = $rowUser->id_tipo;
            $_SESSION["numero"] = $rowTel->numero;


            print "<script>location.href='tela-2fa.php'</script>";
        } else {
            print "<script>alert('Informações incorreta(s)');</script>";
            print "<script>location.href='tela-login.php'</script>";

        }
        break;

    case "2fa":
        $tipoPergunta = $_POST["tipo"];
        // Função para comportamento 2FA
        function compara($nomeDoCampo, $tipoPergunta, $conn)
        {
            // Capturar informações do 2FA
            $resposta = $_POST["campo"];

            if ($resposta == $_SESSION[$nomeDoCampo]) {
                $sqlLog2FASuccess = "INSERT INTO logs (id_usuario, tipoDeLog, mensagem) VALUES (?, 'Login bem-sucedido', ?)";
                $stmtLog2FASuccess = $conn->prepare($sqlLog2FASuccess);

                if ($stmtLog2FASuccess) {
                    $mensagemSuccess = "Login bem-sucedido com 2FA= {$tipoPergunta}";
                    $stmtLog2FASuccess->bind_param('is', $_SESSION["id_usuario"], $mensagemSuccess);
                    $stmtLog2FASuccess->execute();
                    $stmtLog2FASuccess->close();
                }
                print "<script>location.href='index.php';</script>";
                exit();
            } else {
                $sqlLog2FAFail = "INSERT INTO logs (id_usuario, tipoDeLog, mensagem) VALUES (?, 'Login malsucedido', ?)";
                $stmtLog2FAFail = $conn->prepare($sqlLog2FAFail);

                if ($stmtLog2FAFail) {
                    $mensagemFail = "Login malsucedido com 2FA= {$tipoPergunta}";
                    $stmtLog2FAFail->bind_param('is', $_SESSION["id_usuario"], $mensagemFail);
                    $stmtLog2FAFail->execute();
                    $stmtLog2FAFail->close();
                }
                print "<script>alert('Resposta incorreta');</script>";
                print "<script>location.href='tela-2fa.php?tentativa_falha=1'</script>";
            }
        }

        // Verificação
        switch ($tipoPergunta) {
            case "text":
                compara("nome_mat", $tipoPergunta, $conn);
                break;

            case "tel":
                compara("numero", $tipoPergunta, $conn);
                break;
            case "date":
                compara("data_nasc", $tipoPergunta, $conn);
                break;
        }
        break;


    case "recuperaSenha":
        $cpfDigitado = $_POST["CPF"];
        $cpfEditado = preg_replace('/\D/', '', $cpfDigitado);
        $dataDigitada = $_POST["date"];
        $senhaDigitada = $_POST["senha"];

        // Verificar se há usuário com a data e o CPF específico
        $sql = "SELECT * FROM usuario WHERE data_nasc = '$dataDigitada' AND cpf = '$cpfEditado'";
        $res = $conn->query($sql);

        // Se encontrar o usuário
        if ($res->num_rows > 0) {

            // Query do update da senha
            $sqlUpdateSenha = "UPDATE usuario SET senha = '" . md5($senhaDigitada) . "' WHERE data_nasc = '$dataDigitada' AND cpf = '$cpfEditado'";
            $resUpdate = $conn->query($sqlUpdateSenha);

            // Se a senha foi alterada com sucesso
            if ($resUpdate) {
                print "<script>alert('Senha Alterada com Sucesso');</script>";
                print "<script>location.href='tela-login.php';</script>";
                exit();
            } else {
                print "<script>alert('Erro ao alterar a senha');</script>";
            }
        } else {
            print "<script>alert('Usuário não encontrado no banco de dados. Tente novamente');</script>";
            print "<script>location.href='recuperar-senha.php';</script>";
            exit();
        }

        break;
}

?>