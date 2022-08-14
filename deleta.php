<?php
    /*
        Página destinada para deletar um usuário cadastrado no banco de dados,
        mediante o recebimento dos parâmetros mediante o método post deletar
        com o código do funcionário.
    */
    require_once 'config.php';
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
    }
    $deleta = $_POST["deletar"];
    $sql = "DELETE FROM funcionarios WHERE codigo = $deleta";
    $gestor->query($sql);
    include 'folha.php';
?>