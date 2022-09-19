<?php 
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_start();
    } else {
        session_start();
        $_SESSION['id'] = session_id();
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['erro'];
    }
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        require_once 'connectDb.php';

        $dado = $conexao->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);

        if ($_SESSION['erro'] < 2 || $_SESSION['erro'] == null) { 
            foreach($valida as $val) {
                if ($email == $val['email'] && password_verify($senha, $val['senha']) == true) {   
                    $_SESSION['nome'] = $val['nome_funcionario'];
                    $_SESSION['id_funcionario'] = $val['id_funcionario'];
                    $_SESSION['caminho'] = $val['foto'];
                    if ($_SESSION['caminho'] == null){
                        $_SESSION['caminho'] = "../img/user.png";
                    } else {
                        $_SESSION['caminho'] = $val['foto'];
                    }
                    $_SESSION['erro'] = 0;
                    header('Location: ../funcionario/painelFuncionario.php');
                    die();
                }
            }
            $_SESSION['erro']++;
            header('Location: ../errou.php');
            die();
        } else {
            header('Location: ../redefine.php');
            die();
        }
        
    } catch(PDOException $e) {    
        $e->getMessage();
        include_once '../classes/logSystem.php';
        header('Location: ../errorConnect.php');
        die();
    }
    
?>