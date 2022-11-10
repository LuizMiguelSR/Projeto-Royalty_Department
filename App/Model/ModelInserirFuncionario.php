<?php
    date_default_timezone_set('America/Sao_Paulo'); 
    $data = date('Y-m-d');

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $salarioLiquido = (new ModelHolerite($salarioBase, $numeroDependentes))->calcularSalarioLiquido();
    $inss = (new ModelHolerite($salarioBase, $numeroDependentes))->calcularInss();
    $irrf = (new ModelHolerite($salarioBase, $numeroDependentes))->calcularIrrf();
    
    $caminho = ModelInsereImagem::repassaCaminho();

    try {
        (new DAOOperacoes)->insereFuncionario($nome, $rg, $cpf, $email, $telefone, $cep, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $salarioBase, $numeroDependentes, $departamento, $cargo, $senhaHash, $salarioLiquido, $inss, $irrf, $caminho, $data);
        
        header('Location: /gerenciar_funcionarios');
        die();

    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Insercao de Funcionario";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }

?>