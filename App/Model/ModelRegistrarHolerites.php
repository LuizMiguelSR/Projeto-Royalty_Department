<?php
    try{
        date_default_timezone_set('America/Sao_Paulo'); 
        $data = date('Y-m-d');
    
        $id = $post;
    
        $resultado = (new DAOOperacoes)->selectWhere("departamento", "id_departamento", $id);
    
        $funcionario = (new DAOOperacoes)->selectWhere("funcionario", "id_funcionario", $id);
    
        $salarioBase = $resultado[0]["salario_base"];
    
        $salarioLiquido = (new ModelHolerite($resultado[0]["salario_base"], $funcionario[0]["numero_dependentes"]))->calcularSalarioLiquido();
    
        $inss = (new ModelHolerite($resultado[0]["salario_base"], $funcionario[0]["numero_dependentes"]))->calcularInss();
    
        $irrf = (new ModelHolerite($resultado[0]["salario_base"], $funcionario[0]["numero_dependentes"]))->calcularIrrf();
        
        (new DAOOperacoes)->insereFuncionario2($id, $salarioBase, $salarioLiquido, $inss, $irrf, $data);

        header('Location: /gerenciar_holerite');
        die();

    } catch(PDOException $e) {    
        $e->getMessage();
        $erro = "Registro de holerite";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>