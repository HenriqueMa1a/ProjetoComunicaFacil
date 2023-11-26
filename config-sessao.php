<?php
$tempo_expiracao = 300;

//server
ini_set('session.gc_maxlifetime', $tempo_expiracao);
ini_set('session.cookie_lifetime', $tempo_expiracao);

// Configura o cache no lado do cliente
header("Cache-Control: no-cache, must-revalidate");

// Define as configurações do cookie de sessão antes de iniciar a sessão
session_set_cookie_params($tempo_expiracao);
session_start();
?>