<?php 
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    if($email == 'admin@email.com' && $senha === '1234') {
        header('Location: ../gerente/painelGerente.php');
        die();
    } else {
        header('Location: ../funcionario/painelFuncionario.php');
        die();
    } 
?>