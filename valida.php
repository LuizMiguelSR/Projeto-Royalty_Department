<?php 
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    if($email == 'admin@email.com' && $senha === '1234') {
        include 'painelRh.php';
    } else {
        include 'painelFunc.php';
    } 
?>