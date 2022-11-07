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
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded mb-5">
            <h1 class="h2 mt-5 mb-4 fw-normal">GERENCIAR HOLERITES</h1>
            <div class="row mx-5">
                <form class="row tabela mb-3" method='POST'>
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
                                    <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>
                                    </button>
                                </form>
                                <?php
                                    } else {
                                ?>
                                    <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
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
                    <a href="/alterar_aliquota_holerite" style="width: auto">
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
                    <a href="/gerenciar_holerite" method='POST' style="width: auto">
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