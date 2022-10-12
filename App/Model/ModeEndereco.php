<?php
    class ModelEndereco {
        public static function construirEndereco($cep, $rua, $complemento, $numero, $bairro, $cidade) {
            return 'Rua: '. $rua . ', Nº ' . $numero . ', ' . $complemento . ' CEP: ' . $cep . ', Bairro: ' . $bairro . ', Cidade: ' . $cidade;
        }
    }
?>