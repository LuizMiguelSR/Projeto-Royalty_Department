<?php 
    require_once '../configs/sessionAutentica.php';
    
    $id_funcionario = $_SESSION['id_funcionario'];
    
    try {
        require_once '../configs/connectDb.php';
        date_default_timezone_set('America/Sao_Paulo');
    
        $horarioAtual = date("H:i:s");
    
        $dataEntrada = date("Y-m-d");
        
        $dado = $conexao->query("Select * FROM funcionario_ponto");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($valida as $val) {
                     
            if ($val['data_entrada'] == $dataEntrada) {
    
                $conexao->beginTransaction();
                $conexao->exec("INSERT INTO funcionario_ponto (id_funcionario, data_entrada, entrada) VALUES ('$id_funcionario', '$dataEntrada','$horarioAtual')");
                $conexao->commit();
    
            } else if ($val['data_entrada'] == $dataEntrada && $val['saida_intervalo'] == null) {

                $conexao->exec("UPDATE funcionario_ponto SET saida_intervalo = '$horarioAtual' WHERE funcionario_ponto.id_funcionario = $id_funcionario");

            } else if ($val['data_entrada'] == $dataEntrada && $val['saida_intervalo'] != null &&  $val['retorno_intervalo'] == null) {

                $conexao->exec("UPDATE funcionario_ponto SET retorno_intervalo = '$horarioAtual' WHERE funcionario_ponto.id_funcionario = $id_funcionario");

            } else if ($val['data_entrada'] == $dataEntrada && $val['saida_intervalo'] != null &&  $val['retorno_intervalo'] != null && $val['saida'] == null) {

                $conexao->exec("UPDATE funcionario_ponto SET saida = '$horarioAtual' WHERE funcionario_ponto.id_funcionario = $id_funcionario");

            }

            header('Location: ../funcionario/registroPonto.php');
            die();
        }
    } catch(PDOException $e) {    
        $e->getMessage();
        include_once 'logSystem.php';
        header('Location: ../errorConnect.php');
    }
?>