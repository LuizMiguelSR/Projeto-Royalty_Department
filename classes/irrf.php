<?php
    require_once "baseCalculo.php";
    
    class irrf {
        public function calcularIrrf() {   
            $objeto = new baseCalculo();
            $this->baseCalculo = $objeto -> calcularBase();
           
            $faixa1 = 0.0;
            $faixa2 = 0.0;
            $faixa3 = 0.0;
            $faixa4 = 0.0;
            $faixa5 = 0.0;
            $total = 0.0;
            
            if ($this->baseCalculo > 4664.68) {
                $faixa5 = ($this->baseCalculo  - 4667.68) * 0.275;
            }
            if ($this->baseCalculo > 3751.05) {
                if ($this->baseCalculo < 4664.67) {
                    $faixa4 = ($this->baseCalculo - 3751.05) * 0.225;
                } else {
                    $faixa4 = (4664.67 - 3751.05) * 0.225;
                }
            }
            if ($this->baseCalculo > 2826.66){
                if ($this->baseCalculo < 3751.05) {
                    $faixa3 = ($this->baseCalculo - 2826.66) * 0.15;
                } else {
                    $faixa3 = (3751.05 - 2826.66) * 0.15;
                }
            }
            if ($this->baseCalculo > 1903.99){
                if ($this->baseCalculo < 2826.65) {
                    $faixa2 = ($this->baseCalculo - 1903.99) * 0.075;
                } else {
                    $faixa2 = (2826.65 - 1903.99) * 0.075;
                }
            }  
            if ($this->baseCalculo > 1903.98){
                    $faixa1 = 0;
            }

            $total = $faixa1 + $faixa2 + $faixa3 + $faixa4 + $faixa5;
            $valor = [$faixa1, $faixa2, $faixa3, $faixa4, $faixa5, $total];

            return $valor;

        }
    }
    $base = new irrf();
    $irrf = $base->calcularIrrf();
?>