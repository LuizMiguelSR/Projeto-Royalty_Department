<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $titulo = 'Perfil de '.'';
    include 'App/View/Components/header.php';        
?>
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
                                            <img src="<?php echo "../fotos/".$funcionarios["foto"]?>" class="img-radius" alt="Perfil"/>
                                        </div>
                                        <h6 class="f-w-600"><?= $funcionarios['nome_funcionario'] ?></h6>
                                        <h1 class="user-descrip"><?= $funcionarios['cargo'] ?></p>
                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informações</h6>
                                        <div class="row mt-2">
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"><?= $funcionarios['email'] ?></h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Telefone</p>
                                                <h6 class="text-muted f-w-400"><?= $funcionarios['telefone'] ?></h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Endereço</p>
                                                <h6 class="text-muted f-w-400">Praça da Sé, nº 10, Sé - São Paulo</h6>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Departamento</p>
                                                <h6 class="text-muted f-w-400"><?= $funcionarios['departamento_nome'] ?></h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Salário Base</p>
                                                <h6 class="text-muted f-w-400"><?= $funcionarios['salario_base'] ?></h6>
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
                                                <h6 class="text-muted f-w-400"><?= $funcionarios['numero_dependentes'] ?></h6>
                                            </div>
                                            <?//php endforeach; ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a class="btn" href='editar.php?id=<?=$funcionarios['id_funcionario']?>'>Editar</a>
                                            </div>
                                            <div class="col-sm-4">
                                                <a class="btn" href='editarDeletar.php?id=<?=$funcionarios['id_funcionario']?>'>Excluir</a>
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
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>