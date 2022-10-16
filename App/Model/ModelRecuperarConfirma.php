<?php
    $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    
    try {
        $valida = (new DAOOperacoes)->select("funcionario");
        
        foreach($valida as $val) {
            if(password_verify($val['id_funcionario'], $chave) == true){
                $id = $val['id_funcionario'];
                $zerar = '';

                (new DAOOperacoes)->updateFuncionario('senha', $novaSenhaHash, $id);
                
                (new DAOOperacoes)->updateFuncionario('recuperar', $zerar, $id);

                header('Location: /');
                die();
            }
        }
        header('Location: /redefineSucesso');
        die();
    } catch(PDOException $e) {     
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>