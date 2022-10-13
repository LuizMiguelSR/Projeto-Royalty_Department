<?php
    spl_autoload_register(function($nomeClasse){
        $classeController = 'APP/Controller/'.$nomeClasse.'.php';
        $classeDAO = 'APP/DAO/'.$nomeClasse.'.php';
        $classeModel = 'APP/Model/'.$nomeClasse.'.php';

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