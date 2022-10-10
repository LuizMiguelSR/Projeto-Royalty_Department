<?php
    require_once 'App/Model/ModelSession.php';
    ModelSession::verificaSessao();
    /*try {
        require_once '../configs/connectDb.php';
    } catch(PDOException $e) {    
        $e->getMessage();
        include_once '../classes/logSystem.php';
        header('Location: ../errorConnect.php');
    }
    $dados = $conexao->query("Select * FROM departamento");
    $departamento = $dados->fetchAll(PDO::FETCH_ASSOC);
    
    $dados = $conexao->query("Select * FROM holerite");
    $holerite = $dados->fetchAll(PDO::FETCH_ASSOC);
    
    $dados2 = $conexao->query("Select * FROM inss");
    $inss = $dados2->fetchAll(PDO::FETCH_ASSOC);
    
    $dados3 = $conexao->query("Select * FROM irrf");
    $irrf = $dados3->fetchAll(PDO::FETCH_ASSOC);*/
    
    $titulo = 'Holerite de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<main>
    <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
    <div class="row">
        <h1 class="h3 mb-2 fw-normal">Bem vindo(a), <?php echo "{$_SESSION['nome']}"; ?>, este é seu holerite do mês</h1>
    </div>
    <div class="row mx-5 mt-5">
        <table class="table table-bordered border-success hole">
            <thead>
                <tr>
                    <td class="table-dark">INSS a recolher Faixa 04</td>
                    <?php foreach($inss as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_4"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">INSS a recolher Faixa 03</td>
                    <?php foreach($inss as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_3"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">INSS a recolher Faixa 02</td>
                    <?php foreach($inss as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_2"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">INSS a recolher Faixa 01</td>
                    <?php foreach($inss as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_1"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">INSS a recolher Total</td>
                    <?php foreach($inss as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_inss'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["total_inss"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
            </thead>
        </table>
        <span><a href="https://www.in.gov.br/en/web/dou/-/portaria-interministerial-mtp/me-n-12-de-17-de-janeiro-de-2022-375006998" target="_blank">Fonte: Tabela INSS 2022 Oficial</a></span>
    </div>
    <div class="row mx-5 mt-2">
        <table class="table table-bordered border-success hole">
        <thead>
                <tr>
                    <td class="table-dark">IRRF a recolher Faixa 05</td>
                    <?php foreach($irrf as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_irrf_5"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">IRRF a recolher Faixa 04</td>
                    <?php foreach($irrf as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_irrf_4"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">IRRF a recolher Faixa 03</td>
                    <?php foreach($irrf as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_irrf_3"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">IRRF a recolher Faixa 02</td>
                    <?php foreach($irrf as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_irrf_2"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">IRRF a recolher Faixa 01</td>
                    <?php foreach($irrf as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["faixa_irrf_1"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
                <tr>
                    <td class="table-dark">IRRF a recolher Total</td>
                    <?php foreach($irrf as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_irrf'] ){
                    ?>
                    <td class="table-dark">R$ <?= number_format($func["total_irrf"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                </tr>
            </thead>
        </table>
        <span><a href="https://www.gov.br/receitafederal/pt-br/assuntos/orientacao-tributaria/tributos/irpf-imposto-de-renda-pessoa-fisica#tabelas-de-incid-ncia-mensal" target="_blank">Fonte: Tabela IRRF 2022 Oficial</a></span>
    </div>
    <div class="row mx-5 mt-2">
        <table class="table table-bordered border-success hole">
            <thead>
                <tr>
                    <td class="table-dark">Vale Transporte</td>
                    <td class="table-dark">R$ 220,00</td>
                </tr>
            </thead>
        </table>
        <span><a href="http://www.planalto.gov.br/ccivil_03/leis/l7418.htm" target="_blank">Fonte: Lei do Vale Transporte</a></span>
    </div>
    <div class="row mx-5 mt-2">
        <table class="table table-bordered border-success hole">
            <thead>
                <tr>
                    <th scope="col" class="table-dark">Sal. Base</th>
                    <th scope="col" class="table-dark">Sal. Líquido</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($departamento as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_departamento'] ){
                    ?>
                            <td class="table-dark">R$ <?= number_format($func["salario_base"], 2, ',', '.') ?></td>
                    <?php } endforeach; ?>
                    <?php foreach($holerite as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_holerite'] ){
                    ?>
                            <td class="table-dark">R$ <?= number_format($func["salarioliquido"], 2, ',', '.') ?></td>
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
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>