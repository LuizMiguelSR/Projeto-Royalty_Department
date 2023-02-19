<?php
    try {
        class ModelFolhaPagamento{
            public function calculaFolha(){
                $result = (new DAOOperacoes)->select('departamento');
                $final = 0.00;
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
    } catch(PDOException $e) {
        $e->getMessage();    
        $erro = "Formatacao de folha de pagamento";
        ModelSystemLog::logServerFail($e, $erro);
        header('Location: /errorConnect');
        die();
    }
?>