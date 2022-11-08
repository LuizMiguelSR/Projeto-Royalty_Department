<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    try{
        $ali = (new DAOOperacoes)->select('aliquota_holerite');
    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Page Select Aliquota Holerite";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
    $titulo = 'Holerite Aliquotas';
    $voltar = '/gerenciar_holerite';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded" alt="Logo da Royalty" title="Logo da Royalty">
            <div class="row">
                <h1 class="h3 my-5 fw-normal">Alterar Alíquotas</h1>
            </div>
            <div class="row tabela">
                <form method="post" class="row tabela" action="/alterar_aliquota_holerite_model">
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
                            <td>INSS FAIXA 1</td>
                            <td><?= $ali[0]['inss_aliquota_fx1']*100 ?> %</td>
                            <td>
                                <input name="inss_aliquota_fx1" type="number" id="input" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>INSS FAIXA 2</td>
                            <td><?= $ali[0]['inss_aliquota_fx2']*100 ?> %</td>
                            <td>
                                <input name="inss_aliquota_fx2" type="number" id="input1" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>INSS FAIXA 3</td>
                            <td><?= $ali[0]['inss_aliquota_fx3']*100 ?> %</td>
                            <td>
                                <input name="inss_aliquota_fx3" type="number" id="input2" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>INSS FAIXA 4</td>
                            <td><?= $ali[0]['inss_aliquota_fx4']*100 ?> %</td>
                            <td>
                                <input name="inss_aliquota_fx4" type="number" id="input3" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 1</td>
                            <td><?= $ali[0]['irrf_aliquota_fx1']*100 ?> %</td>
                            <td>
                                <input name="irrf_aliquota_fx1" type="number" id="input4" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 2</td>
                            <td><?= $ali[0]['irrf_aliquota_fx2']*100 ?> %</td>
                            <td>
                                <input name="irrf_aliquota_fx2" type="number" id="input5" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 3</td>
                            <td><?= $ali[0]['irrf_aliquota_fx3']*100 ?> %</td>
                            <td>
                                <input name="irrf_aliquota_fx3" type="number" id="input6" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 4</td>
                            <td><?= $ali[0]['irrf_aliquota_fx4']*100 ?> %</td>
                            <td>
                                <input name="irrf_aliquota_fx4" type="number" id="input7" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 5</td>
                            <td><?= $ali[0]['irrf_aliquota_fx5']*100 ?> %</td>
                            <td>
                                <input name="irrf_aliquota_fx5" type="number" id="input8" step="0.01" min="0" max="99">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" id="botao" class="btn btn-primary mt-4" style="width: 20%;">Alterar</button>
                </form>
                <div class="row">
                    <h1 class="h3 my-5 fw-normal">Alterar Base</h1>
                </div>
                <form method="post" class="row tabela" action="/alterar_aliquota_holerite_model">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Base</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Valor</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nova Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BASE INSS FAIXA 1</td>
                            <td>R$ <?= number_format($ali[0]['inss_salario_fx1'], 2, ',', '.') ?></td>
                            <td>
                                <input name="inss_salario_fx1" type="number" id="input9" step="0.01" min="0" max="50000">   
                            </td>
                        </tr>
                        <tr>
                            <td>BASE INSS FAIXA 2</td>
                            <td>R$ <?= number_format($ali[0]['inss_salario_fx2'], 2, ',', '.') ?></td>
                            <td>
                                <input name="inss_salario_fx2" type="number" id="input10" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                        <tr>
                            <td>BASE INSS FAIXA 3</td>
                            <td>R$ <?= number_format($ali[0]['inss_salario_fx3'], 2, ',', '.') ?></td>
                            <td>
                                <input name="inss_salario_fx3" type="number" id="input11" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                        <tr>
                            <td>BASE INSS FAIXA 4</td>
                            <td>R$ <?= number_format($ali[0]['inss_salario_fx4'], 2, ',', '.') ?></td>
                            <td>
                                <input name="inss_salario_fx4" type="number" id="input12" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 1</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx1'], 2, ',', '.') ?></td>
                            <td>
                                <input name="irrf_salario_fx1" type="number" id="input13" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 2</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx2'], 2, ',', '.') ?></td>
                            <td>
                                <input name="irrf_salario_fx2" type="number" id="input14" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 3</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx3'], 2, ',', '.') ?></td>
                            <td>
                                <input name="irrf_salario_fx3" type="number" id="input15" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 4</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx4'], 2, ',', '.') ?></td>
                            <td>
                                <input name="irrf_salario_fx4" type="number" id="input16" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 5</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx5'], 2, ',', '.') ?></td>
                            <td>
                                <input name="irrf_salario_fx5" type="number" id="input17" step="0.01" min="0" max="50000">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" id="botao2" class="btn btn-primary mt-4" style="width: 20%;">Alterar</button>
                </form>
            </div>
            <script src="App/View/js/desabilitarBotaoHolerite1.js" type='module' defer></script>
            <script src="App/View/js/desabilitarBotaoHolerite2.js" type='module' defer></script>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>