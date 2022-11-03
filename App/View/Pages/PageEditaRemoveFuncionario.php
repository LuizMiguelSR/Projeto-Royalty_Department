<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $resultado = (new DAOOperacoes)->listaFuncionario($_POST);

    $voltar = '/gerenciar_funcionarios';
    $titulo = 'Lista de Funcionários';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded">
            <div class="row mx-5 mt-5">
                <h1 class="h3 mt-5 mb-2 fw-normal">Altere informações ou remova um funcionário</h1>
            </div>
            <!-- Select do departamento -->
            <div class="row mx-5 mt-5">
                <!-- Selecionar todos -->
                <form method='POST'>
                    <button type="submit" class="btn btn-primary" name="all">Listar Todos</button>
                </form>
            
                <br><br>
                <form class="row tabela" method='POST'>
                    <select class="form-select col" aria-label="Default select example" name='options_dp' onchange="this.form.submit()">
                        <option value="">Escolha</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Financeiro">Financeiro</option>
                        <option value="RH">RH</option>
                        <option value="Comercial">Comercial</option>
                        <option value="Operacional">Operacional</option>
                        <option value="Vendas">Vendas</option>
                        <option value="T.I">TI</option>
                    </select>
                </form>
                <span>Ordenar: </span>
                <form class="row tabela" method='POST'>
                    <select name="ordenar" id="ordenar" class="form-select col" aria-label="Default select example" onchange="this.form.submit()">
                        <option value="">Escolha</option>
                        <option value="nome_funcionario">Nome</option>";
                        <option value="departamento_nome">Departamento</option>";
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
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">CARGO</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">ALTERAR</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">REMOVER</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $funcionarios) : ?>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['nome_funcionario'] ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['departamento_nome'] ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['cargo'] ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <form method="post" action="/editar_funcionario">
                                    <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <form method="post" action="/excluir_funcionario">
                                        <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
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