<?php
session_start();

if (isset($_SESSION["id_usuario"])) {
    $idUsuario = $_SESSION["id_usuario"];
    include("config.php");

    $sqlLogLogout = "INSERT INTO logs (id_usuario, tipoDeLog, mensagem) VALUES (?, 'logout', 'Usuário fez logout')";
    $stmtLogLogout = $conn->prepare($sqlLogLogout);

    if ($stmtLogLogout) {
        $stmtLogLogout->bind_param('i', $idUsuario);
        $stmtLogLogout->execute();
        $stmtLogLogout->close();
    }
}
// Limpa as variáveis de sessão e destroi a sessão
unset($_SESSION["id_usuario"]);
unset($_SESSION["nome"]);
unset($_SESSION["nome_mat"]);
unset($_SESSION["data_nasc"]);
unset($_SESSION["id_tipo"]);
unset($_SESSION["numero"]);
session_destroy();

header("Location: index.php");
exit();

?>