<?php
    echo "Criando hash de senha com salt e testando:<br>";
    $hashSenha = password_hash('789', PASSWORD_DEFAULT);
    if (password_verify('789', $hashSenha)) {
        echo "Senha correta<br>";
        echo "O Hash da senha é " . $hashSenha;
    }
    else {
        echo "Senha incorreta!";
    }

    //teste de classe
    $objeto = new endereco();
    $objeto1 = $objeto ->construirEndereco();
    echo $objeto1;
?>