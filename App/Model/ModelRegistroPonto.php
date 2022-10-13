<?php
    ModelSession::verificaSessao();      
    try {
        date_default_timezone_set('America/Sao_Paulo');    
        $horarioAtual = date("H:i:s");   
        $dataAtual = date("Y-m-d"); 
        $valida = (new DAOOperacoes)->selectWhere("funcionario_ponto", "id_funcionario", $_SESSION['id_funcionario']);      
        foreach($valida as $val) {
            if ($val['diames'] === $dataAtual) {
                if ($val['entrada'] !== null && $val['almoco_sai'] === null) {
                    (new DAOOperacoes)->updateFuncionarioPonto("almoco_sai", $hora, $_SESSION['id_funcionario']);                 
                    header('Location: /registroPonto');
                    die();
                } else if ($val['entrada'] !== null && $val['almoco_sai'] !== null && $val['almoco_che'] === null) {
                    (new DAOOperacoes)->updateFuncionarioPonto("almoco_che", $hora, $_SESSION['id_funcionario']);
                    header('Location: /registroPonto');
                    die();
                }else if ($val['entrada'] !== null && $val['almoco_sai'] !== null && $val['almoco_che'] !== null && $val['saida'] === null) {
                    (new DAOOperacoes)->updateFuncionarioPonto("saida", $hora, $_SESSION['id_funcionario']);
                    header('Location: /registroPonto');
                    die();
                }else if ($val['entrada'] !== null && $val['almoco_sai'] !== null && $val['almoco_che'] !== null && $val['saida'] !== null) {
                    header('Location: /registroPonto');
                    die();
                } 
            }
        }
        (new DAOOperacoes)->insereRegistro($_SESSION['id_funcionario'], $dataAtual, $hora);
        header('Location: /registroPonto');
        die();
    } catch(PDOException $e) {    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>