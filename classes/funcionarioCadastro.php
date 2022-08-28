<?php
    require_once '../configs/connectDb.php';
    $nome = $_POST["nome"];
    $rg = $_POST["rg"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $complemento = $_POST["complemento"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $pais = $_POST["pais"];
    $salarioBase = $_POST["salarioBase"];
    $numeroDependentes = $_POST["numeroDependentes"];
    $departamento = $_POST["departamento"];
    $cargo = $_POST["cargo"];
    $senha = $_POST["senha"];
    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

    require_once "endereco.php";
    require_once "salarioLiquido.php";
    
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $gestor->beginTransaction();

        $gestor->exec("INSERT INTO funcionario (funcionarioNome, email, telefone, senha, rg, cpf) VALUES ('$nome','$email','$telefone', '$hashSenha', '$rg', '$cpf')");
    
        $gestor->exec("INSERT INTO localrh (endereco, estado, pais) VALUES ('$endereco','$estado','$pais')");

        $gestor->exec("INSERT INTO trabalho (cargo, salarioBase, salarioLiquido) VALUES ('$cargo','$salarioBase','$salarioLiquido')");

        $gestor->commit();
        header('Location: ../gerente/painelGerente.php');
        die();
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
    }

    $gestor = null;
    

?>