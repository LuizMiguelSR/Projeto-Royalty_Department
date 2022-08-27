<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
?>
<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
        <img src="../img/logoEntrada.svg" alt="logo"class="logo2">
        <p class="mt-2 titulo">Royal Logística</p>
        <a href="../configs/sair.php"><img class="logout" src="../img/logout.png" alt="logout"></a>
    </div>
</nav>