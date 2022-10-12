<?php
    $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    
    try {
        $valida = (new DAOConnect)->select("funcionario");
        
        foreach($valida as $val) {
            if(password_verify($val['id_funcionario'], $chave) == true){
                $id = $val['id_funcionario'];
                $zerar = '';

                $valida = (new DAOConnect)->updateFuncionario('senha', $novaSenhaHash, $id);
                
                $valida = (new DAOConnect)->updateFuncionario('recuperar', $zerar, $id);

                header('Location: /');
                die();
            }
        }
        header('Location: /redefineSucesso');
        die();
    } catch(PDOException $e) {    
        require 'App/Model/ModelSystemLog.php';    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>