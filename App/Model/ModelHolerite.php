<?php
    class ModelHolerite{

        private $salarioBase;
        private $numeroDependentes;
        private $diasUteis;
        
        public function __construct($salarioBase, $numeroDependentes){
            $this -> salarioBase = $salarioBase;
            $this -> numeroDependentes = $numeroDependentes;
            $this -> diasUteis = 22;
        }

        public function calcularInss() {
            $salarioBase = $this -> salarioBase; 
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

        public function calcularBase() {
            $salarioBase = $this -> salarioBase; 
            $numeroDependentes = $this -> numeroDependentes; 
            $inss = $this -> calcularInss();
            return $salarioBase - $inss[4] - ($numeroDependentes * 189.59);
        }

        public function calcularIrrf() {   
            $baseCalculo = $this -> calcularBase();
           
            $faixa1 = 0.0;
            $faixa2 = 0.0;
            $faixa3 = 0.0;
            $faixa4 = 0.0;
            $faixa5 = 0.0;
            $total = 0.0;
            
            if ($baseCalculo > 4664.68) {
                $faixa5 = ($baseCalculo  - 4667.68) * 0.275;
            }
            if ($baseCalculo > 3751.05) {
                if ($baseCalculo < 4664.67) {
                    $faixa4 = ($baseCalculo - 3751.05) * 0.225;
                } else {
                    $faixa4 = (4664.67 - 3751.05) * 0.225;
                }
            }
            if ($baseCalculo > 2826.66){
                if ($baseCalculo < 3751.05) {
                    $faixa3 = ($baseCalculo - 2826.66) * 0.15;
                } else {
                    $faixa3 = (3751.05 - 2826.66) * 0.15;
                }
            }
            if ($baseCalculo > 1903.99){
                if ($baseCalculo < 2826.65) {
                    $faixa2 = ($baseCalculo - 1903.99) * 0.075;
                } else {
                    $faixa2 = (2826.65 - 1903.99) * 0.075;
                }
            }  
            if ($baseCalculo > 1903.98){
                    $faixa1 = 0;
            }

            $total = $faixa1 + $faixa2 + $faixa3 + $faixa4 + $faixa5;
            $valor = [$faixa1, $faixa2, $faixa3, $faixa4, $faixa5, $total];

            return $valor;

        }

        public function calcularValeTransporte() {
            $diasUteis = $this -> diasUteis;
            $vt = $diasUteis * 2 * 5.00;
            if($vt > 220.00) {
                return 220.00;
            } else {
                return $vt;
            }
        }

        public function calcularSalarioLiquido() {
            $salarioBase = $this -> salarioBase; 
            $numeroDependentes = $this -> numeroDependentes;
            $valeTransporte = $this -> calcularValeTransporte();
            $inss = $this -> calcularInss();
            $irrf = $this -> calcularIrrf();
            return $salarioBase - $valeTransporte - $inss[4] - $irrf[5];
        }
    }
?>