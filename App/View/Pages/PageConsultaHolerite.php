<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $voltar = '/listar_holerite';
    $titulo = 'Holerite de '.$funcionarios[0]['nome_funcionario'];
    $id = $funcionarios[0]['id_funcionario'];

    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <div class="row">
                <h1 class="h3 my-5 fw-normal">Consulta ao Holerite de <?= $funcionarios[0]['nome_funcionario'] ?></h1>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 01</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["inss_fx1"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 02</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["inss_fx2"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 03</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["inss_fx3"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 04</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["inss_fx3"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Total</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["inss_total"], 2, ',', '.') ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
            <span><a href="https://www.in.gov.br/en/web/dou/-/portaria-interministerial-mtp/me-n-12-de-17-de-janeiro-de-2022-375006998" target="_blank">Fonte: Tabela INSS 2022 Oficial</a></span>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success hole">
                <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 01</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["irrf_fx1"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 02</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["irrf_fx2"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 03</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["irrf_fx3"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 04</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["irrf_fx4"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 05</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["irrf_fx5"], 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Total</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["irrf_total"], 2, ',', '.') ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
            <span><a href="https://www.gov.br/receitafederal/pt-br/assuntos/orientacao-tributaria/tributos/irpf-imposto-de-renda-pessoa-fisica#tabelas-de-incid-ncia-mensal" target="_blank">Fonte: Tabela IRRF 2022 Oficial</a></span>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success hole">
                    <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Vale Transporte</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ 220,00</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <span><a href="http://www.planalto.gov.br/ccivil_03/leis/l7418.htm" target="_blank">Fonte: Lei do Vale Transporte</a></span>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success hole">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Líquido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["salario_base"], 2, ',', '.') ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($holerite[0]["salario_liquido"], 2, ',', '.') ?></td>
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