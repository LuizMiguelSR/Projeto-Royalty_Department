<?php
    try {
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtualAno = date("Y"); 

        $funcionarios = (new DAOOperacoes)->selectWhere('funcionario', 'id_funcionario', $postId);
        $holerite = (new DAOOperacoes)->selectMesAnoHolerite2($postId, $dataAtualAno, $postMes);

        include 'App/View/Pages/PageConsultaHolerite.php';

    } catch(PDOException $e) {   
        $e->getMessage(); 
        $erro = "Consulta de Holerite";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>