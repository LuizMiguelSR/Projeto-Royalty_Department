<?php
    try {
        (new DAOOperacoes)->deletaFuncionario($post);
        header('Location: /gerenciar_funcionarios');
        die();
        
    } catch(PDOException $e) {
        $e->getMessage();    
        $erro = "Exclusao de funcionario";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>