<?php
    ModelSession::verificaSessao();
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
                            <th>Data</th>
                            <th>Entrada</th>
                            <th>Intervalo Ida</th>
                            <th>Intervalo Volta</th>
                            <th>Saída</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectWhereOrder("funcionario_ponto", "id_funcionario", $_SESSION['id_funcionario'], "diames") as $func): ?>
                            <tr>
                                <td><?php echo date('d/m/Y', strtotime($func['diames']))?></td>
                                <td><?php echo $func['entrada']?></td>
                                <td><?php echo $func['almoco_sai']?></td>
                                <td><?php echo $func['almoco_che']?></td>
                                <td><?php echo $func['saida']?></td>
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