<?php
    $nomeFuncionario = $_POST["consultar"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Perfil de <?php echo $nomeFuncionario; ?></title>
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
            <div class="row mt-5">
                <h1 class="h3 mb-2 fw-normal">CONSULTA DE INFORMAÇÕES</h1>
            </div>
            <div class="row mt-3">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-md-12">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <img src="../img/profile.png" class="img-radius" alt="Perfil">
                                                </div>
                                                <h6 class="f-w-600"><?php echo $nomeFuncionario; ?></h6>
                                                <p>Web Designer</p>
                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informações</h6>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Email</p>
                                                        <h6 class="text-muted f-w-400">rntng@gmail.com</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Telefone</p>
                                                        <h6 class="text-muted f-w-400">98979989898</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Endereço</p>
                                                        <h6 class="text-muted f-w-400">Praça da Sé, nº 10, Sé - São Paulo</h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Departamento</p>
                                                        <h6 class="text-muted f-w-400">T.I</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Salário Base</p>
                                                        <h6 class="text-muted f-w-400">R$ 5.000,00</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">V.T</p>
                                                        <h6 class="text-muted f-w-400">R$ 220,00</h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">IRRF</p>
                                                        <h6 class="text-muted f-w-400">R$ 246,00</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">INSS</p>
                                                        <h6 class="text-muted f-w-400">R$ 700,00</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Nº Dependentes</p>
                                                        <h6 class="text-muted f-w-400">4</h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <button class="btn">Editar</button>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <button class="btn">Excluir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="row">
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