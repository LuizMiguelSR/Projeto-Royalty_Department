<?php
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
        if($arquivo['size'] > 5242880)
            header('Location: ../funcionario/cadastrarFuncionario.php');

        $pasta = "../fotos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != 'png')
            header('Location: ../funcionario/cadastrarFuncionario.php');
        
        $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deuCerto = move_uploaded_file($arquivo["tmp_name"], $caminho);
    }
    require_once "salarioLiquido.php";
    
    try {
        require_once '../configs/connectDb.php';
        $conexao->beginTransaction();

        $conexao->exec("INSERT INTO endereco (rua, numero, cep, complemento, cidade, bairro, estado, pais) VALUES ('$rua', '$numero', '$cep', '$complemento', '$cidade', '$bairro', '$estado','$pais')");
        $id_endereco = $conexao->lastInsertId();

        $conexao->exec("INSERT INTO departamento (departamento_nome, cargo, salario_base) VALUES ('$departamento', '$cargo', '$salarioBase')");
        $id_departamento = $conexao->lastInsertId();

        $conexao->exec("INSERT INTO funcionario (nome_funcionario, email, telefone, senha, registro_geral, cpf, numero_dependentes, foto, id_departamento, id_endereco) VALUES ('$nome','$email','$telefone', '$senha', '$rg', '$cpf', '$numeroDependentes', '$caminho', '$id_departamento', '$id_endereco')");

        #$conexao->exec("INSERT INTO holerite (salario_liquido) VALUES ('$salarioLiquido')");

        #$conexao->exec("INSERT INTO inss (faixa_1, faixa_2, faixa_3, faixa_4, total_inss) VALUES ('$inss[0]', '$inss[1]', '$inss[2]', '$inss[3]', '$inss[4]')");

        #$conexao->exec("INSERT INTO irrf (faixa_irrf_1, faixa_irrf_2, faixa_irrf_3, faixa_irrf_4, faixa_irrf_5, total_irrf) VALUES ('$irrf[0]', '$irrf[1]', '$irrf[2]', '$irrf[3]', '$irrf[4]', '$irrf[5]')");

        $conexao->commit();
        header('Location: ../funcionario/painelFuncionario.php');
        die();

    } catch(PDOException $e) {    
        $e->getMessage();
        include_once 'logSystem.php';
        header('Location: ../errorConnect.php');
    }

    $conexao = null;

?>