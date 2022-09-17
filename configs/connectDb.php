<?php
    define('MYSQL_HOST','127.0.0.1');
    define('MYSQL_DATABASE','fhr');
    define('MYSQL_USER','root');
    define('MYSQL_PASS','');

    $conexao = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);