<?php
    try {
        $funcionarios = (new DAOOperacoes)->selectWhere('funcionario', 'id_funcionario', $post);
        
        $departamento = (new DAOOperacoes)->selectWhere('departamento', 'id_departamento', $post);

        $usuarios = (new DAOOperacoes)->selectWhere('usuarios', 'id_usuario', $post);
        
        $endereco = (new ModelEndereco)->construirEndereco((new DAOOperacoes)->selectWhere('endereco', 'id_endereco', $post));

        include 'App/View/Pages/PagePerfil.php';
    } catch(PDOException $e) {    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>