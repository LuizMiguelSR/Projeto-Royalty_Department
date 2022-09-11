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
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if($arquivo['error'])
            header('Location: ../funcionario/cadastrarFuncionario.php');
            die();
        if($arquivo['size'] > 5242880)
            header('Location: ../funcionario/cadastrarFuncionario.php');
            die();

        $pasta = "../fotos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != 'png')
            header('Location: ../funcionario/cadastrarFuncionario.php');
            die();
        
        $deuCerto = move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeDoArquivo . "." . $extensao);
    }
    require_once "endereco.php";
    require_once "salarioLiquido.php";
    
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $gestor->beginTransaction();

        $gestor->exec("INSERT INTO funcionario (funcionarioNome, email, telefone, senha, rg, cpf, numeroDependentes, salarioBase) VALUES ('$nome','$email','$telefone', '$senha', '$rg', '$cpf', '$numeroDependentes' ,'$salarioBase')");
    
        $gestor->exec("INSERT INTO localrh (endereco, estado, pais) VALUES ('$endereco','$estado','$pais')");

        $gestor->exec("INSERT INTO departamento (dp_nome) VALUES ('$departamento')");

        $gestor->exec("INSERT INTO trabalho (cargo, salarioLiquido, inss, irrf) VALUES ('$cargo', '$salarioLiquido', '$inss[4]', '$irrf[5]')");

        $gestor->commit();
        header('Location: ../funcionario/painelGerente.php');
        die();
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
    }

    $gestor = null;

?>