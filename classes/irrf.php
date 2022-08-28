<?php
    require_once "baseCalculo.php";
    
    class irrf {
        public function calcularIrrf() {   
            $objeto = new baseCalculo();
            $this->baseCalculo = $objeto -> calcularBase();
            if ($this->baseCalculo > 4664.68) {
                return ($this->baseCalculo * 0.275) - 869.36;
            } else if ($this->baseCalculo > 3751.06) {
                return ($this->baseCalculo * 0.225) - 636.13;
            } else if ($this->baseCalculo > 2826.66) {
                return ($this->baseCalculo * 0.15) - 354.08;
            } else if ($this->baseCalculo > 1903.98) {
                return ($this->baseCalculo * 0.075) - 142.08;
            } else {
                return 0.00;
            }

        }
    }
?>