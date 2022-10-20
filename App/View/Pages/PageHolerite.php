<?php
    ModelSession::verificaSessao();
    $titulo = 'Holerite de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <div class="row">
                <h1 class="h3 my-5 fw-normal">Bem vindo(a), <?php echo "{$_SESSION['nome']}"; ?>, este é seu holerite do mês</h1>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 01</td>
                            <?php foreach((new DAOOperacoes)->select('inss') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_1"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 02</td>
                            <?php foreach((new DAOOperacoes)->select('inss') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_2"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 03</td>
                            <?php foreach((new DAOOperacoes)->select('inss') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_3"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 04</td>
                            <?php foreach((new DAOOperacoes)->select('inss') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_4"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Total</td>
                            <?php foreach((new DAOOperacoes)->select('inss') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["total_inss"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
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
                            <?php foreach((new DAOOperacoes)->select('irrf') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_irrf1"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 02</td>
                            <?php foreach((new DAOOperacoes)->select('irrf') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_irrf2"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 03</td>
                            <?php foreach((new DAOOperacoes)->select('irrf') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_irrf3"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 04</td>
                            <?php foreach((new DAOOperacoes)->select('irrf') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_irrf4"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 05</td>
                            <?php foreach((new DAOOperacoes)->select('irrf') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["faixa_irrf5"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Total</td>
                            <?php foreach((new DAOOperacoes)->select('irrf') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["total_irrf"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
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
                            <?php foreach((new DAOOperacoes)->select('departamento') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_departamento'] ){
                            ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["salario_base"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                            <?php foreach((new DAOOperacoes)->select('holerite') as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_holerite'] ){
                            ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["salario_liquido"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-2 mt-4">
                    <form action="../classes/holeriteGerarPdf.php" method="post" target="_blank">
                        <button type="submit" class="btn btn-primary">GERAR PDF</button>
                    </form>
                </div>
            </div>
        </main>
        <?php include 'App/View/Components/back.php'; ?>
    </section>
    <?php include 'App/View/Components/footer.php'; ?>
</body>
</html>