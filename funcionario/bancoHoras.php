<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Banco de Horas</title>
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
        </header>
        <main>        
            <div class="row">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" alt="Banco de Horas" src="../img/bancoHoras.svg"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h1 class="h3 mb-2 fw-normal">BANCO DE HORAS</h1>
            </div>
            <div class="row mx-5 mt-5">
                <table class="table table-bordered border-success hole">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Intervalo</th>
                            <th scope="col">Saída</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pedro Bial</td>
                            <td>22/10/2022</td>
                            <td>08:00</td>
                            <td>01:00</td>
                            <td>17:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-5">
                <a href="painelFuncionario.php"><img class="mt-3 voltar" src="../img/voltar.png" alt="voltar"></a>
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