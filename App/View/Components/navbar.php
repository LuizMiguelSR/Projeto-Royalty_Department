<style>
    .navbar.fixed-top.navbar-expand-lg{
        background-color: #0b6567;
        box-shadow: 1px 3px 3px #00000054;
    }
</style>
<nav class="navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
        <div class="col-2">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop"> 
                <img class="logout12" src="App/View/Images/SystemImages/menu.png" alt="menu" title="Menu">
                <h1 class="menu">MENU</h1>
            </button>
        </div>
        <div class="col-8"></div>
        <div class="col-2 left">
            <a href="/"><img class="logout12" src="App/View/Images/SystemImages/logoff.png" alt="logout" title="Logout">
            <h1 class="sair">SAIR</h1>
            </a>
        </div>
    </div>
</nav>
<style>
    :root{
        --cor1: #0b6567;
        --cor2: #0b656780;
        --cor3: #00000054;
        --cor4: #46d160;

        --fonte-padrao: 'Roboto Flex', sans-serif;
        --fonte-destaque: 'Roboto Condensed', sans-serif;
    }
    .sair{
        margin-right: 20px;
        margin-left: 1%;
        margin-top: -23px;
        position:absolute;
        color: white;
        font-size: 120%;
    }
    .menu{
        margin-right: 20px;
        margin-left: 3%;
        margin-top: -23px;
        position:absolute;
        color: white;
        font-size: 120%;
    }
    .offcanvas-header {
        margin-right: 20px;
        margin-left: 20px;
        margin-top: 10px;
        font-family: var(--fonte-destaque);

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
        left: 84px;
    }
    .logout{
        height: 1em;
        width: 1em;
    }
    .offcanvas-body{
        padding: 0px;
        font-family: var(--fonte-padrao);
        font-size: 1.1em;
        font-weight: bolder;
    }
    .offcanvas-body > .row{
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .offcanvas-body > .row:hover{
        background-color: var(--cor2);
        color: white;
    }
    .offcanvas.show:not(.hiding), .offcanvas.showing {
        transform: none;
        padding: 0px;
    }
    @media only screen and (min-width: 1400px){
        .sair{
            margin-right: 20px;
            margin-left: 4%;
            margin-top: -23px;
            position:absolute;
            color: white;
            font-size: 120%;
        }
        .menu{
            margin-right: 20px;
            margin-left: 3%;
            margin-top: -23px;
            position:absolute;
            color: white;
            font-size: 120%;
        }
    }
    @media only screen and (max-width: 800px){
        .sair{
            margin-right: 20px;
            margin-left: -7%;
            margin-top: -23px;
            position:absolute;
            color: white;
            font-size: 120%;
        }
        .menu{
            margin-right: 20px;
            margin-left: 8%;
            margin-top: -23px;
            position:absolute;
            color: white;
            font-size: 120%;
        }
    }
    @media only screen and (max-width: 400px){
        .sair{
            margin-right: 20px;
            margin-left: -10%;
            margin-top: -23px;
            position:absolute;
            color: white;
            font-size: 120%;
        }
        .menu{
            margin-right: 20px;
            margin-left: 7%;
            margin-top: -23px;
            position:absolute;
            color: white;
            font-size: 120%;
        }
    }
</style>
<?php if($_SESSION['nome'] === 'Administrador'){?>
    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <img class="fotoPerfilPequena" src="<?php echo $_SESSION['caminho']; ?>" alt="Foto Perfil Pequena" title="Foto de perfil de <?php echo "{$_SESSION['nome']}"; ?>">
            <div class="log"></div>
            <h5 class="offcanvas-title" id="staticBackdropLabel"><?php echo "{$_SESSION['nome']}"; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-8">
                    <a href="/gerenciar_funcionarios">Gerenciar Funcionários</a>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="/gerenciar_folha_pagamento">Gerenciar folha de pagamento</a>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="/gerenciar_holerite">Gerenciar holerite</a>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="/holerite">Holerite</a>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="/folha_ponto">Folha de Ponto</a>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="/registro_ponto">Registro de Ponto</a>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <img class="fotoPerfilPequena" src="<?php echo $_SESSION['caminho']; ?>" alt="Foto Perfil Pequena" title="Foto de perfil de <?php echo "{$_SESSION['nome']}"; ?>">
            <div class="log"></div>
            <h5 class="offcanvas-title" id="staticBackdropLabel"><?php echo "{$_SESSION['nome']}"; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr>
        <div class="offcanvas-body">
            <div class="row m-2">
                <div class="col-8">
                    <a href="/holerite">Holerite</a>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-8">
                    <a href="/folha_ponto">Folha de Ponto</a>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-8">
                    <a href="/registro_ponto">Registro de Ponto</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
