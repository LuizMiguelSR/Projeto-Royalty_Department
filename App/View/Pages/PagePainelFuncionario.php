<?php
    ModelSession::verificaSessao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="App/View/Styles/style.css">
    <title>Painel de <?php echo "{$_SESSION['nome']}"; ?></title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <div class="container-fluid m-auto text-center">
        <header>
            <div class="row">
                <?php include 'App/View/Components/navbar.php'; ?>
            </div>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
                <h1 class="h1 mb-2 fw-normal">Bem vindo, <?php echo "{$_SESSION['nome']}"; ?>!</h1>
        </header>
        <main>
            <?php if($_SESSION['nome'] == 'Administrador') { ?>
                <div class="row mt-5" >
                    <a href="/cadastrarFuncionario" style="width: auto">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Cadastrar" src="App/View/Images/SystemImages/cadastrar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">CADASTRAR</div>
                            <div class="title">Saiba mais</div>
                        </div>
                    </a>
                    <a href="/listaFuncionario" style="width: auto">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Consulta" src="App/View/Images/SystemImages/consultar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">CONSULTAR</div>
                            <div class="title">Saiba mais</div>
                        </div>
                    </a>
                    <a href="/folhaPagamento" style="width: auto">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Folha de Pagamento" src="App/View/Images/SystemImages/folhaPagamento.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">FOLHA DE PAGAMENTO</div>
                            <div class="title">Saiba mais</div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="row">
                <a href="/holerite" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Holerite" src="App/View/Images/SystemImages//holerite.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">HOLERITE</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="/folhaPonto" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Folha de Ponto" src="App/View/Images/SystemImages/folhaPonto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">FOLHA DE PONTO</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="/registroPonto" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Registro de Ponto" src="App/View/Images/SystemImages/registroPonto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">REGISTRO DE PONTO</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
            </div>
        </main>
        <div class="row mt-5">
            <?php include 'App/View/Components/footer.php'; ?>
        </div>
    </div> 
</body>
</html>