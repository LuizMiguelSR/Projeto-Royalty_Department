<?php
    require_once "inss.php";
    class baseCalculo {
        public $numeroDependentes = 2;
        public $salarioBase  = 5000.00; 
        public function calcularBase() {
            $objeto = new inss();
            $inss = $objeto -> calcularInss();
            return $this->salarioBase - $inss - ($this->numeroDependentes * 189.59);
        }
    }
?>