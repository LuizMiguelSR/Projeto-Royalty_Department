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
                <h1 class="h3 my-5 fw-normal">CONSULTA AO HOLERITE</h1>
            </div>
            <span>Ordenar por mês e ano: </span>
            <form class="row tabela" method='POST'>
                <select name="mes" id="mes" class="form-select col" aria-label="Default select example">
                    <option value="">Selecione um mês</option>
                    <option value="12">Dezembro</option>";
                    <option value="11">Novembro</option>";
                    <option value="10">Outubro</option>";
                    <option value="09">Setembro</option>";
                    <option value="08">Agosto</option>";
                    <option value="07">Julho</option>";
                    <option value="06">Junho</option>";
                    <option value="05">Maio</option>";
                    <option value="04">Abril</option>";
                    <option value="03">Março</option>";
                    <option value="02">Fevereiro</option>";
                    <option value="01">Janeiro</option>";
                </select>
                <select name="ano" id="ano" class="form-select col" aria-label="Default select example">
                    <option value="">Selecione um ano</option>
                    <option value="2022">2022</option>";
                </select>
                <button type="submit" class="btn btn-primary mt-2" name="all">Consultar</button>
            </form><br>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 01</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["inss_fx1"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 02</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["inss_fx2"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 03</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["inss_fx3"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Faixa 04</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["inss_fx3"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS Total</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["inss_total"], 2, ',', '.') ?></td>
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
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["irrf_fx1"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 02</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["irrf_fx2"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 03</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["irrf_fx3"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 04</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["irrf_fx4"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Faixa 05</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["irrf_fx5"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">IRRF Total</td>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["irrf_total"], 2, ',', '.') ?></td>
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
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["salario_base"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                            <?php foreach((new DAOOperacoes)->selectMesAnoHolerite($_SESSION['id_usuario'],$_POST['ano'], $_POST['mes']) as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] ){
                            ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">R$ <?= number_format($func["salario_liquido"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php include 'App/View/Components/back.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>