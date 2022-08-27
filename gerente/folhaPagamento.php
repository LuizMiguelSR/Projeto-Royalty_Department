<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Folha de pagamento</title>
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
                            <img class="img img1" alt="Folha de Ponto" src="../img/folha.svg"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h1 class="h3 mb-2 fw-normal">FOLHA DE PAGAMENTO</h1>
            </div>
            <div class="row mx-5 mt-5">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Recursos Humanos
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-bordered border-success">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Sal. Base</th>
                                            <th scope="col">V.T</th>
                                            <th scope="col">IRRF</th>
                                            <th scope="col">INSS</th>
                                            <th scope="col">Sál. Líquido</th>
                                            <th scope="col">Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pedro Bial</td>
                                            <td>R$ 5.000,00</td>
                                            <td>R$ 220,00</td>
                                            <td>R$ 246,05</td>
                                            <td>R$ 700,00</td>
                                            <td>R$ 3.833,95</td>
                                            <td>
                                                <form action="" method="">
                                                    <input type="hidden" name="deletar" value="">
                                                    <input class="btn btn-light" type="submit" value="Deletar">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Financeiro
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-bordered border-success">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Sal. Base</th>
                                            <th scope="col">V.T</th>
                                            <th scope="col">IRRF</th>
                                            <th scope="col">INSS</th>
                                            <th scope="col">Sál. Líquido</th>
                                            <th scope="col">Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pedro Bial</td>
                                            <td>R$ 5.000,00</td>
                                            <td>R$ 220,00</td>
                                            <td>R$ 246,05</td>
                                            <td>R$ 700,00</td>
                                            <td>R$ 3.833,95</td>
                                            <td>
                                                <form action="" method="">
                                                    <input type="hidden" name="deletar" value="">
                                                    <input class="btn btn-light" type="submit" value="Deletar">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Marketing
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-bordered border-success">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Sal. Base</th>
                                            <th scope="col">V.T</th>
                                            <th scope="col">IRRF</th>
                                            <th scope="col">INSS</th>
                                            <th scope="col">Sál. Líquido</th>
                                            <th scope="col">Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pedro Bial</td>
                                            <td>R$ 5.000,00</td>
                                            <td>R$ 220,00</td>
                                            <td>R$ 246,05</td>
                                            <td>R$ 700,00</td>
                                            <td>R$ 3.833,95</td>
                                            <td>
                                                <form action="" method="">
                                                    <input type="hidden" name="deletar" value="">
                                                    <input class="btn btn-light" type="submit" value="Deletar">
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="row mt-5">
            <a href="painelGerente.php"><img class="mt-3 voltar" src="../img/voltar.png" alt="voltar"></a>
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