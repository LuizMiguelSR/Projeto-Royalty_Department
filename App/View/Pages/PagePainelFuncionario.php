<?php
    ModelSession::verificaSessao();
    $titulo = 'Painel de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded" alt="Logo da Royalty" title="Logo da Royalty"><br><br>
                <h1 class="h1 mt-5 mb-2 fw-normal">Bem vindo, <?php echo "{$_SESSION['nome']}"; ?>!</h1>
            <?php if($_SESSION['nome'] == 'Administrador') { ?>
                <div class="row mt-5" >
                    <a href="/gerenciar_funcionarios" style="width: auto" title="Gerenciar Funcionários">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Gerenciar Funcionários" src="App/View/Images/SystemImages/cadastrar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">GERENCIAR FUNCIONÁRIOS</div>
                            <div class="title">Consulta, altera e remove informações pertinentes aos funcionários</div>
                        </div>
                    </a>
                    <a href="/gerenciar_folha_pagamento" style="width: auto" title="Gerenciar Folha de Pagamento">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Gerenciar Folha de Pagamento" src="App/View/Images/SystemImages/folhaPagamento.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">GERENCIAR<br>FOLHA DE PAGAMENTO</div>
                            <div class="title">Registra e consulta a folha de pagamento e altera informações</div>
                        </div>
                    </a>
                    <a href="/gerenciar_holerite" style="width: auto" title="Gerenciar Holerite">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Gerenciar Holerite" src="App/View/Images/SystemImages/holerite.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">GERENCIAR<br>HOLERITE</div>
                            <div class="title">Registra os holerites dos funcionários e altera informações pertinentes a alíquotas</div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="row">
                <a href="/holerite" style="width: auto" title="Seu Holerite">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Seu Holerite" src="App/View/Images/SystemImages/holerite2.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">HOLERITE</div>
                        <div class="title">Consulta ao seu holerite</div>
                    </div>
                </a>
                <a href="/folha_ponto" style="width: auto" title="Folha de Ponto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Folha de Ponto" src="App/View/Images/SystemImages/folhaPonto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">FOLHA DE PONTO</div>
                        <div class="title">Consulta a sua folha de ponto</div>
                    </div>
                </a>
                <a href="/registro_ponto" style="width: auto" title="Registro de Ponto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Registro de Ponto" src="App/View/Images/SystemImages/registroPonto.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">REGISTRO DE PONTO</div>
                        <div class="title">Registra o seu ponto diário</div>
                    </div>
                </a>
            </div>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>