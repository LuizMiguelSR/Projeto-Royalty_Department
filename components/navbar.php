<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
        <div class="col-2">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                Menu
            </button>
        </div>
        <div class="col-8"></div>
        <div class="col-2 left">
            <a href="../configs/sair.php"><img class="logout12" src="../img/logoff.png" alt="logout"></a>
        </div>
        
    </div>
</nav>
<style>
    .offcanvas-header {
        margin-top: 10px;
    }
    .fotoPerfilPequena {
        vertical-align: middle;
        height: 4em;
        width: 4em;
        border-radius: 10px;
    }
    .log {
        height: 1.2em;
        width: 1.2em;
        border-radius: 50%;
        border: solid;
        background-color: #46d160;
        position: absolute;
        top: 73px;
        left: 75px;
    }
    .logout{
        height: 1em;
        width: 1em;
    }
    a {
        text-allign: right;
    }
</style>
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <img class="fotoPerfilPequena" src="<?php echo $_SESSION['caminho']; ?>" alt="Foto Perfil Pequena">
        <div class="log"></div>
        <h5 class="offcanvas-title" id="staticBackdropLabel"><?php echo "{$_SESSION['nome']}"; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <div class="offcanvas-body">
        <div class="row m-2">
            <div class="col-2">
                <img class="logout" src="../img/menu1.png" alt="logout">
            </div>
            <div class="col-8">
                <a href="holerite.php">Holerite</a>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-2">
                <img class="logout" src="../img/menu1.png" alt="logout">
            </div>
            <div class="col-8">
                <a href="folhaPonto.php">Folha de Ponto</a>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-2">
                <img class="logout" src="../img/menu1.png" alt="logout">
            </div>
            <div class="col-8">
                <a href="registroPonto.php">Registro de Ponto</a>
            </div>
        </div>
    </div>
</div>
