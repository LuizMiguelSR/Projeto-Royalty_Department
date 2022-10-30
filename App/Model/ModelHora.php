<?php
    class ModelHora{
        public function calculoHora($dataAtual){

            $valida = (new DAOOperacoes)->selectWhere("funcionario_ponto", "id_funcionario", $_SESSION['id_usuario']);   

            foreach($valida as $val) {
                if ($val['diames'] == $dataAtual) {

                    $tempo1 = $val['entrada'];
                    $tempo2 = $val['saida'];
                    $tempo3 = $val['almoco_sai'];
                    $tempo4 = $val['almoco_che'];
                
                    $tempo5 = gmdate('H:i:s', abs( strtotime( $tempo1 ) - strtotime( $tempo2 ) ) );
                    $tempo6 = gmdate('H:i:s', abs( strtotime( $tempo3 ) - strtotime( $tempo4 ) ) );

                    $tempo7 = gmdate('H:i:s', abs(strtotime( $tempo5 ) - strtotime( $tempo6 ) ));

                    return $tempo7;

                }
            }
        }
    }
?>