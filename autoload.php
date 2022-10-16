<?php
    spl_autoload_register(function($nomeClasse){
        $classeController = 'App/Controller/'.$nomeClasse.'.php';
        $classeDAO = 'App/DAO/'.$nomeClasse.'.php';
        $classeModel = 'App/Model/'.$nomeClasse.'.php';

        if(file_exists($classeController)){
            include $classeController;
        } else if (file_exists($classeDAO)){
            include $classeDAO;
        } else if (file_exists($classeModel)){
            include $classeModel;
        } else {
            exit('Arquivo não encontrado. Arquivo: ' . $nomeClasse . "<br />");
        }
    });
?>