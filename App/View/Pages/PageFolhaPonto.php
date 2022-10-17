<?php
    ModelSession::verificaSessao();
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $titulo = 'Folha de Ponto de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <div class="row">
                <h1 class="h3 my-5 fw-normal">CONSULTA A FOLHA DE PONTO</h1>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Data</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Entrada</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Intervalo Ida</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Intervalo Volta</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Saída</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectMes($_SESSION['id_funcionario'], $data) as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo date('d/m/Y', strtotime($func['diames']))?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['entrada']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['almoco_sai']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['almoco_che']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['saida']?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php include 'App/View/Components/back.php'; ?>
    </section>
    <?php include 'App/View/Components/footer.php'; ?>
</body>
</html>