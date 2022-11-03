<?php
    ModelSession::verificaSessao();

    $titulo = 'Gerenciar Funcionários';
    $voltar = '/painel';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <h1 class="h1 mt-5 mb-2 fw-normal">GERENCIAMENTO DE FUNCIONÁRIOS</h1>
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
                        <div class="title">Insere um novo funcionário ao sistema</div>
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
                        <div class="title">Consulta informações de funcionários</div>
                    </div>
                </a>
                <a href="/edita_remove_funcionario" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Consulta" src="App/View/Images/SystemImages/editarRemove.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">ALTERAR OU REMOVER</div>
                        <div class="title">Altera informações ou remove funcionários</div>
                    </div>
                </a>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>