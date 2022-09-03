<?php
    require_once "inss.php";
    class baseCalculo {
        public function calcularBase() {
            global $numeroDependentes;
            global $salarioBase; 
            $objeto = new inss();
            $inss = $objeto -> calcularInss();
            return $salarioBase - $inss[4] - ($numeroDependentes * 189.59);
        }
    }
    $base = new baseCalculo();
    $valor2 = $base->calcularBase();
?>