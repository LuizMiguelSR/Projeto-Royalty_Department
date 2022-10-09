<?php
    define('MYSQL_HOST','31.170.163.156');
    define('MYSQL_DATABASE','dgt_fhr2');
    define('MYSQL_USER','dgt_luiz');
    define('MYSQL_PASS','gmo#144mHn{TJ');

    $conexao = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>