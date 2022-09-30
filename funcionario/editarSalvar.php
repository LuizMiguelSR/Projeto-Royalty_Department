<?php
//PÁGINA COM O CÓDIGO PARA ATUALIZAR A LISTA DE USUÁRIOS 

    # Incluir página com a conexão com o banco de dados
    include_once('../configs/connectDB.php');

    require_once '../configs/sessionAutentica.php';
    if ($_SESSION['nome'] !== 'Administrador') {
        header('Location: ../configs/sair.php');
        die();
    }

# Verificar se o botão de update foi selecionado, se foi declarado.
if(isset($_POST['update'])) 
{
        # Passando o que recebeu no formulário como parâmetro para as variáveis
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $cep = $_POST['cep'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        $salarioBase = $_POST['salarioBase'];
        $departamento = $_POST['departamento'];
        $cargo = $_POST['cargo'];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

        if(isset($_FILES['arquivo'])) {
            $arquivo = $_FILES['arquivo'];
    
            if($arquivo['error'])
                header('Location: ../funcionario/cadastrarFuncionario.php');
            if($arquivo['size'] > 5242880)
                header('Location: ../funcionario/cadastrarFuncionario.php');
    
            $pasta = "../fotos/";
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    
            if($extensao != "jpg" && $extensao != 'png')
                header('Location: ../funcionario/cadastrarFuncionario.php');
            
            $caminho = $pasta . $novoNomeDoArquivo . "." . $extensao;
            $deuCerto = move_uploaded_file($arquivo["tmp_name"], $caminho);
        }

        # A variável $sqlUpdate armazena o comando de UPDATE para atualizar os dados no banco de dados conforme o id selecionado.
        # $sqlUpdate = "UPDATE funcionario SET funcionario_nome ='$nome', senha ='$senha', email ='$email', telefone ='$telefone' WHERE id_funcionario='$id'";

        $sqlUpdate = "UPDATE funcionario AS f
        INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
        INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco
        SET nome_funcionario ='$nome', email ='$email', telefone ='$telefone', registro_geral = '$rg', cpf = '$cpf', senha = '$senha', foto = '$caminho', 
        rua = '$rua', numero = '$numero', cep = '$cep', complemento = '$complemento', cidade = '$cidade', bairro = '$bairro', estado = '$estado', pais = '$pais',
        departamento_nome ='$departamento', salario_base='$salarioBase', cargo='$cargo'
        WHERE f.id_funcionario = '$id'";

        # A variável result pega o resultado da query que tem como requisição o comando da $sqlUpdate.
        $result = $conexao->query($sqlUpdate);
}
        # Voltar para a página anterior
        header('Location: lista.php');


?>