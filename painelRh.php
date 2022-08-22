<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Painel do RH</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <div class="container-fluid m-auto text-center">
        <div class="row">
            <nav class="navbar fixed-top navbar-expand-lg">
                <div class="container-fluid">
                    <img src="img/logoEntrada.svg" alt="logo"class="logo2">
                    <p class="mt-2 titulo">Falida Ltda</p>
                    <a href="index.php"><img class="logout" src="img/logout.png" alt="logout"></a>
                </div>
            </nav>
        </div>
        <div class="row mt-5">
            <h1 class="h3 mb-2 fw-normal">ESCOLHA UMA DAS OPÇÕES ABAIXO</h1>
        </div>
        <div class="row mt-5" >
            <a href="cadastrarFunc.php" style="width: auto">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" src="img/cadastrar.svg"/>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="name">CADASTRAR</div>
                    <div class="title">Saiba mais</div>
                </div>
            </a>
            <a href="consultar.php" style="width: auto">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" src="img/consultar.svg"/>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="name">CONSULTAR</div>
                    <div class="title">Saiba mais</div>
                </div>
            </a>
            <a href="folhaPagamento.php" style="width: auto">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" src="img/folha.svg"/>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="name">FOLHA DE PAGAMENTO</div>
                    <div class="title">Saiba mais</div>
                </div>
            </a>
        </div>
        <div class="row mt-5">
            <footer class="pt-5 mt-5">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">Visão</a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Projetos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Sobre</a></li>
                </ul>
                <p class="text-center text-muted">&copy; 2022 Falida Ltda</p>
            </footer>
        </div>
    </div>
</body>
</html>