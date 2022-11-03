<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $ali = (new DAOOperacoes)->select('aliquota_holerite');
    
    $titulo = 'Holerite Aliquotas';
    $voltar = '/gerenciar_holerite';
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
                            <td>INSS FAIXA 1</td>
                            <td><?= $ali[0]['inss_aliquota_fx1']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_aliquota_fx1" type="text" id="inss_aliquota_fx1">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>INSS FAIXA 2</td>
                            <td><?= $ali[0]['inss_aliquota_fx2']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_aliquota_fx2" type="text" id="inss_aliquota_fx2">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>INSS FAIXA 3</td>
                            <td><?= $ali[0]['inss_aliquota_fx3']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_aliquota_fx3" type="text" id="inss_aliquota_fx3">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>INSS FAIXA 4</td>
                            <td><?= $ali[0]['inss_aliquota_fx4']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_aliquota_fx4" type="text" id="inss_aliquota_fx4">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 1</td>
                            <td><?= $ali[0]['irrf_aliquota_fx1']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_aliquota_fx1" type="text" id="irrf_aliquota_fx1">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 2</td>
                            <td><?= $ali[0]['irrf_aliquota_fx2']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_aliquota_fx2" type="text" id="irrf_aliquota_fx2">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 3</td>
                            <td><?= $ali[0]['irrf_aliquota_fx3']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_aliquota_fx3" type="text" id="irrf_aliquota_fx3">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 4</td>
                            <td><?= $ali[0]['irrf_aliquota_fx4']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_aliquota_fx4" type="text" id="irrf_aliquota_fx4">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>IRRF FAIXA 5</td>
                            <td><?= $ali[0]['irrf_aliquota_fx5']*100 ?> %</td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_aliquota_fx5" type="text" id="irrf_aliquota_fx5">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <h1 class="h3 my-5 fw-normal">Alterar Base</h1>
                </div>
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
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_salario_fx1" type="text" id="inss_salario_fx1">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE INSS FAIXA 2</td>
                            <td>R$ <?= number_format($ali[0]['inss_salario_fx2'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_salario_fx2" type="text" id="inss_salario_fx2">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE INSS FAIXA 3</td>
                            <td>R$ <?= number_format($ali[0]['inss_salario_fx3'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_salario_fx3" type="text" id="inss_salario_fx3">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE INSS FAIXA 4</td>
                            <td>R$ <?= number_format($ali[0]['inss_salario_fx4'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="inss_salario_fx4" type="text" id="inss_salario_fx4">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 1</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx1'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_salario_fx1" type="text" id="irrf_salario_fx1">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 2</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx2'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_salario_fx2" type="text" id="irrf_salario_fx2">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 3</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx3'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_salario_fx3" type="text" id="irrf_salario_fx3">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 4</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx4'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_salario_fx4" type="text" id="irrf_salario_fx4">
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>BASE IRRF FAIXA 5</td>
                            <td>R$ <?= number_format($ali[0]['irrf_salario_fx5'], 2, ',', '.') ?></td>
                            <td>
                                <form method="post" action="/alterar_aliquota_holerite_model">
                                    <input name="irrf_salario_fx5" type="text" id="irrf_salario_fx5">
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