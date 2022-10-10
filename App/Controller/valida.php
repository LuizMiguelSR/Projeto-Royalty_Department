<?php 
    session_start();
    $_SESSION['erro'] = null;
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    try {
        require 'connectDb.php';
        
        $dado = $conexao->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        
        if ($_SESSION['erro'] < 3 || $_SESSION['erro'] == null) { 
            foreach($valida as $val) {
                if ($email == $val['email'] && password_verify($senha, $val['senha']) == true) {   
                    $_SESSION['nome'] = $val['nome_funcionario'];
                    $_SESSION['senhaSession'] = password_hash(session_id(), PASSWORD_DEFAULT);
                    $_SESSION['id'] = session_id();
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['id_funcionario'] = $val['id_funcionario'];
                    $_SESSION['caminho'] = $val['foto'];
                    if ($_SESSION['caminho'] == null){
                        $_SESSION['caminho'] = "App/View/Images/SystemImages/user.png";
                    } else {
                        $_SESSION['caminho'] = $val['foto'];
                    }
                    $_SESSION['erro'] = 0;
                    header('Location: /painel');
                    die();
                }
            }
            $_SESSION['erro']++;
            header('Location: /errou');
            die();
        } else {
            header('Location: /redefine');
            die();
        }
        
    } catch(PDOException $e) {    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
    
?>