<?php
# Incluir página com de conexão com o banco de dados
include_once('../configs/connectDB.php');

    require_once '../configs/sessionAutentica.php';
    if ($_SESSION['nome'] !== 'Administrador') {
        header('Location: ../configs/sair.php');
        die();
    }

# Passa para a variável chamada $sql o comando SELECT que verifica
# se esses parâmetros existem no banco de dados. 

# Junção de duas tabelas

$sql = "SELECT  * from funcionario AS f 
LEFT JOIN departamento AS d ON f.id_departamento = d.id_departamento
LEFT JOIN endereco AS e ON e.id_endereco = f.id_endereco
ORDER BY nome_funcionario";
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
                <form action="perfil.php" method="GET" class="row g-3">
                    <div class="col-md-8">
                        <input name="consultar" type="text" class="form-control" id="consultar"
                            placeholder="Ex. Funcionário Antônio">
                    </div>
                    <div class="row">
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary">CONSULTAR</button>
                        </div>
                    </div>
                </form>
            </main>

            <!-- ACCORDION -->

            <main>
                <div class="row mx-5 mt-5">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Recursos Humanos <?php foreach ($resultado as $funcionarios) : ?>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <table class="table border-success">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Alterar</th>
                                                <th scope="col">Deletar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= $funcionarios['nome_funcionario'] ?></td>
                                                <td>
                                                    <!-- Botão que direciona para a página de alterar conforme o id da linha clicada -->
                                                    <a class='btn btn-sm btn-light'
                                                        href='editar.php?id=<?=$funcionarios['id_funcionario']?>'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-pencil-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class='btn btn-sm btn-danger'
                                                        href='editarDeletar.php?id=<?=$funcionarios['id_funcionario']?>'>
                                                        <!-- Botão que direciona para a página de remover -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash-fill"
                                                            viewBox="0 0 16 16">
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
                            </div>
                        </div>
                        <div class="accordion-item">
            </main>
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