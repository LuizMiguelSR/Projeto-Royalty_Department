<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $titulo = 'Cadastro de Funcionários';
    $voltar = '/gerenciar_funcionarios';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <script src="App/View/js/apiCEP.js" type='module' defer></script>
        <script type="text/javascript" src="App/View/js/validaCPF.js"></script>
        <script src="path/to/jquery.js"></script>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <div class="row">
                <h1 class="h3 mt-5 mb-2 fw-normal">Cadastro de um novo Funcionário</h1>
            </div>
            <div class="row mt-1">
                <form class="row g-3 formCad" method="post" enctype="multipart/form-data" action="/inserir_funcionario_model">
                    <!-- Dados Pessoais -->
                    <h3 class="my-5">Dados Pessoais</h3>
                    <div class="col-12">
                        <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50">
                    </div>
                    <div class="col-4">
                        <input name="rg" type="text" class="form-control" id="rg" placeholder="RG" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="30">
                    </div>
                    <div class="col-4">
                        <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF" required maxlength="11" onblur="return verificarCPF(this.value)">
                    </div>
                    <div class="col-4">
                        <input name="telefone" type="tel" maxlength="15" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" class="form-control" id="telefone" placeholder="Telefone" required>
                    </div>
                    <div class="col-6">
                        <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
                    </div>
                    <div class="col-6">
                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" maxlength="50" required>
                    </div>
                    <div class="col-12">
                        <input name="arquivo" type="file" accept="image/*" class="form-control-file" id="arquivo" required>
                    </div>
                    <h3 class="my-5">Endereço</h3>
                    <!-- Endereço -->
                    <div class="col-4">
                        <input name="cep" type="number" class="form-control" id="cep" placeholder="CEP" autocomplete="email" maxlength="8" required>
                    </div>
                    <div class="col-4">
                        <input name="numero" type="number" class="form-control" id="numero" placeholder="Número" maxlength="6" required>
                    </div>
                    <div class="col-4">
                        <input name="complemento" type="text" class="form-control" id="complemento" maxlength="50" placeholder="Complemento">
                    </div>
                    <div class="col-6">
                        <input name="rua" type="text" class="form-control" id="endereco" maxlength="50" placeholder="Rua" required>
                    </div>
                    <div class="col-6">
                        <input name="bairro" type="text" class="form-control" id="bairro" maxlength="50" placeholder="Bairro" required>
                    </div>
                    <div class="col-6">
                        <input name="cidade" type="text" class="form-control" id="cidade" maxlength="50" placeholder="Cidade" required>
                    </div>
                    <div class="col-6">
                        <input name="estado" type="text" class="form-control" id="estado" maxlength="50" placeholder="Estado" required>
                    </div>
                    <div class="col-6">
                        <input name="pais" type="text" class="form-control" id="pais" maxlength="50" placeholder="País" value="Brasil">
                    </div>
                    <h3 class="my-5">Dados da Empresa</h3>
                    <!-- Dados pertinentes a empresa -->
                    <div class="col-6">
                        <input name="salarioBase" type="tel" maxlength="10" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" class="form-control" id="salarioBase" placeholder="Salário Base" required>
                    </div>
                    <div class="col-6">
                        <input name="numeroDependentes" type="number" class="form-control" id="numeroDependentes" placeholder="Nº Dependentes" maxlength="2" required>
                    </div>
                    <div class="col-6">
                        <select class="form-select" aria-h3="Default select example" name="departamento" id="departamento">
                            <option value="Administrativo">Administrativo</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="RH">Recursos Humanos</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Comercial">Comercial</option>
                            <option value="Operacional">Operacional</option>
                            <option value="Vendas">Vendas</option>
                            <option value="T.I">Tecnologia da Informação</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select class="form-select" aria-h3="Default select example" name="cargo" id="cargo">
                            <option value="Diretor">Diretor</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Coordenador">Coordenador </option>
                            <option value="Consultor">Consultor</option>
                            <option value="Auxiliar">Auxiliar</option>
                            <option value="Estagiário">Estagiário</option>
                        </select>
                    </div>
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-primary">CADASTRAR</button>
                    </div>
                </form>
            </div>
            <?php include 'App/View/Components/backPainel.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>