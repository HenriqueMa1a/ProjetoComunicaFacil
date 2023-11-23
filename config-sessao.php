<?php
// Configura o tempo de expiração da sessão em segundos (por exemplo, 30 minutos)
$tempo_expiracao = 1800; // 30 minutos

// Configura o cache no lado do cliente
header("Cache-Control: no-cache, must-revalidate");

// Define as configurações do cookie de sessão antes de iniciar a sessão
session_set_cookie_params($tempo_expiracao);
session_start();
?>