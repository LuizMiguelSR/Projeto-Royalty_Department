<?php
    ModelSession::verificaSessao();

    try{
        $funcionario = (new DAOOperacoes)->selectWhere('funcionario','id_funcionario',$_SESSION['id_usuario']);
        $usuario = (new DAOOperacoes)->selectWhere('usuarios','id_usuario',$_SESSION['id_usuario']);
    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Page Editar Perfil passagem de parametro de consulta ao servidor";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }

    $voltar = '/painel';
    $titulo = 'Editar Perfil de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <script src="App/View/js/apiCEP.js" type='module' defer></script>
        <script src="App/View/js/mascara.js" type='text/javascript'></script>
        <script src="path/to/jquery.js"></script>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded" alt="Logo da Royalty" title="Logo da Royalty"><br><br>
            <div class="row">
                <h1 class="h3 mt-5 mb-2 fw-normal">Alterar Perfil de <?= $funcionario[0]['nome_funcionario']?></h1>
            </div>
            <div class="row mt-1">
                <form class="row g-3 formCad" method="post" enctype="multipart/form-data" action="/editar_perfil_model">
                    <!-- Dados Pessoais -->
                    <div class="col-12">
                        <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required value="<?=  $funcionario[0]['nome_funcionario']
                        ?>" pattern="([aA-zZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+)" maxlength="50">
                    </div>
                    <div class="col-4">
                        <input name="telefone" type="text" class="form-control" id="telefone" maxlength="15" onKeyPress="MascaraGenerica(this, 'CELULAR');" placeholder="Telefone" required value="<?=  $funcionario[0]['telefone']
                        ?>">
                    </div>
                    <div class="col-6">
                        <input name="email" type="email" class="form-control" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" placeholder="E-mail" required value="<?=  $usuario[0]['email']
                        ?>">
                    </div>
                    <div class="col-6">
                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" maxlength="50" required>
                    </div>
                    <h5 class="my-3">Inserir Foto</h5>
                    <div class="col-12">
                        <input name="arquivo" type="file" accept="image/png, image/jpeg" class="form-control-file" id="arquivo">
                    </div>
                    <input type="hidden" name="id" value=<?=$_SESSION['id_usuario']?>>
                    <div class="col-12 mt-5">
                        <button type="submit" name="update" id="update" class="btn btn-primary">SALVAR</button>
                    </div>
                </form>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>