<?php
    ModelSession::verificaSessao();

    $titulo = 'Gerenciar Folha de Pagamento';
    $voltar = '/painel';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <h1 class="h1 mt-5 mb-2 fw-normal">GERENCIAMENTO DE FOLHA DE PAGAMENTO</h1>
            <div class="row mt-5" >
                <a href="/listar_funcionario" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Consulta" src="App/View/Images/SystemImages/cadastrar2.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">REGISTRAR</div>
                        <div class="title">Registra a folha de pagamento mensal</div>
                    </div>
                </a>
                <a href="/folha_pagamento" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Consulta" src="App/View/Images/SystemImages/consultar.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">CONSULTAR</div>
                        <div class="title">Consulta folha de pagamento</div>
                    </div>
                </a>
                <a href="/alterar_aliquota_folha_pagamento" style="width: auto">
                    <div class="person">
                        <div class="container">
                            <div class="container-inner">
                                <img class="circle"/>
                                <img class="img img1" alt="Consulta" src="App/View/Images/SystemImages/editarRemove.svg"/>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="name">ALTERAR ALíQUOTAS</div>
                        <div class="title">Altera as alíquotas da folha de pagamento</div>
                    </div>
                </a>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>