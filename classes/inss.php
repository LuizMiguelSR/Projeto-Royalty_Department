<?php
    class inss {
        public $salarioBase =  5000.00;
        public function calcularInss() {   
            switch ($this->salarioBase) {
                case $this->salarioBase > 6433.57:
                    return 900.70;
                    break;
                
                case $this->salarioBase > 3305.23:
                    return $this->salarioBase * 0.14;
                    break;
                
                case $this->salarioBase > 2203.49:
                    return $this->salarioBase * 0.12;
                    break;
                
                case $this->salarioBase > 1100.01:
                    return $this->salarioBase * 0.09;
                    break;

                default:
                    return $this->salarioBase * 0.075;
                    break;
            }
        }
    }
?>