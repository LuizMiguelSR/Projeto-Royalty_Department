<?php
    $chave = $_POST["chave"];
    $novaSenha = password_hash($_POST["novaSenha"], PASSWORD_DEFAULT);
    
    try {
        require_once 'connectDb.php';

        $dado = $conexao->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($valida as $val) {
            if(password_verify($val['id_funcionario'], $chave) == true){
                $id = $val['id_funcionario'];
                $zerar = '';

                $conexao->exec("UPDATE funcionario SET senha = '$novaSenha' WHERE funcionario.id_funcionario = $id");

                $conexao->exec("UPDATE funcionario SET recuperar = '$zerar' WHERE funcionario.id_funcionario = $id");

                header('Location: ../index.php');
                die();
            }
        }
        header('Location: ../redefineSucesso.php');
        die();
    } catch(PDOException $e) {    
        $e->getMessage();
        include_once '../classes/logSystem.php';
        header('Location: ../errorConnect.php');
        die();
    }

?>