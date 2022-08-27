<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Painel do Funcionário</title>
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
                <h1 class="h1 mb-2 fw-normal">Bem vindo, Funcionário!</h1>
        </header>
        <main>
            <div class="row">
                <a href="holeriteFunc.php" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Holerite" src="../img/holerite.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">HOLERITE</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="bancoHoras.php" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Banco de Horas" src="../img/bancoHoras.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">BANCO DE HORAS</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="folhaPonto.php" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Folha de Ponto" src="../img/ponto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">FOLHA DE PONTO</div>
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