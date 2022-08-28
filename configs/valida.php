<?php 
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    require_once 'connectDb.php';
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        $dado = $gestor->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        foreach($valida as $val) {
            if($email == $val["email"] && password_verify($senha, $val["senha"]) == true && $val["funcionario_nome"] === 'Administrador'){
                session_start();
                $_SESSION['nome'] = $val["funcionario_nome"];
                header('Location: ../gerente/painelGerente.php');
                die();
            } else if ($email == $val["email"] && password_verify($senha, $val["senha"]) == true) {
                session_start();
                $_SESSION['nome'] = $val["funcionario_nome"];
                header('Location: ../funcionario/painelFuncionario.php');
                die();
            } else {
                header('Location: ../configs/sair.php');
                die();
            }
        }
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
    }
    


?>