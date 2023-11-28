<?php
include("config.php");

switch (@$_REQUEST["acao"]) {
    case "cadastrar":

        // obtenção dos dados em geral
        $nome = $_POST["nome"];
        $nome_mat = $_POST["nome1"];
        $data_nasc = $_POST["data"];
        $cpf = $_POST["CPF"];
        $cpf = preg_replace('/\D/', '', $cpf); //Remover todos os caracteres que não são dígitos
        $tel = $_POST["tel"];
        $endereco = $_POST["rua"];
        $login = $_POST["login"];
        $senha = md5($_POST["senha"]);
        $plano = isset($_POST["plano"]) ? $_POST["plano"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        //Fim da obtenção dos dados
        // Verificar se o CPF já está cadastrado
        $consultaCPF = "SELECT id_usuario FROM usuario WHERE cpf = '{$cpf}'";
        $resCPF = $conn->query($consultaCPF);

        if ($resCPF && $resCPF->num_rows > 0) {
            print "<script>alert('Usuário com este CPF já está cadastrado')</script>";
            print "<script>location.href='cadastro.php'</script>";
            break;
        }

        // Verificar se o número de telefone já está cadastrado
        $consultaTelefone = "SELECT id_usuario FROM telefone WHERE numero = '{$tel}'";
        $resTelefone = $conn->query($consultaTelefone);

        if ($resTelefone && $resTelefone->num_rows > 0) {
            print "<script>alert('Número de telefone já está cadastrado')</script>";
            print "<script>location.href='cadastro.php'</script>";
            break;
        }

        // início da inserção
        $sql = "INSERT INTO usuario(nome, nome_mat, data_nasc, cpf, endereco, login, senha, genero, id_tipo) VALUES ('{$nome}','{$nome_mat}', '{$data_nasc}', '{$cpf}', '{$endereco}', '{$login}', '{$senha}', '{$gender}',1)";
        $res = $conn->query($sql);

        if ($res) {
            $idUsuario = $conn->insert_id;
            // Inserção do id_plano associado ao usuário com base no nome do plano escolhido
            $planoEscolhido = $_POST["plano"];
            $consultaPlano = "SELECT id_plano FROM comunica.plano WHERE nome = '{$planoEscolhido}'";
            $resPlano = $conn->query($consultaPlano);

            if ($resPlano) {
                $rowPlano = $resPlano->fetch_assoc();
                $idPlano = $rowPlano['id_plano'];
            } else {
                print "<script>alert('O plano não foi escolhido')</script>";
            }
            // fim - plano
            // Inserção do telefone associado ao usuário
            $sqlTelefone = "INSERT INTO telefone(numero, id_usuario, id_plano) VALUES ('{$tel}', {$idUsuario}, {$idPlano})";
            $resTelefone = $conn->query($sqlTelefone);

            if ($resTelefone) {
                print "<script>alert('Cadastrado com sucesso')</script>";
                print "<script>location.href='index.php'</script>";
            } else {
                print "<script>alert('Erro ao cadastrar telefone')</script>";
            }
            //Fim - Telefone

        } else {
            print "<script>alert('Erro ao cadastrar usuário')</script>";
        }

        break;
    //fim da inserção


    case "excluir":

        if (isset($_REQUEST["id"])) {
            $idUsuario = $_REQUEST["id"];

            // Excluir telefones associados ao usuário
            $sqlExcluirTelefone = "DELETE FROM telefone WHERE id_usuario = $idUsuario";
            $resExcluirTelefone = $conn->query($sqlExcluirTelefone);

            $sqlExcluirLogs = "DELETE FROM logs WHERE id_usuario = $idUsuario";
            $resExcluirlogs = $conn->query($sqlExcluirLogs);


            if ($resExcluirTelefone && $resExcluirlogs) {
                // Agora, é seguro excluir o usuário
                $sqlExcluirUsuario = "DELETE FROM usuario WHERE id_usuario = $idUsuario";
                $resExcluirUsuario = $conn->query($sqlExcluirUsuario);

                if ($resExcluirUsuario) {
                    print "<script>alert('Excluído com sucesso')</script>";
                    print "<script>location.href='index.php?page=consulta'</script>";
                } else {
                    print "<script>alert('Erro ao excluir usuário')</script>";
                }
            } else {
                print "<script>alert('Erro ao excluir telefones associados')</script>";
            }
        } else {
            print "<script>alert('ID do usuário não fornecido')</script>";
        }
        break;

    case "editar":

        $nome = $_POST["nome"];
        $nome_mat = $_POST["nome1"];
        $data_nasc = $_POST["data"];
        $cpf = $_POST["CPF_hidden"];
        $cpf = preg_replace('/\D/', '', $cpf); //Remover todos os caracteres que não são dígitos
        $tel = $_POST["tel"];
        $endereco = $_POST["rua"];
        $login = $_POST["login"];
        $senha = md5($_POST["senha"]);
        $plano = isset($_POST["plano"]) ? $_POST["plano"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        //Fim da obtenção dos dados

        // início da edição

        $sql = "UPDATE usuario SET
                    nome='{$nome}',
                    nome_mat='{$nome_mat}',
                    data_nasc='{$data_nasc}',
                    cpf='{$cpf}',
                    endereco='{$endereco}',
                    login='{$login}',
                    senha='{$senha}',
                    genero='{$gender}' WHERE id_usuario= " . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res > 0) {
            print "<script>alert('Editado com sucesso')</script>";
            print "<script>location.href='index.php?page=consulta'</script>";

        } else {
            print "<script>alert('Não foi possível editar')</script>";
        }
        break;
    //fim da edição

}
?>