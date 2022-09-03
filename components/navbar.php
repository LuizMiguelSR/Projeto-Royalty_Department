<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
        <div class="col-2">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                Menu
            </button>
        </div>
        <div class="col-8"></div>
        <div class="col-2 left">
            <a href="../configs/sair.php"><img class="logout" src="../img/logout.png" alt="logout"></a>
        </div>
        
    </div>
</nav>
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel"><?php echo "{$_SESSION['nome']}"; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <div class="offcanvas-body">
        <div class="row m-2">
            <div class="col-2">
                <img class="logout" src="../img/logout.png" alt="logout">
            </div>
            <div class="col-5">
                <a href="../configs/sair.php">Home</a>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-2">
                <img class="logout" src="../img/logout.png" alt="logout">
            </div>
            <div class="col-5">
                <a href="../configs/sair.php">Cadastrar</a>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-2">
                <img class="logout" src="../img/logout.png" alt="logout">
            </div>
            <div class="col-5">
                <a href="../configs/sair.php">Consultar</a>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-2">
                <img class="logout" src="../img/logout.png" alt="logout">
            </div>
            <div class="col-5">
                <a href="../configs/sair.php">Folha de Pagamento</a>
            </div>
        </div>
    </div>
</div>