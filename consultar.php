<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Consultar</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/main.js" type='module' defer></script>

    <div class="container-fluid m-auto text-center">
        <div class="row">
            <nav class="navbar fixed-top navbar-expand-lg">
                <div class="container-fluid">
                    <img src="img/consultar.svg" alt="logo"class="logo2">
                    <p class="mt-2 titulo">Falida Ltda</p>
                    <a href="index.php"><img class="logout" src="img/logout.png" alt="logout"></a>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="person">
                <div class="container">
                    <div class="container-inner">
                        <img class="circle"/>
                        <img class="img img1" src="img/consultar.svg"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1 class="h3 mb-2 fw-normal">DIGITE O NOME DO FUNCIONÁRIO</h1>
        </div>
        <div class="row mt-2">
            <main class="form-add w-100 m-auto">
                <form action="perfil.php" method="post" class="row g-3">
                    <div class="col-md-8">
                        <input name="consultar" type="text" class="form-control" id="consultar" placeholder="Ex. Funcionário Antônio">
                    </div>
                    <div class="row">
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary">CONSULTAR</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
        <div class="row mt-5">
            <a href="painelRh.php"><img class="mt-3 voltar" src="img/voltar.png" alt="voltar"></a>
        </div>
        <div class="row">
            <p>VOLTAR</p>
        </div>
        <div class="row mt-5">
            <footer class="py-3 my-5">
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