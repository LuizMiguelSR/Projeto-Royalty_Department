<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de Funcionário</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../js/main.js" type='module' defer></script>

    <div class="container-fluid m-auto text-center">
        <header>
            <div class="row">
                <?php
                    include '../components/navbar.php';
                ?>
            </div>
        </header>
        <div class="row">
            <div class="person">
                <div class="container">
                    <div class="container-inner">
                        <img class="circle"/>
                        <img class="img img1" alt="Cadastrar" src="../img/cadastrar.svg"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1 class="h3 mb-2 fw-normal">PREENCHA O FORMULÁRIO ABAIXO</h1>
        </div>
        <div class="row mt-5" >
            <main class="form-add w-100 m-auto">
                <form class="row g-3" method="post" action="../classes/funcionarioCadastro.php">
                    <div class="col-md-4">
                        <label for="nome" class="form-label">Nome</label>
                        <input name="nome" type="text" class="form-control" id="nome" required>
                    </div>
                    <div class="col-md-4">
                        <label for="rg" class="form-label">RG</label>
                        <input name="rg" type="text" class="form-control" id="rg" required>
                    </div>
                    <div class="col-md-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <input name="cpf" type="number" class="form-control" id="cpf" required>
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" placeholder="Ex. seunome@email.com" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-4">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input name="telefone" type="number" class="form-control" id="telefone" required>
                    </div>
                    <div class="col-md-4">
                        <label for="cep" class="form-label">CEP</label>
                        <input name="cep" type="text" placeholder="Ex. 01001901" class="form-control" id="cep" required>
                    </div>
                    <div class="col-md-4">
                        <label for="rua" class="form-label">Rua</label>
                        <input name="rua" type="text" class="form-control" id="endereco" required>
                    </div>
                    <div class="col-md-4">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input name="complemento" type="text" class="form-control" id="complemento">
                    </div>
                    <div class="col-md-4">
                        <label for="numero" class="form-label">Número</label>
                        <input name="numero" type="text" class="form-control" id="numero" required>
                    </div>
                    <div class="col-4">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input name="bairro" type="text" class="form-control" id="bairro" required>
                    </div>
                    <div class="col-4">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input name="cidade" type="text" class="form-control" id="cidade" required>
                    </div>
                    <div class="col-4">
                        <label for="estado" class="form-label">Estado</label>
                        <input name="estado" type="text" class="form-control" id="estado" required>
                    </div>
                    <div class="col-4">
                        <label for="pais" class="form-label">País</label>
                        <input name="pais" type="text" class="form-control" id="pais" required>
                    </div>
                    <div class="col-4">
                        <label for="salarioBase" class="form-label">Salário Base</label>
                        <input name="salarioBase" type="number" placeholder=" Ex. R$ 1200,00" class="form-control" id="salarioBase" required>
                    </div>
                    <div class="col-4">
                        <label for="numeroDepedentes" class="form-label">Número de Dependentes</label>
                        <input name="numeroDependentes" type="number" placeholder="Ex. 2 dependentes" class="form-control" id="numeroDependentes" required>
                    </div>
                    <div class="col-4">
                        <label for="departamento" class="form-label">Departamento</label>
                        <input name="departamento" type="text" placeholder="Ex. Vendas" class="form-control" id="departamento">
                    </div>
                    <div class="col-4">
                        <label for="cargo" class="form-label">Cargo</label>
                        <input name="cargo" type="text" placeholder="Ex. Gerente" class="form-control" id="cargo">
                    </div>
                    <div class="col-4">
                        <label for="senha" class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" id="senha" required>
                    </div>
                    <!--<div class="col-4">
                        <label for="confsenha" class="form-label">Confirmar Senha</label>
                        <input type="password" class="form-control" id="confsenha" required>
                    </div>-->
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-primary">CADASTRAR</button>
                    </div>
                </form>
            </main>
        </div>
        <div class="row">
            <a href="painelGerente.php"><img class="mt-3 voltar" src="../img/voltar.png" alt="voltar"></a>
        </div>
        <div class="row">
            <p>VOLTAR</p>
        </div>
        <div class="row mt-5">
            <?php
                include '../components/footer.php';
            ?>
        </div>
    </div>  
</body>
</html>