<?php 
    ModelSession::verificaSessao();     

    try { 
        date_default_timezone_set('America/Sao_Paulo'); 
        $dataAtual = date("Y-m-d"); 

        $valida = (new DAOOperacoes)->selectWhere("funcionario_ponto", "id_funcionario", $_SESSION['id_usuario']);      

        foreach($valida as $val) {
            if ($val['diames'] == $dataAtual) {
                if ($val['entrada'] != null && $val['almoco_sai'] == null) {

                    (new DAOOperacoes)->updateFuncionarioPonto("almoco_sai", $hora, $val['id_funcionario_ponto']); 

                    header('Location: /registro_ponto');
                    die();

                } else if ($val['entrada'] != null && $val['almoco_sai'] != null && $val['almoco_che'] == null) {
                    
                    (new DAOOperacoes)->updateFuncionarioPonto("almoco_che", $hora, $val['id_funcionario_ponto']);

                    header('Location: /registro_ponto');
                    die();

                }else if ($val['entrada'] != null && $val['almoco_sai'] != null && $val['almoco_che'] != null && $val['saida'] == null) {
                    
                    (new DAOOperacoes)->updateFuncionarioPonto("saida", $hora, $val['id_funcionario_ponto']);

                    $result = (new ModelHora)->calculoHora($dataAtual);

                    (new DAOOperacoes)->updateFuncionarioPonto("horas_trabalhadas", $result, $val['id_funcionario_ponto']);
                    
                    header('Location: /registro_ponto');
                    die();

                }else if ($val['entrada'] != null && $val['almoco_sai'] != null && $val['almoco_che'] != null && $val['saida'] != null) {
                    
                    header('Location: /registro_ponto');
                    die();

                } 
            }
        }
        
        (new DAOOperacoes)->insereRegistro($_SESSION['id_usuario'], $dataAtual, $hora);
        
        header('Location: /registro_ponto');
        die();

    } catch(PDOException $e) {    
        
        $e->getMessage();
        $erro = "Registro de Ponto";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();

    }
?>