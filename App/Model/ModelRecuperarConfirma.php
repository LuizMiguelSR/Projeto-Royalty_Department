<?php
    $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    
    try {
        
        foreach((new DAOOperacoes)->select("usuarios") as $val) {
            if(password_verify($val['id_usuario'], $chave) == true){
                $id = $val['id_usuario'];
                $zerar = NULL;

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
        $erro = "Comunicao com server ao confirmar a recuperacao de senha";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>