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
    <title>Consultar</title>
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
            <img src="../img/logobase.png" class="rounded"><br><br>
        </header>
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
        </div><br><br>
        <div class="row mt-5">
            <a href="painelFuncionario.php"><img class="mt-3 voltar" src="../img/voltar1.png" alt="voltar"></a>
        </div>
        <div class="row">
            <p>VOLTAR</p>
        </div>
        <div class="row mt-5">
            <?php
                include '../components/footer.php';
            ?>
        </div>
    </div>  
</body>
</html>