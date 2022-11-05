<?php
    try {
        (new DAOOperacoes)->deletaFuncionario($post);
        header('Location: /edita_remove_funcionario');
        die();
    } catch(PDOException $e) {    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>