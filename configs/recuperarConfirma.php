<?php
    require_once 'connectDb.php';
    $chave = $_POST["chave"];
    $novaSenha = password_hash($_POST["novaSenha"], PASSWORD_DEFAULT);
    
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dado = $gestor->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($valida as $val) {
            if(password_verify($val['id_funcionario'], $chave) == true){
                $id = $val['id_funcionario'];
                $zerar = '';

                $gestor->exec("UPDATE funcionario SET senha = '$novaSenha' WHERE funcionario.id_funcionario = $id");

                $gestor->exec("UPDATE funcionario SET recuperar = '$zerar' WHERE funcionario.id_funcionario = $id");

                header('Location: ../index.php');
                die();
            }
        }
        header('Location: ../redefineSucesso.php');
        die();
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
        header('Location: sair.php');
        die();
    }

?>