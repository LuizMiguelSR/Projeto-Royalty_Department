<?php
    require_once "inss.php";
    class baseCalculo {
        public function calcularBase() {
            global $numeroDependentes;
            global $salarioBase; 
            $objeto = new inss();
            $inss = $objeto -> calcularInss();
            return $salarioBase - $inss - ($numeroDependentes * 189.59);
        }
    }
?>