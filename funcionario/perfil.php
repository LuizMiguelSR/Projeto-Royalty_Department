<?php
    # Incluir página com de conexão com o banco de dados
    include_once('../configs/connectDB.php');

    require_once '../configs/sessionAutentica.php';
    if ($_SESSION['nome'] !== 'Administrador') {
        header('Location: ../configs/sair.php');
        die();
    }
        if(!empty($_GET['consultar']))
        {
            # Pega como parâmetro a var consultar
            $consultar = $_GET['consultar'];


            # Select que faz a junção das tabelas e mostra as informações que estão de acordo com a variável consultar
            $sqlConsultar = "SELECT * FROM funcionario AS f
            INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
            INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco
            WHERE f.nome_funcionario LIKE '%$consultar%' OR f.cpf LIKE '$consultar'";

            $result = $conexao->query($sqlConsultar) or die("ERRO ao consultar!" . $mysqli->error);

                if($result->rowCount() > 0)
                { 
                foreach ($result as $funcionarios) :
        
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/style.css">
    <title>Perfil de <?php $funcionarios['nome_funcionario'] ?></title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <div class="container-fluid m-auto text-center">
        <header>
            <div class="row">
                <?php
                    include '../components/navbar.php';
                ?>
            </div>
        </header>
        <main>
            <div class="row mt-5">
                <h1 class="h3 mb-2 fw-normal">CONSULTA DE INFORMAÇÕES</h1>
            </div>
            <div class="row mt-3">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-md-12">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <img src="<?php echo "../fotos/".$funcionarios["foto"]?>" class="img-radius" alt="Perfil"/>
                                                </div>
                                                <h6 class="f-w-600"><?= $funcionarios['nome_funcionario'] ?></h6>
                                                <h1 class="user-descrip"><?= $funcionarios['cargo'] ?></p>
                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informações</h6>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Email</p>
                                                        <h6 class="text-muted f-w-400"><?= $funcionarios['email'] ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Telefone</p>
                                                        <h6 class="text-muted f-w-400"><?= $funcionarios['telefone'] ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Endereço</p>
                                                        <h6 class="text-muted f-w-400">Praça da Sé, nº 10, Sé - São Paulo</h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Departamento</p>
                                                        <h6 class="text-muted f-w-400"><?= $funcionarios['departamento_nome'] ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Salário Base</p>
                                                        <h6 class="text-muted f-w-400"><?= $funcionarios['salario_base'] ?></h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">V.T</p>
                                                        <h6 class="text-muted f-w-400">R$ 220,00</h6>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">IRRF</p>
                                                        <h6 class="text-muted f-w-400">R$ 246,00</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">INSS</p>
                                                        <h6 class="text-muted f-w-400">R$ 700,00</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p class="m-b-10 f-w-600">Nº Dependentes</p>
                                                        <h6 class="text-muted f-w-400"><?= $funcionarios['numero_dependentes'] ?></h6>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <a class="btn" href='editar.php?id=<?=$funcionarios['id_funcionario']?>'>Editar</a>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <a class="btn" href='editarDeletar.php?id=<?=$funcionarios['id_funcionario']?>'>Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="row">
            <a href="lista.php"><img class="mt-3 voltar" src="../img/voltar1.png" alt="voltar"></a>
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
    <?php
   
        # Se não tiver o nome consultado, volta para a página consultar
            } else {
        header ("location: lista.php");
            }
        }

?>
</body>
</html>