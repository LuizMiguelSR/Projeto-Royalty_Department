<?php
    ModelSession::verificaSessao();
    $titulo = 'Painel de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
                <h1 class="h1 mb-2 fw-normal">Bem vindo, <?php echo "{$_SESSION['nome']}"; ?>!</h1>
            <?php if($_SESSION['nome'] == 'Administrador') { ?>
                <div class="row mt-5" >
                    <a href="/inserir_funcionario" style="width: auto">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Cadastrar" src="App/View/Images/SystemImages/cadastrar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">CADASTRAR</div>
                            <div class="title">Saiba mais</div>
                        </div>
                    </a>
                    <a href="/listar_funcionario" style="width: auto">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Consulta" src="App/View/Images/SystemImages/consultar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">CONSULTAR</div>
                            <div class="title">Saiba mais</div>
                        </div>
                    </a>
                    <a href="/folha_pagamento" style="width: auto">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Folha de Pagamento" src="App/View/Images/SystemImages/folhaPagamento.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">FOLHA DE PAGAMENTO</div>
                            <div class="title">Saiba mais</div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="row">
                <a href="/holerite" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Holerite" src="App/View/Images/SystemImages//holerite.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">HOLERITE</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="/folha_ponto" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Folha de Ponto" src="App/View/Images/SystemImages/folhaPonto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">FOLHA DE PONTO</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="/registro_ponto" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Registro de Ponto" src="App/View/Images/SystemImages/registroPonto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">REGISTRO DE PONTO</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
            </div>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>