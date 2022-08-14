<?php
    // Uso da session destroy para deslogar o usuário da sessão
    session_start();
    session_unset();
    session_destroy();
    include 'index.php';
    
?>