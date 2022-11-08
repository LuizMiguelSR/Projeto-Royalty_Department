<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    try{
        $ali = (new DAOOperacoes)->select('aliquota_folha');
    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Page Select Aliquota folha";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
    $titulo = 'Folha de Pagamento Aliquotas';
    $voltar = '/gerenciar_folha_pagamento';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded" alt="Logo da Royalty" title="Logo da Royalty">
            <div class="row">
                <h1 class="h3 my-5 fw-normal">Alterar Alíquotas da Folha de Pagamento</h1>
            </div>
            <div class="row tabela">
                <form method="post" action="/alterar_aliquota_folha_pagamento_model" class="row tabela">
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
                                    <input name="fgts" type="number" id="input" step="0.01" min="0" max="99">
                                </td>
                            </tr>
                            <tr>
                                <td>INSS</td>
                                <td><?= $ali[0]['inss']*100 ?> %</td>
                                <td>
                                    <input name="inss" type="number" id="input1" step="0.01" min="0" max="99">
                                </td>
                            </tr>
                            <tr>
                                <td>Sistema S</td>
                                <td><?= $ali[0]['sistema_s']*100 ?> %</td>
                                <td>
                                    <input name="sistema_s" type="number" id="input2" step="0.01" min="0" max="99">
                                </td>
                            </tr>
                            <tr>
                                <td>RAT</td>
                                <td><?= $ali[0]['rat']*100 ?> %</td>
                                <td>
                                    <input name="rat" type="number" id="input3" step="0.01" min="0" max="99">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" id="botao" class="btn btn-primary mt-3" style="width: 20%;">Alterar</button>
                </form>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
        <script src="App/View/js/desabilitarBotao.js" type='module' defer></script>
    </section>
</body>
</html>