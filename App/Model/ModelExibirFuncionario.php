<?php

    if($result->rowCount() > 0){
        foreach ($result as $funcionarios){
            header ("location: /editarFuncionario");
        }# Se não tiver o nome consultado, volta para a página consultar
    } else {
        header ("location: /listaFuncionario");
    }
?>