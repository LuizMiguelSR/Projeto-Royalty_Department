<?php 
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_start();
    } else {
        session_start();
        $_SESSION['id'] = session_id();
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        // $_SESSION['erro'];
    }
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    require_once 'connectDb.php';
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dado = $gestor->query("SELECT * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        if ($_SESSION['erro'] < 2 || $_SESSION['erro'] == null) { 
            foreach($valida as $val) {
                if($email == $val['email'] && password_verify($senha, $val['senha']) == true && $val['nome_funcionario'] == 'Administrador'){
                    $_SESSION['nome'] = $val['nome_funcionario'];
                    $_SESSION['id_funcionario'] = $val['id_funcionario'];
                    $_SESSION['caminho'] = $val['caminho'];
                    if ($_SESSION['caminho'] == null){
                        $_SESSION['caminho'] = "../img/user.png";
                    } else {
                        $_SESSION['caminho'] = $val['caminho'];
                    }
                    $_SESSION['erro'] = 0;
                    header('Location: ../funcionario/painelGerente.php');
                    die();
                }
                if ($email == $val['email'] && password_verify($senha, $val['senha']) == true && $val['nome_funcionario'] != 'Administrador') {   
                    $_SESSION['nome'] = $val['nome_funcionario'];
                    $_SESSION['id_funcionario'] = $val['id_funcionario'];
                    $_SESSION['caminho'] = $val['caminho'];
                    if ($_SESSION['caminho'] == null){
                        $_SESSION['caminho'] = "../img/user.png";
                    } else {
                        $_SESSION['caminho'] = $val['caminho'];
                    }
                    $_SESSION['erro'] = 0;
                    header('Location: ../funcionario/painelFuncionario.php');
                    die();
                }
            }
            $_SESSION['erro']++;
            // header('Location: ../errou.php');
            die();
        } else {
            // header('Location: ../redefine.php');
            die();
        }
        

    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
        // header('Location: sair.php');
        die();
    }
    
?>