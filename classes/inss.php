<?php
    class inss {
        public function calcularInss() {   
            global $salarioBase;
            $faixa1 = 0.0;
            $faixa2 = 0.0;
            $faixa3 = 0.0;
            $faixa4 = 0.0;
            $total = 0.0;

            if ($salarioBase > 3641.04) {
                if ($salarioBase < 7087.22) {
                    $faixa4 = ($salarioBase - 3641.04) * 0.14;
                } else {
                    $faixa4 =  (7087.22 - 3641.04) * 0.14;
                }
            }
            if ($salarioBase > 2427.36){
                if ($salarioBase < 3641.03) {
                    $faixa3 = ($salarioBase - 2427.36) * 0.12;
                } else {
                    $faixa3 = (3641.03 - 2427.36) * 0.12;
                }
            }
            if ($salarioBase > 1212.01){
                if ($salarioBase < 2427.35) {
                    $faixa2 = ($salarioBase - 1212.01) * 0.09;
                } else {
                    $faixa2 = (2427.35 - 1212.01) * 0.09;
                }
            }  
            if ($salarioBase > 1212.00){
                $faixa1 = 1212.00 * 0.075;
            }

            $total = $faixa1 + $faixa2 + $faixa3 + $faixa4;
            $valor = [$faixa1, $faixa2, $faixa3, $faixa4, $total];

            return $valor;
        }
    }
    $base = new inss();
    $valor1 = $base->calcularInss();

?>