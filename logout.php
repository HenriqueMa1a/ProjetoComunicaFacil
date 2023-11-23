<?php
session_start();
unset($_SESSION["nome"]);
unset($_SESSION["nome_mat"]);
unset($_SESSION["data_nasc"]);
unset($_SESSION["id_tipo"]);
session_destroy();
header("Location: index.php");
exit();
?>