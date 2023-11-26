<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'comunica');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

// if ($conn->connect_error) {
//     die('Erro de conexão: ' . $conn->connect_error);
// } else {
//     echo 'Conexão bem sucedida <br>';
// }

?>