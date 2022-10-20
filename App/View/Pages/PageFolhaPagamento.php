<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $resultado = (new ModelFolhaPagamento)->calculaFolha();
    
    $titulo = 'Folha de Pagamento';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded">
            <div class="row">
                <h1 class="h3 my-5 fw-normal">FOLHA DE PAGAMENTO</h1>
            </div>
            <div class="row my-3">
                <h5>ADMINISTRATIVO</h5>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('Administrativo') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <h5>FINANCEIRO</h5>
            </div>  
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('Financeiro') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <h5>RECURSOS HUMANOS</h5>
            </div> 
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('RH') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <h5>MARKETING</h5>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('Marketing') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <h5>COMERCIAL</h5>
            </div> 
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('Comercial') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <h5>OPERACIONAL</h5>
            </div> 
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('Operacional') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <h5>VENDAS</h5>
            </div> 
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('Vendas') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row my-3">
                <h5>TECNLOGIA DA INFORMAÇÃO</h5>
            </div> 
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Nome</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach((new DAOOperacoes)->selectFolha('T.I') as $func): ?>
                            <tr>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $func['nome_funcionario']?></td>
                                <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($func['salario_base'], 2, ',', '.')?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><br> 
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">FGTS</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INSS</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Sist. S</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">RAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($resultado[0], 2, ',', '.') ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($resultado[1], 2, ',', '.') ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($resultado[2], 2, ',', '.') ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($resultado[3], 2, ',', '.') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div><br>  
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Total da Folha de pagamento</th>
                        </tr>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= 'R$ '.number_format($resultado[4], 2, ',', '.') ?></td>
                        </tr>
                </table>
            </div>
            <?php include 'App/View/Components/back.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>