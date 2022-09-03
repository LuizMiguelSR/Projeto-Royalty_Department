<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
?>
<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
        <div class="col-2 left">
            <a href="../configs/sair.php"><img class="logout" src="../img/logout.png" alt="logout"></a>
        </div>
        
    </div>
</nav>