<?php
    require_once '../configs/sessionAutentica.php';
    if ($_SESSION['nome'] !== 'Administrador') {
        header('Location: ../configs/sair.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/style.css">
    <title>Painel do Departamento Pessoal</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <div class="container-fluid m-auto text-center">
        <header>
            <div class="row">
                <?php
                    include '../components/navbar.php';
                ?>
            </div>
            <img src="../img/logobase.png" class="rounded">
            <div class="row mt-5">
           
                <h1 class="h1 mb-2 fw-normal">Bem vindo, <?php echo "{$_SESSION['nome']}"; ?>!</h1>
            </div>
        </header>
        <main>
            <div class="row mt-5" >
                <a href="cadastrarFuncionario.php" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Cadastrar" src="../img/cadastrar1.svg"/>
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
                                <img class="img img1" alt="Consulta" src="../img/consultar1.svg"/>
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
                                <img class="img img1" alt="Folha de Pagamento" src="../img/folha1.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">FOLHA DE PAGAMENTO</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
            </div>
            <div class="row">
                <a href="holerite.php" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Holerite" src="../img/holerite1.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">HOLERITE</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="folhaPonto.php" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Folha de Ponto" src="../img/folhaPonto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">FOLHA DE PONTO</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="registroPonto.php" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Registro de Ponto" src="../img/registroPonto1.svg"/>
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
            <?php
                include '../components/footer.php';
            ?>
        </div>
    </div>
</body>
</html>