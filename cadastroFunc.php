<?php
    /*
        Página destinada ao formulário de cadastro de funcionários dentro do sistema, apenas usuários na sessão de administrador
        tem acesso a está página.
    */
    session_start();
    if($_SESSION['nome'] != 'Administrador') {
        include 'sair.php';
    } else {
?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <title>Cadastro Funcionário</title>
        </head>
        <body>
            <!-- NavBar utilizando o BootStrap -->
            <div class="container">
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">                
                        <a class="navbar-brand" href="calculadora.php">Cadastro Funcionário</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link">Usuário: <?php echo "{$_SESSION['nome']}"; ?> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="folha.php">Folha de pagamento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sair.php">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>    
            </div>
            
            <!-- Título -->
            <div class="container mt-5">
                <div class="row">
                    <h3 class="mt-5 text-center">CADASTRO DE FUNCIONÁRIO</h3>
                </div>
            </div>
            <!-- Formulário de entrada de valores
                Formulário de entrada de valores correpondente ao registro de um novo
                dentro de um sistema de folha de pagmento.
            -->
            <div class="container mt-3">
                <form action="novo_user.php" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputNome">Nome</label>
                            <input name="nome" type="text" class="form-control" id="inputNome" placeholder="Nome" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCod">Código</label>
                            <input name="cod" type="number" class="form-control" id="inputCod" placeholder="Código" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword">Senha</label>
                            <input name="senha" type="password" class="form-control" id="inputSenha" placeholder="Senha" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <label for="inputSalBase">Salário Base</label>
                            <input name="salBase" type="number" class="form-control" id="inputSalBase" placeholder=" Ex. R$ 1200,00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDias">Dias trabalhados</label>
                            <input name="dias" type="number" class="form-control" id="inputDias" placeholder="Ex. 22 dias" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDep">Número de Dependentes</label>
                            <input name="dep" type="number" class="form-control" id="inputDep" placeholder="Ex. 2 dependentes" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>                
                </form>
            </div>
        </body>
        <footer class="blog-footer">
            <h3>
                <p class="mt-3 text-center">
                    <?php 
                        $fez=["Feito ","em ","PHP"];
                        for($i = 0; $i < 3; $i++){
                            echo $fez[$i];
                        } 
                    ?>
                </p>
            </h3>   
        </footer> 
    </html>
<?php } ?>