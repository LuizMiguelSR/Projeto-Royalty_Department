<?php
    try {
        if (!empty($post["inss_aliquota_fx1"])){ 
            $valor = $post["inss_aliquota_fx1"] / 100;
            (new DAOOperacoes)->updateAliquota2("inss_aliquota_fx1", $valor);
        } 
        if (!empty($post["inss_aliquota_fx2"])){ 
            $valor = $post["inss_aliquota_fx2"] / 100;
            (new DAOOperacoes)->updateAliquota2("inss_aliquota_fx2", $valor);
        } 
        if (!empty($post["inss_aliquota_fx3"])){ 
            $valor = $post["inss_aliquota_fx3"] / 100;
            (new DAOOperacoes)->updateAliquota2("inss_aliquota_fx3", $valor);
        } 
        if (!empty($post["inss_aliquota_fx4"])){ 
            $valor = $post["inss_aliquota_fx4"] / 100;
            (new DAOOperacoes)->updateAliquota2("inss_aliquota_fx4", $valor);
            header('Location: /alterar_aliquota_holerite');
            die();
        } 
        if (!empty($post["irrf_aliquota_fx1"])){ 
            $valor = $post["irrf_aliquota_fx1"] / 100;
            (new DAOOperacoes)->updateAliquota2("irrf_aliquota_fx1", $valor);
        } 
        if (!empty($post["irrf_aliquota_fx2"])){ 
            $valor = $post["irrf_aliquota_fx2"] / 100;
            (new DAOOperacoes)->updateAliquota2("irrf_aliquota_fx2", $valor);
        } 
        if (!empty($post["irrf_aliquota_fx3"])){ 
            $valor = $post["irrf_aliquota_fx3"] / 100;
            (new DAOOperacoes)->updateAliquota2("irrf_aliquota_fx3", $valor);
        } 
        if (!empty($post["irrf_aliquota_fx4"])){ 
            $valor = $post["irrf_aliquota_fx4"] / 100;
            (new DAOOperacoes)->updateAliquota2("irrf_aliquota_fx4", $valor);
        } 
        if (!empty($post["irrf_aliquota_fx5"])){ 
            $valor = $post["irrf_aliquota_fx5"] / 100;
            (new DAOOperacoes)->updateAliquota2("irrf_aliquota_fx5", $valor);
        }
        if (!empty($post["inss_salario_fx1"])){ 
            $valor = $post["inss_salario_fx1"];
            (new DAOOperacoes)->updateAliquota2("inss_salario_fx1", $valor);
        } 
        if (!empty($post["inss_salario_fx2"])){ 
            $valor = $post["inss_salario_fx2"];
            (new DAOOperacoes)->updateAliquota2("inss_salario_fx2", $valor);
        } 
        if (!empty($post["inss_salario_fx3"])){ 
            $valor = $post["inss_salario_fx3"];
            (new DAOOperacoes)->updateAliquota2("inss_salario_fx3", $valor);
        } 
        if (!empty($post["inss_salario_fx4"])){ 
            $valor = $post["inss_salario_fx4"];
            (new DAOOperacoes)->updateAliquota2("inss_salario_fx4", $valor);
        } 
        if (!empty($post["irrf_salario_fx1"])){ 
            $valor = $post["irrf_salario_fx1"];
            (new DAOOperacoes)->updateAliquota2("irrf_salario_fx1", $valor);
        } 
        if (!empty($post["irrf_salario_fx2"])){ 
            $valor = $post["irrf_salario_fx2"];
            (new DAOOperacoes)->updateAliquota2("irrf_salario_fx2", $valor);
        } 
        if (!empty($post["irrf_salario_fx3"])){ 
            $valor = $post["irrf_salario_fx3"];
            (new DAOOperacoes)->updateAliquota2("irrf_salario_fx3", $valor);
        } 
        if (!empty($post["irrf_salario_fx4"])){ 
            $valor = $post["irrf_salario_fx4"];
            (new DAOOperacoes)->updateAliquota2("irrf_salario_fx4", $valor);
        } 
        if (!empty($post["irrf_salario_fx5"])){ 
            $valor = $post["irrf_salario_fx5"];
            (new DAOOperacoes)->updateAliquota2("irrf_salario_fx5", $valor);
        } 
        header('Location: /alterar_aliquota_holerite');
        die();
    } catch(PDOException $e) {  
        $e->getMessage();  
        $erro = "Alterar Aliquota do Holerite";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>