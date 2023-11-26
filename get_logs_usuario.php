<?php
include("config.php");

$idUsuario = $_GET['id_usuario'];

$sql = "SELECT * FROM logs WHERE id_usuario = $idUsuario";
$result = $conn->query($sql);

$logs = array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $logs[] = $row;
    }
}

// Retorna os dados dos logs em formato JSON
header('Content-Type: application/json');
echo json_encode($logs);
?>