<?php
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE){
        $_SESSION['erro']++;
    } else {
        $_SESSION['erro'] = 0;
        session_start();
    }
    
    try {
        $valida = (new DAOConnect)->select("funcionario");
        
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
            header('Location: /errou');
            die();
        } else {
            $_SESSION['email'] = $email;
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