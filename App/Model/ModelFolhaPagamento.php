<?php
    class ModelFolhaPagamento{
        public function calculaFolha(){
            $result = (new DAOOperacoes)->select('departamento');
            foreach ($result as $val) {
                $final += floatval($val['salario_base']);
            };
            $fgts = $final * 0.08;
            $inss = $final * 0.20;
            $sistemaS = $final * 0.058;
            $rat = $final * 0.02;
            $total = $final + $fgts + $inss + $sistemaS + $rat;
            $valor = [$fgts, $inss, $sistemaS, $rat, $total];
            return $valor;
        }
    }
?>