<?php
    require_once '../configs/sessionAutentica.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/style.css">
    <title>Folha de Ponto de <?php echo "{$_SESSION['nome']}"; ?></title>
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
        <main>
            <div class="row">
                <h1 class="h3 mb-2 fw-normal">FOLHA DE PONTO</h1>
            </div>
            <div class="row mx-5 mt-5">
                <table class="table table-bordered border-success hole">
                    <thead>
                        <tr>
                            <th scope="col" class="table-dark">Data</th>
                            <th scope="col" class="table-dark">Entrada</th>
                            <th scope="col" class="table-dark">Intervalo</th>
                            <th scope="col" class="table-dark">Saída</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-dark">22/10/2022</td>
                            <td class="table-dark">08:00</td>
                            <td class="table-dark">01:00</td>
                            <td class="table-dark">17:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br>
            <div class="row mt-5">
                <a href="<?php echo $voltar = ($_SESSION['nome'] == 'Administrador') ? 'painelGerente.php' : 'painelFuncionario.php' ?>"><img class="mt-3 voltar" src="../img/voltar1.png" alt="voltar"></a>
            </div>
           
            <div class="row">
                <p>VOLTAR</p>
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