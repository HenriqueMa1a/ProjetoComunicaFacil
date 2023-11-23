<?php
include("config.php");
session_start();

switch (@$_REQUEST["acao"]) {
    case "logar":
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        //Lógica do usuário
        $sqlUser = "SELECT * FROM usuario
              WHERE login = '{$login}'
              AND senha='" . md5($senha) . "'";

        $resUser = $conn->query($sqlUser);

        $rowUser = $resUser->fetch_object();
        $qtd = $resUser->num_rows;

        //lógica do telefone
        $sqlTel = "SELECT * FROM telefone
        WHERE id_usuario=" . $rowUser->id_usuario;

        $resTel = $conn->query($sqlTel);

        $rowTel = $resTel->fetch_object();
        // fim da obtenção do telefone
        if ($qtd > 0) {

            $_SESSION["nome"] = $rowUser->nome;
            $_SESSION["nome_mat"] = $rowUser->nome_mat;
            $_SESSION["data_nasc"] = $rowUser->data_nasc;
            $_SESSION["id_tipo"] = $rowUser->id_tipo;
            $_SESSION["numero"] = $rowTel->numero;


            print "<script>location.href='tela-2fa.php'</script>";
        } else {
            print "<script>alert('Login e/ou Senha incorreto(s)');</script>";
            print "<script>location.href='tela-login.php'</script>";
        }
        break;
    case "2fa":
        $tipoPergunta = $_POST["tipo"];
        //function para comportamento 2FA
        function compara($nomeDoCampo)
        {
            //capturar informações do 2FA
            $resposta = $_POST["campo"];

            if ($resposta == $_SESSION[$nomeDoCampo]) {
                print "<script>location.href='index.php';</script>";
            } else {
                print "<script>alert('Resposta incorreta');</script>";
                print "<script>location.href='tela-2fa.php?tentativa_falha=1'</script>";

            }
        }

        //verificação
        switch ($tipoPergunta) {
            case "text":
                compara("nome_mat");
                break;

            case "tel":
                compara("numero");
                break;
            case "date":
                compara("data_nasc");
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
        }

        break;
}

?>