<?php
    define('MYSQL_HOST','sql10.freemysqlhosting.net');
    define('MYSQL_DATABASE','sql10525208');
    define('MYSQL_USER','sql10525208');
    define('MYSQL_PASS','yv91CZsQkz');

    $conexao = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>