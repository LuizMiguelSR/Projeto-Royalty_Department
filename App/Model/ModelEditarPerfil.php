<?php
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $caminho = ModelInsereImagem::repassaCaminho();
    try {
        
        (new DAOOperacoes)->editarPerfilSalvar($nome, $senhaHash, $email, $telefone, $caminho, $id);
        header('Location: /painel');
        die();

    } catch(PDOException $e) {  
        $e->getMessage();  
        $erro = "Edicao de Perfil";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }

?>