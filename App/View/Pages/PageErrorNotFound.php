<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App/View/Styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Ops Página não encontrada</title>
</head>
<style>
    img {
        vertical-align: middle;
        height: 21em;
    }
</style>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
    <div class="container-fluid m-auto text-center">
        <div class="row">
            <main class="form-signin w-100 m-auto">
                <h1 class="h1 my-4 fw-normal">PÁGINA NÃO ENCONTRADA</h1>
                <img class="erroimg" src="App/View/Images/SystemImages/erro503.svg" alt="Erro">
            </main>
        </div>
        <div class="row mt-3">
            <a href="/sair"><img class="mt-3 voltar" src="App/View/Images/SystemImages/voltar.png" alt="voltar"></a>
        </div>
        <div class="row">
            <p>VOLTAR</p>
        </div>
        <div class="row mt-3">
            <?php include 'App/View/Components/footer.php'; ?>
        </div>
    </div>
</body>
</html>