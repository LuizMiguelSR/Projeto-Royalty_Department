<?php
    require_once "valeTransporte.php";
    require_once "inss.php";
    require_once "irrf.php";
    
    class holerite {
        public $salarioBase = 5000.00;
        public function calcularSalarioLiquido() {
            $objeto1 = new valeTransporte();
            $valeTransporte = $objeto1 -> calcularValeTransporte();
            $objeto2 = new inss();
            $inss = $objeto2 -> calcularInss();
            $objeto3 = new irrf();
            $irrf = $objeto3 -> calcularIrrf();
            return $this->salarioBase - $valeTransporte - $inss - $irrf;
        }
    }
?>