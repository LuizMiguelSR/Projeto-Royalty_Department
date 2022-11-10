<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    date_default_timezone_set('America/Sao_Paulo');
    $dataMes = date('m');
    $dataAno = date('Y');

    try{
        $resultado = (new DAOOperacoes)->listaFuncionario($_POST);
    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Page Gerenciar holerites passagem de parametro com erro";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
    
    $voltar = '/painel';
    $titulo = 'Gerenciar Holerites';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded mb-5" alt="Logo da Royalty" title="Logo da Royalty">
            <h1 class="h2 mt-5 mb-4 fw-normal">GERENCIAR HOLERITES</h1>
            <div class="row mx-5">
                <form class="row tabela mb-3" method='POST' style="width: 1180px">
                    <select class="form-select col" aria-label="Default select example" name='options_dp' onchange="this.form.submit()">
                        <option value="">Consulta por departamento</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="RH">RH</option>
                        <option value="Comercial">Comercial</option>
                        <option value="Operacional">Operacional</option>
                        <option value="Vendas">Vendas</option>
                        <option value="T.I">TI</option>
                    </select>
                </form>
            </div>
            <div class="row tabela"></br>
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">NOME</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">DEPARTAMENTO</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">REGISTRAR</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">VISUALIZAR</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado[4] as $funcionarios) : ?>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['nome_funcionario'] ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['departamento_nome'] ?></td>
                            <!-- Botão que registra o holerite -->
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <?php
                                if (empty((new DAOOperacoes)->selectMesAnoHolerite2($funcionarios['id_funcionario'], $dataAno, $dataMes))){
                                ?>
                                <form method="post" action="/registrar_holerite_model">
                                    <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>" title="Registrar Holerite">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                        </svg>
                                    </button>
                                </form>
                                <?php
                                    } else {
                                ?>
                                    <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" title="Registrar Holerite">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                        </svg>
                                    </button>
                                <?php
                                    }
                                ?>
                            </td>
                            <!-- Botão que consulta o holerite -->
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <form method="post" action="/consultar_holerite">
                                    <input type="hidden" name="id" value="<?=$funcionarios['id_funcionario']?>">
                                    <select name="mes" id="mes" onchange="this.form.submit()">
                                        <option value="" selected>Mês</option>;
                                        <?php for($i = $dataMes; $i >= 1; $i--) { ?>
                                            <option value="<?= $i ?>"><?= (new ModelMes)->Mes($i); ?></option>;
                                        <?php } ?>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row tabela" role="toolbar" aria-label="Toolbar with button groups">
                    <form method='post' class='mt-5'>
                        <div class="btn-group mr-2" role="group" aria-label="First group">

                        <?php 
                            if($resultado[0] > 1){
                        ?>
                            <button type="submit" class="btn btn-primary" name="pagina" value="<?= $resultado[2] ?>"> << </button>
                        <?php }?>

                        <?php for($i=1; $i<=$resultado[1]; $i++) {
                            if($resultado[0] == $i) {
                                echo "<input type='submit' class='btn btn-primary' name='pagina' value='$i' disabled>";
                            }else {
                                echo "<input type='submit' class='btn btn-primary' name='pagina' value='$i'>";
                            } 
                        } ?>

                        <?php 
                            if($resultado[0] < $resultado[1]){
                        ?>
                            <button type="submit" class="btn btn-primary" name="pagina" value="<?= $resultado[3] ?>">>></button>
                        <?php }?>
                        </div>
                    </form>
                </div>
                <div class="row mx-5 mt-2 mb-5">
                    <h1 class="h2 mt-5 mb-2 fw-normal">CONFIGURAÇÕES</h1>
                    <a href="/alterar_aliquota_holerite" style="width: auto" title="Alterar Alíquotas">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Alterar alíquotas" src="App/View/Images/SystemImages/editarRemove.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">ALTERAR ALÍQUOTAS</div>
                        </div>
                    </a>
                    <a href="/gerenciar_holerite" method='POST' style="width: auto" title="Listar todos">
                        <input type="hidden" name="all">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Listar todos" src="App/View/Images/SystemImages/consultar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">LISTAR TODOS</div>
                        </div>
                    </a>
                </div>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>