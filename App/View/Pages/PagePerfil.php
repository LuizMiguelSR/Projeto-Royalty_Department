<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();
    
    $voltar = '/listar_funcionario';
    $titulo = 'Perfil de '. $funcionarios[0]['nome_funcionario'];
    include 'App/View/Components/header.php';        
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded">
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
                                                    <img src="<?php echo $funcionarios[0]["foto"]?>" class="img-radius" style="width: 170px; height: 150px" alt="Perfil"/>
                                                </div>
                                                <h6 class="f-w-600"><?= $funcionarios[0]['nome_funcionario'] ?></h6>
                                                <h1 class="user-descrip"><?= $departamento[0]['cargo'] ?></p>
                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Ficha de <?= $funcionarios[0]['nome_funcionario'] ?></h6>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Email</p>
                                                        <h6 class="text-muted f-w-400"><?= $usuarios[0]['email'] ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Telefone</p>
                                                        <h6 class="text-muted f-w-400"><?= $funcionarios[0]['telefone'] ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Dependentes</p>
                                                        <h6 class="text-muted f-w-400"><?= $funcionarios[0]['numero_dependentes'] ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Depto.</p>
                                                        <h6 class="text-muted f-w-400"><?= $departamento[0]['departamento_nome'] ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Salário Base</p>
                                                        <h6 class="text-muted f-w-400"><?= 'R$ '.number_format($departamento[0]['salario_base'], 2, ',', '.') ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">V.T</p>
                                                        <h6 class="text-muted f-w-400">R$ 220,00</h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-12">
                                                        <p class="m-b-10 f-w-600">Endereço</p>
                                                        <h6 class="text-muted f-w-400"><?= $endereco ?></h6>
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
            <?php include 'App/View/Components/backPainel.php'; ?>
        <?php include 'App/View/Components/footer.php'; ?>
        </main>
</body>
</html>