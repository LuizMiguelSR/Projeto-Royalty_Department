<?php
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $caminho = ModelInsereImagem::repassaCaminho();
    try {
        
        (new DAOOperacoes)->editarFuncionarioSalvar($nome, $rg, $cpf, $senhaHash, $email, $telefone, $numeroDependentes, $caminho, $id, $departamento, $cargo, $salarioBase, $rua, $numero, $cep, $complemento, $cidade, $bairro, $estado, $pais);
        header('Location: /gerenciar_funcionarios');
        die();

    } catch(PDOException $e) {  
        $e->getMessage();  
        $erro = "Edicao de funcionario";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }

?>