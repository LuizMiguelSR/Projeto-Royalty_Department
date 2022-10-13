<?php
    ModelSession::verificaSessao();

    $titulo = 'Folha de Ponto de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<main>
    <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
    <div class="row">
        <h1 class="h3 mb-2 fw-normal">CONSULTA A FOLHA DE PONTO</h1>
    </div>
    <div class="row mx-5 mt-5">
        <table class="table table-bordered border-success hole">
            <thead>
                <tr>
                    <th scope="col" class="table-dark">Data</th>
                    <th scope="col" class="table-dark">Entrada</th>
                    <th scope="col" class="table-dark">Intervalo Ida</th>
                    <th scope="col" class="table-dark">Intervalo Volta</th>
                    <th scope="col" class="table-dark">Saída</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach((new DAOOperacoes)->selectWhereOrder("funcionario_ponto", "id_funcionario", $_SESSION['id_funcionario'], "diames") as $func): ?>
                    <tr>
                        <td class="table-dark"><?php echo date('d/m/Y', strtotime($func['diames']))?></td>
                        <td class="table-dark"><?php echo $func['entrada']?></td>
                        <td class="table-dark"><?php echo $func['almoco_sai']?></td>
                        <td class="table-dark"><?php echo $func['almoco_che']?></td>
                        <td class="table-dark"><?php echo $func['saida']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>