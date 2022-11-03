<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $resultado = (new DAOOperacoes)->listaFuncionario($_POST);

    $voltar = '/gerenciar_holerite';
    $titulo = 'Lista de Holerites';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded">
            <div class="row mx-5 mt-5">
                <h1 class="h3 mt-5 mb-2 fw-normal">Utilize os filtros para consultar</h1>
            </div>
            <div class="row mx-5 mt-5">
                <form method='POST'>
                    <button type="submit" class="btn btn-primary" name="all">Listar Todos</button>
                </form>
            
                <br><br>
                <form class="row tabela" method='POST'>
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
            </div><br>
            <div class="row tabela">
                </br>
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">NOME</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">DEPARTAMENTO</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">VER HOLERITE</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $funcionarios) : ?>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['nome_funcionario'] ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['departamento_nome'] ?></td>
                            <!-- Botão que direciona para o perfil -->
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <form method="post" action="/consultar_holerite">
                                    <select name="mes" id="mes" aria-label="Default select example">
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
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>