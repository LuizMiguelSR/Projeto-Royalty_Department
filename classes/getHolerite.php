<?php
    require_once '../configs/sessionAutentica.php';

    try {
        require_once '../configs/connectDb.php';
    } catch(PDOException $e) {    
        $e->getMessage();
        include_once '../classes/logSystem.php';
        header('Location: ../errorConnect.php');
    }
    $dados = $conexao->query("Select * FROM departamento");
    $departamento = $dados->fetchAll(PDO::FETCH_ASSOC);

    $dados = $conexao->query("Select * FROM holerite");
    $holerite = $dados->fetchAll(PDO::FETCH_ASSOC);

    $dados2 = $conexao->query("Select * FROM inss");
    $inss = $dados2->fetchAll(PDO::FETCH_ASSOC);

    $dados3 = $conexao->query("Select * FROM irrf");
    $irrf = $dados3->fetchAll(PDO::FETCH_ASSOC);
?>