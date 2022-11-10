<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    try{
        $resultado = (new DAOOperacoes)->listaFuncionario($_POST);
    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Page Gerenciar Funcionarios o metodo post com erros";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
    $voltar = '/painel';
    $titulo = 'Gerenciar Colaboradores';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded" alt="Logo da Royalty" title="Logo da Royalty">
            <h1 class="h2 mt-5 mb-5 fw-normal">GERENCIAR COLABORADORES</h1>
            <div class="row mx-5">
                <form class="mb-3" method='POST' style="width: 1180px">
                    <select class="form-select" aria-label="Default select example" name='options_dp' onchange="this.form.submit()">
                        <option value="">Listar por Departamento</option>
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
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">PERFIL</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">ALTERAR</td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">REMOVER</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado[4] as $funcionarios) : ?>
                        <tr>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['nome_funcionario'] ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= $funcionarios['departamento_nome'] ?></td>
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <form method="post" action="/consultar_funcionario">
                                    <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>" title="Ver perfil">
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
                            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <form method="post" action="/editar_funcionario">
                                    <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>" title="Editar informações">
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
                                        <button type="submit" class='btn btn-sm btn-primary' name="id" value="<?=$funcionarios['id_funcionario']?>" title="Remover funcionário">
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
                    <a href="/inserir_funcionario" style="width: auto" title="Cadastrar colaborador">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Cadastrar" src="App/View/Images/SystemImages/cadastrar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">CADASTRAR COLABORADOR</div>
                        </div>
                    </a>
                    <a href="/gerenciar_funcionarios" method='POST' style="width: auto" class="mb-5" title="Listar todos colaboradores">
                        <input type="hidden" name="all">
                        <div class="person">
                            <div class="container">
                                <div class="container-inner">
                                    <img class="circle"/>
                                    <img class="img img1" alt="Listar todos" src="App/View/Images/SystemImages/consultar.svg"/>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="name">LISTAR TODOS COLABORADORES</div>
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