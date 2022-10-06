<?php
# Incluir página com de conexão com o banco de dados
include_once('../configs/connectDB.php');

    require_once '../configs/sessionAutentica.php';
    if ($_SESSION['nome'] !== 'Administrador') {
        header('Location: ../configs/sair.php');
        die();
    }

    $filtro_sql = " ";
    
    //Clicou em filtrar?

    if(!empty($_GET['all'])) {

        // Cria filtro em SQL
        $filtro_sql = "";
   
    } 

    if(!empty($_GET['filtro'])) {

        // Cria filtro em SQL

        $filtro = $_GET["filtro"];

        $filtro_sql = "WHERE f.nome_funcionario LIKE '%$filtro%' OR f.cpf LIKE '$filtro'";
   
    } 
    
    # Botão para ordernar por departamento
        else if (!empty($_GET['options_dp'])){

        //Obtém o filtro digitado pelo usuário
        
        $filtro_dp = $_GET["options_dp"];

        $filtro_sql = "WHERE d.departamento_nome LIKE '%$filtro_dp%'";

    }    
    
    $ordenar_sql= "ORDER BY nome_funcionario";

    # Botão para ordernar pelo departamento em ordem alfabética ou nome em ordem alfabética

    if (!empty($_GET["ordenar"])){

        //Obtém o filtro digitado pelo usuário
        
        $ordenar = $_GET["ordenar"];

        $ordenar_sql = "ORDER BY $ordenar";

    }  

        

# Passa para a variável chamada $sql o comando SELECT que verifica
# se esses parâmetros existem no banco de dados. 

# Junção de duas tabelas
$sql = "SELECT  * FROM funcionario AS f 
INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco
$filtro_sql
$ordenar_sql";

#WHERE d.departamento_nome = 'Comercial'

# Passa a váriavel $sql para uma query. 
# Query é uma solicitação ao banco de dados.
# Result é o resultado dessa solicitação, vai passar o número de linhas que
# existem no banco de dados com os parâmetros passados.
# conexão é a várivel declarada no config.php
$resultado = $conexao->query($sql);

//print_r($result); mostrar o resultado

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/style.css">
    <title>Lista</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="../js/main.js" type='module' defer></script>
    <br>
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
                        <img class="circle" />
                        <img class="img img1" alt="Consultar" src="../img/consultar1.svg" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1 class="h3 mb-2 fw-normal">DIGITE O NOME DO FUNCIONÁRIO</h1>
        </div>
        <div class="row mt-2">
            <main class="form-add w-100 m-auto">
                <form method="GET" class="row g-3">
                    <div class="col-md-8">
                        <input name="filtro" type="text" class="form-control" id="filtro"
                            placeholder="Ex. Funcionário Antônio">
                    </div>
                    <div class="row">
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary">CONSULTAR</button>
                        </div>
                    </div>
                </form>
            </main>

            <?php $options = array('Departamento','Marketing', 'T.I', 'Finanças'); ?>

            <!-- Select do departamento -->
            <div>
                <p> Filtrar Por </p>
                <!-- Selecionar todos -->
                <form method='GET'>
                    <button type="submit" class="btn btn-primary" name="all">ALL</button>
                </form>

                <br><br>
                <form method='GET'>
                    <select class="form-select col" aria-label="Default select example" name='options_dp'
                        onchange="this.form.submit()">
                        <?php foreach ($options as $option) { 
                echo "<option value='$option'>$option</option>";
            } ?>
                    </select>
                </form>
            </div>
                <form method='GET'>
                    Ordenar:
                    <select name="ordenar" id="ordenar" class="form-select col" aria-label="Default select example" onchange="this.form.submit()">
                        <option value="">Escolha</option>
                        <option value="nome_funcionario">Nome</option>";
                        <option value="departamento_nome">Departamento</option>";
                    </select>
                </form>

            <!-- LISTA -->
            <div>
                </br>
                <table class="table table-striped table-hover table-bordered border-secondary">
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>DEPARTAMENTO</th>
                            <th>CARGO</th>
                            <th>PERFIL</th>
                            <th>ALTERAR</th>
                            <th>REMOVER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $funcionarios) : ?>
                        <tr>
                            <td><?= $funcionarios['nome_funcionario'] ?></td>
                            <td><?= $funcionarios['departamento_nome'] ?></td>
                            <td><?= $funcionarios['cargo'] ?></td>


                            <!-- Botão que direciona para o perfil -->
                            <td>
                                <a class='btn btn-sm btn-primary'
                                    href='perfil.php?id=<?=$funcionarios['id_funcionario']?>'>
                                    <!-- Botão que direciona para a página de remover -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <!-- Botão que direciona para a página de alterar conforme o id da linha clicada -->
                                <a class='btn btn-sm btn-primary'
                                    href='editar.php?id=<?=$funcionarios['id_funcionario']?>'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a class='btn btn-sm btn-danger'
                                    href='editarDeletar.php?id=<?=$funcionarios['id_funcionario']?>'>
                                    <!-- Botão que direciona para a página de remover -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br><br>
            <div class="row mt-5">
                <a href="painelFuncionario.php"><img class="mt-3 voltar" src="../img/voltar1.png" alt="voltar"></a>
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