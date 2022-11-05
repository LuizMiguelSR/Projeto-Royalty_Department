<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $ali = (new DAOOperacoes)->select('aliquota_folha');
    
    $titulo = 'Folha de Pagamento Aliquotas';
    $voltar = '/gerenciar_folha_pagamento';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded">
            <div class="row">
                <h1 class="h3 my-5 fw-normal">Alterar Alíquotas</h1>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Alíquotas</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Valor</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nova Alíquota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>FGTS</td>
                            <td><?= $ali[0]['fgts']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_folha_pagamento_model">
                                    <input name="fgts" type="number" id="fgts" step="0.01" min="0" max="99" required>
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>INSS</td>
                            <td><?= $ali[0]['inss']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_folha_pagamento_model">
                                    <input name="fgts" type="number" id="fgts" step="0.01" min="0" max="99" required>
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Sistema S</td>
                            <td><?= $ali[0]['sistema_s']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_folha_pagamento_model">
                                    <input name="fgts" type="number" id="fgts" step="0.01" min="0" max="99" required>
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>RAT</td>
                            <td><?= $ali[0]['rat']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_folha_pagamento_model">
                                    <input name="fgts" type="number" id="fgts" step="0.01" min="0" max="99" required>
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>