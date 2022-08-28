<?php
    class inss {
        public function calcularInss() {   
            global $salarioBase;
            switch ($salarioBase) {
                case $salarioBase > 6433.57:
                    return 900.70;
                    break;
                
                case $salarioBase > 3305.23:
                    return $salarioBase * 0.14;
                    break;
                
                case $salarioBase > 2203.49:
                    return $salarioBase * 0.12;
                    break;
                
                case $salarioBase > 1100.01:
                    return $salarioBase * 0.09;
                    break;

                default:
                    return $salarioBase * 0.075;
                    break;
            }
        }
    }
?>