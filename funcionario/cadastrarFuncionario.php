<?php
    require_once '../configs/sessionAutentica.php';
    if ($_SESSION['nome'] !== 'Administrador') {
        header('Location: ../configs/sair.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/style.css">
    <title>Cadastro de Funcionário</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../js/apiCEP.js" type='module' defer></script>
    <script type="text/javascript" src="../js/validaCPF.js"></script>
    
    <div class="container-fluid m-auto text-center">
        <header>
            <div class="row">
                <?php
                    include '../components/navbar.php';
                ?>
            </div>
            <img src="../img/logobase.png" class="rounded"><br><br>
        </header>
        <div class="row ">
            <h1 class="h3 mb-2 fw-normal">Cadastro de novo Funcionário</h1>
        </div>
        <div class="row mt-5">
            <main class="form-add w-100 m-auto">
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
                    <img class="col-12 my-5" alt="Endereco" src="../img/realTime1.svg"/>
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
                    <img class="col-12 my-5" alt="Dados Empresa" src="../img/empresaRef1.svg"/>
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
            </main>
        </div>
        <br><br>
        <div class="row">
            <a href="painelFuncionario.php"><img class="mt-3 voltar" src="../img/voltar1.png" alt="voltar"></a>
        </div>
        <div class="row">
            <p>VOLTAR</p>
        </div>
        <div class="row">
            <?php
                include '../components/footer.php';
            ?>
        </div>
    </div>  

</body>
</html>