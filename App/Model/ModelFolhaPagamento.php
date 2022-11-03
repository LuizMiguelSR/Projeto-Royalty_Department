<?php
    class ModelFolhaPagamento{
        public function calculaFolha(){
            $result = (new DAOOperacoes)->select('departamento');
            foreach ($result as $val) {
                $final += floatval($val['salario_base']);
            };
            $ali = (new DAOOperacoes)->select('aliquota_folha');
            $fgts = $final * floatval($ali[0]['fgts']);
            $inss = $final * floatval($ali[0]['inss']);
            $sistemaS = $final * floatval($ali[0]['sistema_s']);
            $rat = $final * floatval($ali[0]['rat']);
            $total = $final + $fgts + $inss + $sistemaS + $rat;
            $valor = [$fgts, $inss, $sistemaS, $rat, $total];
            return $valor;
        }
    }
?>