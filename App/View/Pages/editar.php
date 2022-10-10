<?php
    // PÁGINA PARA O FORMULÁRIO DE EDITAR OS USUÁRIOS
    
    include_once('../configs/connectDB.php');

    require_once '../configs/sessionAutentica.php';
    if ($_SESSION['nome'] !== 'Administrador') {
        header('Location: ../configs/sair.php');
        die();
    }
if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM funcionario AS f
    INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
    INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco
    WHERE f.id_funcionario = '$id' ";


    $result = $conexao->query($sqlSelect);
    #print_r($result);

    if($result->rowCount() > 0)
    {

         # Passar para as variáveis como parâmetro os registros do banco de dados
         foreach($result as $users): 
            
            $nome = $users['nome_funcionario'];
            $email = $users['email'];
            $senha = $users['senha'];
            $telefone = $users['telefone'];
            $rg = $users['registro_geral'];
            $cpf = $users['cpf'];
            $cep = $users['cep'];
            $rua = $users['rua'];
            $numero = $users['numero'];
            $complemento = $users['complemento'];
            $bairro = $users['bairro'];
            $cidade = $users['cidade'];
            $estado = $users['estado'];
            $pais = $users['pais'];
            $salarioBase = $users['salario_base'];
            $numeroDependentes = $users['numero_dependentes'];
            $departamento = $users['departamento_nome'];
            $cargo = $users ['cargo'];

            endforeach; 
    }

    else 
    {
        header('Location: lista.php');
    }
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
    <title>Alterar Perfil</title>
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
                        <img class="img img1" alt="Cadastrar" src="../img/cadastrar1.svg"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <h1 class="h3 mb-2 fw-normal">Alterar Perfil</h1>
        </div>
        <div class="row mt-5">
            <main class="form-add w-100 m-auto">
                <form class="row g-3" method="post" enctype="multipart/form-data" action="editarSalvar.php">
                    <!-- Dados Pessoais -->
                    <div class="col-12">
                        <input name="nome" type="text" class="form-control" id="nome" value="<?=$nome?>" placeholder="Nome" required >
                    </div>
                    <div class="col-4">
                        <input name="rg" type="text" class="form-control" id="rg" value="<?=$rg?>" placeholder="RG" required>
                    </div>
                    <div class="col-4">
                        <input name="cpf" type="text" class="form-control" id="cpf" value="<?=$cpf?>" placeholder="CPF" required>
                    </div>
                    <div class="col-4">
                        <input name="telefone" type="text" class="form-control" id="telefone" value="<?=$telefone?>" placeholder="Telefone" required>
                    </div>
                    <div class="col-4">
                        <input name="email" type="email" class="form-control" id="email" value="<?=$email?>" placeholder="E-mail" required>
                    </div>
                    <div class="col-4">
                        <input name="senha" type="password" class="form-control" id="senha" placeholder="Senha" required>
                    </div>
                    <div class="col-4">
                        <input name="csenha" type="password" class="form-control" id="csenha"  placeholder="Confirmar senha">
                    </div>
                    <div class="col-12">
                        <input name="arquivo" type="file" class="form-control" id="arquivo" placeholder="Selecione o arquivo">
                    </div>
                    <!-- Endereço -->
                    <img class="col-12 my-5" alt="Endereco" src="../img/realTime1.svg"/>
                    <div class="col-4">
                        <input name="cep" type="text" class="form-control" id="cep" placeholder="CEP" value="<?=$cep?>" autocomplete="email" required>
                    </div>
                    <div class="col-4">
                        <input name="rua" type="text" class="form-control" id="endereco" value="<?=$rua?>" placeholder="Rua" required>
                    </div>
                    <div class="col-4">
                        <input name="numero" type="text" class="form-control" id="numero" value="<?=$numero?>" placeholder="Número" required>
                    </div>
                    <div class="col-6">
                        <input name="complemento" type="text" class="form-control" id="complemento" value="<?=$complemento?>" placeholder="Complemento">
                    </div>
                    <div class="col-6">
                        <input name="bairro" type="text" class="form-control" id="bairro" value="<?=$bairro?>" placeholder="Bairro" required>
                    </div>
                    <div class="col-4">
                        <input name="cidade" type="text" class="form-control" id="cidade" value="<?=$cidade?>" placeholder="Cidade" required>
                    </div>
                    <div class="col-4">
                        <input name="estado" type="text" class="form-control" id="estado" value="<?=$estado?>" placeholder="Estado" required>
                    </div>
                    <div class="col-4">
                        <input name="pais" type="text" class="form-control" id="pais" value="<?=$pais?>" placeholder="País" required>
                    </div>
                    <!-- Dados pertinentes a empresa -->
                    <img class="col-12 my-5" alt="Dados Empresa" src="../img/empresaRef1.svg"/>
                    <div class="col-3">
                        <input name="salarioBase" type="text" class="form-control" id="salarioBase" value="<?=$salarioBase?>" placeholder="Salário Base" required>
                    </div>
                    <div class="col-3">
                        <input name="numeroDependentes" type="text" class="form-control" id="numeroDependentes" value="<?=$numeroDependentes?>"placeholder="Nº Dependentes" required>
                    </div>
                    <div class="col-3">
                        <input name="departamento" type="text" class="form-control" id="departamento" value="<?=$departamento?>" placeholder="Departamento" required>
                    </div>
                    <div class="col-3">
                        <input name="cargo" type="text" class="form-control" id="cargo" value="<?=$cargo?>" placeholder="Cargo" required>
                    </div>

                    <!-- Como não existe input para entrar com o id no formulário, criou-se um input do tipo hidden com ele como valor-->
                    <input type="hidden" name="id" value=<?=$id?>>

                    <div class="col-12 mt-5">
                        <input type="submit" name="update" id="update" class="btn btn-primary" value="SALVAR">
                    </div>
                </form>
            </main>
        </div>
        <br><br>
        <div class="row">
            <a href="lista.php"><img class="mt-3 voltar" src="../img/voltar1.png" alt="voltar"></a>
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