<?php
    ModelSession::verificaSessao();

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $dataMes = date('m');
    $dataAno = date('Y');
    
    $titulo = 'Folha de Ponto de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded" alt="Logo da Royalty" title="Logo da Royalty"><br><br>
            <div class="row">
                <h1 class="h3 my-5 fw-normal">CONSULTA A FOLHA DE PONTO</h1>
            </div>
            <span>Ordenar por mês e ano: </span>
            <form class="row tabela" method='POST'>
                <select name="mes" id="mes" class="form-select col" aria-label="Default select example" onchange="this.form.submit()">
                    <?php 
                        for($i = $dataMes; $i >= 1; $i--) { 
                            if($i == $dataMes){
                    ?>
                                <option value="<?= $i ?>" selected><?= (new ModelMes)->Mes($i); ?></option>;
                    <?php   } else { ?>
                                <option value="<?= $i ?>"><?= (new ModelMes)->Mes($i); ?></option>;
                    <?php 
                            }
                        } 
                    ?>
                </select>
                <select name="ano" id="ano" class="form-select col" aria-label="Default select example" onchange="this.form.submit()">
                    <option value=""selected>Selecione um ano</option>
                    <option value="2022" selected>2022</option>";
                </select>
                <button type="submit" class="btn btn-primary mt-2" name="all">Consultar</button>
            </form><br>
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
                        <?php foreach((new DAOOperacoes)->selectMesAnoPonto($_SESSION['id_usuario'], $_POST['ano'], $_POST['mes']) as $func): ?>
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
            <?php include 'App/View/Components/back.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>