<?php 
    session_start();
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    require_once 'connectDb.php';
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dado = $gestor->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($valida as $val) {
            if($email == $val['email'] && password_verify($senha, $val['senha']) == true && $val['funcionarioNome'] == 'Administrador'){
                
                $_SESSION['nome'] = $val['funcionarioNome'];
                header('Location: ../gerente/painelGerente.php');
                die();
            } else if ($email == $val['email'] && password_verify($senha, $val['senha']) == true && $val['funcionarioNome'] != 'Administrador') {
                
                $_SESSION['nome'] = $val['funcionarioNome'];
                header('Location: ../funcionario/painelFuncionario.php');
                die();
            } else {
                echo "Senha ou login invalidos";
            }
        }
        header('Location: ../configs/sair.php');
        die();

    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
        header('Location: ../configs/sair.php');
        die();
    }
    
?>