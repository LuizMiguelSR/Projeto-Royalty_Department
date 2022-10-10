<?php
    require_once 'App/Model/ModelSession.php';
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $titulo = 'Cadastro de Funcionários';
    include 'App/View/Components/header.php';
?>
<script src="App/View/js/apiCEP.js" type='module' defer></script>
<script type="text/javascript" src="App/View/js/validaCPF.js"></script>
<main class="form-add w-100 m-auto">
    <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
    <div class="row ">
        <h1 class="h3 mb-2 fw-normal">Cadastro de um novo Funcionário</h1>
    </div>
    <div class="row mt-5">
        <form class="row g-3" method="post" enctype="multipart/form-data" action="../classes/funcionarioCadastro.php">
            <!-- Dados Pessoais -->
            <div class="col-12">
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
            </div>
            <div class="col-4">
                <input name="rg" type="text" class="form-control" id="rg" placeholder="RG" required>
            </div>
            <div class="col-4">
                <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF" required maxlength="11" onblur="return verificarCPF(this.value)">
            </div>
            <div class="col-4">
                <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone" required>
            </div>
            <div class="col-4">
                <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" required>
            </div>
            <div class="col-4">
                <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" required>
            </div>
            <div class="col-4">
                <input name="csenha" type="password" class="form-control" id="csenha" placeholder="Confirmar senha">
            </div>
            <div class="col-12">
                <input name="arquivo" type="file" class="form-control" id="arquivo" placeholder="Selecione o arquivo">
            </div>
            <!-- Endereço -->
            <img class="col-12 my-5" alt="Endereco" src="App/View/Images/SystemImages/realTime.svg"/>
            <div class="col-4">
                <input name="cep" type="text" class="form-control" id="cep" placeholder="CEP" autocomplete="email" required>
            </div>
            <div class="col-4">
                <input name="rua" type="text" class="form-control" id="endereco" placeholder="Rua" required>
            </div>
            <div class="col-4">
                <input name="numero" type="text" class="form-control" id="numero" placeholder="Número" required>
            </div>
            <div class="col-6">
                <input name="complemento" type="text" class="form-control" id="complemento" placeholder="Complemento">
            </div>
            <div class="col-6">
                <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Bairro" required>
            </div>
            <div class="col-4">
                <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade" required>
            </div>
            <div class="col-4">
                <input name="estado" type="text" class="form-control" id="estado" placeholder="Estado" required>
            </div>
            <div class="col-4">
                <input name="pais" type="text" class="form-control" id="pais" placeholder="País" required>
            </div>
            <!-- Dados pertinentes a empresa -->
            <img class="col-12 my-5" alt="Dados Empresa" src="App/View/Images/SystemImages/empresaRef.svg"/>
            <div class="col-3">
                <input name="salarioBase" type="text" class="form-control" id="salarioBase" placeholder="Salário Base" required>
            </div>
            <div class="col-3">
                <input name="numeroDependentes" type="text" class="form-control" id="numeroDependentes" placeholder="Nº Dependentes" required>
            </div>
            <div class="col-3">
                <input name="departamento" type="text" class="form-control" id="departamento" placeholder="Departamento" required>
            </div>
            <div class="col-3">
                <input name="cargo" type="text" class="form-control" id="cargo" placeholder="Cargo" required>
            </div>
            <div class="col-12 mt-5">
                <button type="submit" class="btn btn-primary">CADASTRAR</button>
            </div>
        </form>
    </div>
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>