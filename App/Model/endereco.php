<?php
    class endereco {
    
        public function construirEndereco() {
            global $cep;
            global $rua;
            global $complemento;
            global $numero;
            global $bairro;
            global $cidade;

            return 'Rua: '. $rua . ', Nº ' . $numero . ', ' . $complemento . ' CEP: ' . $cep . ', Bairro: ' . $bairro . ', Cidade: ' . $cidade;
        }
    }
    $objeto = new endereco();
    $endereco = $objeto ->construirEndereco();
?>