<?php
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $caminho = ModelInsereImagem::repassaCaminho();
    try {
        (new DAOOperacoes)->editarFuncionarioSalvar($nome, $rg, $cpf, $senhaHash, $email, $telefone, $numeroDependentes, $caminho, $id, $departamento, $cargo, $salarioBase, $rua, $numero, $cep, $complemento, $cidade, $bairro, $estado, $pais);
        header('Location: /listar_funcionario');
        die();
    } catch(PDOException $e) {    
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }

?>