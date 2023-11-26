<?php
//include("config-sessao.php");
//if (empty($_SESSION) || $_SESSION['tipo_usuario'] !== 'master') {
// header("Location: tela-usuario-comum.php");
//    exit();
//}
?>
<!-- input de pesquisa -->
<div class="alinhar">
    <div class="pesquisa">
        <input type="text" id="search" placeholder="Digite Nome ou CPF">
        <button class="lupa">
            <i class="bi-search"></i>
        </button>
    </div>
</div>

<!-- TABELA DOS USUÁRIOS CADASTRADOS -->
<table class="responstable">
    <thead>
        <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>Login</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
    </thead>


    <tbody>
        <?php
        include("config.php");
        // trazendo dados da tabela usuario
        $sqlUser = "SELECT * FROM usuario";
        $resUser = $conn->query($sqlUser);
        // trazendo o número de telefone com o respectivo id do usuário
        $sqlTel = "SELECT * FROM telefone";
        $resTel = $conn->query($sqlTel);

        if ($resUser) {
            while ($rowUser = $resUser->fetch_object()) {
                $cpf_formatado = substr($rowUser->cpf, 0, 3) . '.' . substr($rowUser->cpf, 3, 3) . '.' . substr($rowUser->cpf, 6, 3) . '-' . substr($rowUser->cpf, 9, 2);
                $dataFormatada = date('d/m/Y', strtotime($rowUser->data_nasc));
                // trazendo o número de telefone com o respectivo id do usuário
                $sqlTel = "SELECT numero FROM telefone WHERE id_usuario=" . $rowUser->id_usuario;
                $resTel = $conn->query($sqlTel);
                $numeroDoUsuario = $resTel->fetch_object();
                // fim da obtenção do número
                echo "<tr>";
                echo "<td>" . $rowUser->nome . "</td>";
                echo "<td>" . $cpf_formatado . "</td>";
                echo "<td>" . $rowUser->login . "</td>";
                echo "<td>" . $dataFormatada . "</td>";
                echo "<td> <i class='bi bi-eye' id='openModalButton'  onclick=\"modal('" . $rowUser->nome_mat . "', '" . $numeroDoUsuario->numero . "', '" . $rowUser->genero . "', '" . $rowUser->senha . "', '" . $rowUser->endereco . "', '" . $rowUser->id_usuario . "')\"></i> |
                <i class='bi bi-pencil' onclick=\"if (confirm('Tem certeza que deseja editar?')) { location.href='editar-usuario.php?id=" . $rowUser->id_usuario . "'; }\"></i> |
                <i class='bi-trash3' onclick=\"if (confirm('Tem certeza que deseja excluir?')) { location.href='handle-usuario.php?acao=excluir&id=" . $rowUser->id_usuario . "'; }\"></i></td>";
                echo "</tr>";

            }
        } else {
            echo "<script>alert('Não há usuários')</script>";
        }
        ?>
    </tbody>
</table>

<!-- MODAL -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Outras informações</h2>

        <div class="input-group">
            <div class="input-box">
                <label for="nome1">Nome Materno</label>
                <input id="nome1" type="text" name="nome1" disabled>
            </div>


            <div class="input-box">
                <label for="tel">Celular</label>
                <input id="number" type="tel" name="tel" disabled>
            </div>


            <div class="input-box">
                <label for="gender">Gênero</label>
                <input id="gender" type="text" name="gender" disabled>
            </div>

            <div class="input-box">
                <label for="senha">Senha</label>
                <input id="password" type="text" name="senha" disabled>
            </div>

            <div class="input-box">
                <label for="rua">Endereço</label>
                <input id="rua" type="text" name="rua" disabled>
            </div>



        </div>

        <br><br><br><br>
        <div class="enviar">
            <button id="log">Gerar Logs</button>
        </div>


    </div>
</div>
<div class="overlay" id="overlay" onclick="fecharModal()"></div>


<div id="modalLogs">
    <div class="modal-content">
        <!-- Conteúdo do seu segundo modal -->
        <span class="close" id="closeModalLogs" onclick="fecharModalLogs()">&times;</span>
        <h2>Log de Informações</h2>
        <!-- Inserção da tabela para exibir logs -->
        <table id="tabelaLogs">
            <thead>
                <tr>
                    <th>Data/Hora</th>
                    <th>Tipo de Log</th>
                    <th>Mensagem</th>
                </tr>
            </thead>
            <tbody id="corpoTabelaLogs"></tbody>
        </table>
    </div>
</div>
<div id="overlayLogs" onclick="fecharModalLogs()"></div>

<script src="./javascript/tabela.js"></script>
<script>
    function carregarLogsUsuario(idUsuario) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {

                var logs = JSON.parse(xhr.responseText);

                document.getElementById("corpoTabelaLogs").innerHTML = "";

                logs.forEach(function (log) {
                    var row = document.getElementById("corpoTabelaLogs").insertRow(-1);
                    var cellDataHora = row.insertCell(0);
                    var cellTipoDeLog = row.insertCell(1);
                    var cellMensagem = row.insertCell(2);


                    cellDataHora.innerHTML = log.data_hora;
                    cellTipoDeLog.innerHTML = log.tipoDeLog;
                    cellMensagem.innerHTML = log.mensagem;

                });
            }
        };

        xhr.open("GET", "get_logs_usuario.php?id_usuario=" + idUsuario, true);
        xhr.send();
    }
    // FUNÇÃO PARA FECHAR O MODAL DE LOGS
    function fecharModalLogs() {
        var modalLogs = document.getElementById("modalLogs");
        var overlayLogs = document.getElementById("overlayLogs");

        modalLogs.style.display = "none";
        overlayLogs.style.display = "none";

        document.body.classList.remove("modal-open");
        document.documentElement.classList.remove("modal-open");
    }

    // Adiciona o evento de clique ao botão de fechar e ao overlay
    document.getElementById("closeModalLogs").addEventListener("click", fecharModalLogs);
    document.getElementById("overlayLogs").addEventListener("click", fecharModalLogs);

</script>