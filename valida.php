<?php
    /*
        Página de validação do login e senha, que recebe os valores do formulário e busca no banco de dados os usuários registrados
        para mostrar seu holerite ou identifica um administrador do sistema para cadastrar novos funcionários ou consultar
        a folha de pagamento de todos os funcionários
    */
    require_once 'config.php';
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
    }
    $dado = $gestor->query("Select * FROM funcionarios");
    $valida = $dado->fetchAll(PDO::FETCH_ASSOC);

    $email = $_POST["email"]; // Método POST para validar login e senha
    $senha = $_POST["senha"]; 

    $c=0;
    // Condicional para confirmar login e senha
    if ($email == 'admin@email.com' && $senha === '1234'){
        session_start();
        // Criamos as variáveis globais
        $_SESSION['nome'] = "Administrador";
        include 'cadastroFunc.php';
        // Operador de incremento para autenticar o usuário
        $c++;
    } else {
        foreach($valida as $val) {
            if($email == $val["email"] && $senha === $val["senha"]){
                session_start();
                // Criamos as variáveis globais
                $_SESSION['nome'] = $val["nome"];
                include 'consultaHol.php';
                // Operador de incremento para autenticar o usuário
                $c++;
            } 
        }
    }

    if($c == 0){
        include 'erro.php';
        $c=0;
    }
    
?>