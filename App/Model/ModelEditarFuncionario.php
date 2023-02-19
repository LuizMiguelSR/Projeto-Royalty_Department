<?php
    try {
        
        (new DAOOperacoes)->editarFuncionarioSalvar($nome, $rg, $cpf, $telefone, $numeroDependentes, $id, $departamento, $cargo, $salarioBase, $rua, $numero, $cep, $complemento, $cidade, $bairro, $estado, $pais);
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