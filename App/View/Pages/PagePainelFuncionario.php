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
                    <a href="/cadastrarFuncionario" style="width: auto">
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
                    <a href="/listaFuncionario" style="width: auto">
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
                    <a href="/folhaPagamento" style="width: auto">
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
                <a href="/horaExtra" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Hora Extra" src="App/View/Images/SystemImages/bancoHoras1.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">HORAS EXTRAS</div>
                        <div class="title">Saiba mais</div>
                    </div>
                </a>
                <a href="/folhaPonto" style="width: auto">
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
                <a href="/registroPonto" style="width: auto">
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
        </main>
    </section>
    <?php include 'App/View/Components/footer.php'; ?>
</body>
</html>