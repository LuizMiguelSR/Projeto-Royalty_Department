<?php
    try {
        class ModelEndereco {
            public function construirEndereco($endereco) {
                return 'Rua: '. $endereco[0]['rua'] . ', Nº ' . $endereco[0]['numero'] . ', ' . $endereco[0]['complemento'] . ', Bairro: ' . $endereco[0]['bairro'] . ' - ' . $endereco[0]['cidade'];
            }
        }
    } catch(PDOException $e) {   
        $e->getMessage(); 
        $erro = "Formatacao de Endereco";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>