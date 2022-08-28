<?php
    class valeTransporte {
        public $diasUteis = 22;
        public function calcularValeTransporte() {
            $vt = $this->diasUteis * 2 * 5.00;
            if($vt > 220.00) {
                return 220.00;
            } else {
                return $vt;
            }
        }
    }
?>