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
            $ali = (new DAOOperacoes)->select('aliquota_holerite');
            $salarioBase = $this -> salarioBase; 
            $faixa1 = 0.0;
            $faixa2 = 0.0;
            $faixa3 = 0.0;
            $faixa4 = 0.0;
            $total = 0.0;

            if ($salarioBase > (floatval($ali[0]['inss_salario_fx3'] + 0.01))) {
                if ($salarioBase < floatval($ali[0]['inss_salario_fx4'])) {
                    $faixa4 = ($salarioBase - (floatval($ali[0]['inss_salario_fx3'] + 0.01))) * floatval($ali[0]['inss_aliquota_fx4']);
                } else {
                    $faixa4 =  (floatval($ali[0]['inss_salario_fx4']) - (floatval($ali[0]['inss_salario_fx3'] + 0.01))) * floatval($ali[0]['inss_aliquota_fx4']);
                }
            }
            if ($salarioBase > (floatval($ali[0]['inss_salario_fx2'] + 0.01))){
                if ($salarioBase < floatval($ali[0]['inss_salario_fx3'])) {
                    $faixa3 = ($salarioBase - (floatval($ali[0]['inss_salario_fx2'] + 0.01))) * floatval($ali[0]['inss_aliquota_fx3']);
                } else {
                    $faixa3 = (floatval($ali[0]['inss_salario_fx3']) - (floatval($ali[0]['inss_salario_fx2'] + 0.01))) * floatval($ali[0]['inss_aliquota_fx3']);
                }
            }
            if ($salarioBase > (floatval($ali[0]['inss_salario_fx1']) + 0.01)){
                if ($salarioBase < floatval($ali[0]['inss_salario_fx2'])) {
                    $faixa2 = ($salarioBase - (floatval($ali[0]['inss_salario_fx1']) + 0.01)) * floatval($ali[0]['inss_aliquota_fx2']);
                } else {
                    $faixa2 = (floatval($ali[0]['inss_salario_fx2']) - (floatval($ali[0]['inss_salario_fx1']) + 0.01)) * floatval($ali[0]['inss_aliquota_fx2']);
                }
            }  
            if ($salarioBase > floatval($ali[0]['inss_salario_fx1'])){
                $faixa1 = floatval($ali[0]['inss_salario_fx1']) * floatval($ali[0]['inss_aliquota_fx1']);
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
            $ali = (new DAOOperacoes)->select('aliquota_holerite'); 
            $baseCalculo = $this -> calcularBase();
           
            $faixa1 = 0.0;
            $faixa2 = 0.0;
            $faixa3 = 0.0;
            $faixa4 = 0.0;
            $faixa5 = 0.0;
            $total = 0.0;
            
            if ($baseCalculo > floatval($ali[0]['irrf_salario_fx4'])) {
                $faixa5 = ($baseCalculo  - floatval($ali[0]['irrf_salario_fx4'])) * floatval($ali[0]['irrf_aliquota_fx5']);
            }
            if ($baseCalculo > floatval($ali[0]['irrf_salario_fx3'])) {
                if ($baseCalculo < (floatval($ali[0]['irrf_salario_fx4']) - 0.01)) {
                    $faixa4 = ($baseCalculo - (floatval($ali[0]['irrf_salario_fx3']) - 0.01)) * floatval($ali[0]['irrf_aliquota_fx4']);
                } else {
                    $faixa4 = (floatval($ali[0]['irrf_salario_fx4']) - floatval($ali[0]['irrf_salario_fx3'])) * floatval($ali[0]['irrf_aliquota_fx4']);
                }
            }
            if ($baseCalculo > (floatval($ali[0]['irrf_salario_fx2']) + 0.01)){
                if ($baseCalculo < floatval($ali[0]['irrf_salario_fx3'])) {
                    $faixa3 = ($baseCalculo - (floatval($ali[0]['irrf_salario_fx2']) + 0.01)) * floatval($ali[0]['irrf_aliquota_fx3']);
                } else {
                    $faixa3 = (floatval($ali[0]['irrf_salario_fx3']) - (floatval($ali[0]['irrf_salario_fx2']) + 0.01)) * floatval($ali[0]['irrf_aliquota_fx3']);
                }
            }
            if ($baseCalculo > (floatval($ali[0]['irrf_salario_fx1']) + 0.01)){
                if ($baseCalculo < floatval($ali[0]['irrf_salario_fx2'])) {
                    $faixa2 = ($baseCalculo - (floatval($ali[0]['irrf_salario_fx1']) + 0.01)) * floatval($ali[0]['irrf_aliquota_fx2']);
                } else {
                    $faixa2 = (floatval($ali[0]['irrf_salario_fx2']) - (floatval($ali[0]['irrf_salario_fx1']) + 0.01)) * floatval($ali[0]['irrf_aliquota_fx2']);
                }
            }  
            if ($baseCalculo > floatval($ali[0]['irrf_salario_fx1'])){
                    $faixa1 = floatval($ali[0]['irrf_aliquota_fx1']);
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