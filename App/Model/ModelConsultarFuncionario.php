<?php
    try {
        $funcionarios = (new DAOOperacoes)->selectWhere('funcionario', 'id_funcionario', $post);
        
        $departamento = (new DAOOperacoes)->selectWhere('departamento', 'id_departamento', $post);

        $inss = (new DAOOperacoes)->selectWhere('inss', 'id_inss', $post);
        
        $irrf = (new DAOOperacoes)->selectWhere('irrf', 'id_irrf', $post);
        
        $endereco = (new ModelEndereco)->construirEndereco((new DAOOperacoes)->selectWhere('endereco', 'id_endereco', $post));

        include 'App/View/Pages/PagePerfil.php';
    } catch(PDOException $e) {    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>