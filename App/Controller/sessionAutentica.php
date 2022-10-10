<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (session_id() !== $_SESSION['id'] && $_SERVER['REMOTE_ADDR'] !== $_SESSION['ip']) {
        header('Location: ../configs/sair.php');
        die();
    }
?>