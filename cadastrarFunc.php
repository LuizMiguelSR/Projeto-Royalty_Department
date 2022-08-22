<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro de Funcionário</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/main.js" type='module' defer></script>

    <div class="container-fluid m-auto text-center">
        <div class="row">
            <nav class="navbar fixed-top navbar-expand-lg">
                <div class="container-fluid">
                    <img src="img/cadastrar.svg" alt="logo"class="logo2">
                    <p class="mt-2 titulo">Falida Ltda</p>
                    <a href="index.php"><img class="logout" src="img/logout.png" alt="logout"></a>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="person">
                <div class="container">
                    <div class="container-inner">
                        <img class="circle"/>
                        <img class="img img1" src="img/cadastrar.svg"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1 class="h3 mb-2 fw-normal">PREENCHA O FORMULÁRIO ABAIXO</h1>
        </div>
        <div class="row mt-5" >
            <main class="form-add w-100 m-auto">
                <form class="row g-3">
                    <div class="col-md-4">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" placeholder="Ex. seunome@email.com" class="form-control" id="email" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inputTelefone" class="form-label">Telefone</label>
                        <input type="number" class="form-control" id="telefone" required>
                    </div>
                    <div class="col-md-4">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" placeholder="Ex. 01001901" class="form-control" id="cep" required>
                    </div>
                    <div class="col-md-4">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" required>
                    </div>
                    <div class="col-md-4">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" required>
                    </div>
                    <div class="col-4">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro">
                    </div>
                    <div class="col-4">
                        <label for="cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="cidade">
                    </div>
                    <div class="col-4">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado">
                    </div>
                    <div class="col-4">
                        <label for="salarioBase" class="form-label">Salário Base</label>
                        <input type="number" placeholder=" Ex. R$ 1200,00" class="form-control" id="salarioBase">
                    </div>
                    <div class="col-4">
                        <label for="numeroDepedentes" class="form-label">Número de Dependentes</label>
                        <input type="number" placeholder="Ex. 2 dependentes" class="form-control" id="numeroDepedentes">
                    </div>
                    <div class="col-4">
                        <label for="departamento" class="form-label">Departamento</label>
                        <input type="text" placeholder="Ex. Vendas" class="form-control" id="departamento">
                    </div>
                    <div class="col-4">
                        <label for="cargo" class="form-label">Cargo</label>
                        <input type="text" placeholder="Ex. Gerente" class="form-control" id="cargo">
                    </div>
                    <div class="col-4">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha">
                    </div>
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-primary">CADASTRAR</button>
                    </div>
                </form>
            </main>
        </div>
        <div class="row">
            <a href="painelRh.php"><img class="mt-3 voltar" src="img/voltar.png" alt="voltar"></a>
        </div>
        <div class="row">
            <p>VOLTAR</p>
        </div>
        <div class="row mt-5">
            <footer class="py-3 my-5">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">Visão</a>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Projetos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Sobre</a></li>
                </ul>
                <p class="text-center text-muted">&copy; 2022 Falida Ltda</p>
            </footer>
        </div>
    </div>  
</body>
</html>