<?php
    define('MYSQL_HOST','31.170.163.156');
    define('MYSQL_DATABASE','dgt_fhr');
    define('MYSQL_USER','dgt_banco');
    define('MYSQL_PASS','giLZLgN+$c-F');

    $conexao = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>