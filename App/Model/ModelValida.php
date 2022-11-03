<?php
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE){
        $_SESSION['erro']++;
    } else {
        $_SESSION['erro'] = 0;
        session_start();
    }
    try {
        $valida = (new DAOOperacoes)->select("usuarios");       
        if ($_SESSION['erro'] < 3 || $_SESSION['erro'] == null) { 
            foreach($valida as $val) {
                if ($email == $val['email'] && password_verify($senha, $val['senha']) == true) {
                    $funcionario = (new DAOOperacoes)->selectWhere("funcionario", "id_funcionario", $val['id_usuario']);

                    $_SESSION['role'] = $val['role'];
                    $_SESSION['nome'] = $funcionario[0]["nome_funcionario"];
                    $_SESSION['senhaSession'] = password_hash(session_id(), PASSWORD_DEFAULT);
                    $_SESSION['id'] = session_id();
                    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['id_usuario'] = $val['id_usuario'];
                    $_SESSION['caminho'] = $funcionario[0]["foto"];
                    if ($_SESSION['caminho'] == null){
                        $_SESSION['caminho'] = "App/View/Images/SystemImages/user.png";
                    } else {
                        $_SESSION['caminho'] = $funcionario[0]["foto"];
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