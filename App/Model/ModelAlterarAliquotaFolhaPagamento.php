<?php
    try {
        if (!empty($post["fgts"])){ 
            $valor = $post["fgts"] / 100;
            (new DAOOperacoes)->updateAliquota("fgts", $valor);
            header('Location: /alterar_aliquota_folha_pagamento');
            die();
        }  
        if (!empty($post["inss"])){  
            $valor = $post["inss"] / 100;           
            (new DAOOperacoes)->updateAliquota("inss", $valor);
            header('Location: /alterar_aliquota_folha_pagamento');
            die();
        }  
        if (!empty($post["sistema_s"])){              
            $valor = $post["sistema_s"] / 100;
            (new DAOOperacoes)->updateAliquota("sistema_s", $valor);
            header('Location: /alterar_aliquota_folha_pagamento');
            die();
        }  
        if (!empty($post["rat"])){
            $valor = $post["rat"] / 100;
            (new DAOOperacoes)->updateAliquota("rat", $valor);
            header('Location: /alterar_aliquota_folha_pagamento');
            die();
        }
    } catch(PDOException $e) {    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>