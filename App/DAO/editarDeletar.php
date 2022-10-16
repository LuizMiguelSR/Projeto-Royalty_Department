<?php
   #Incluir página com de conexão com o banco de dados
   include_once('../configs/connectDB.php');
   
       require_once '../configs/sessionAutentica.php';
       if ($_SESSION['nome'] !== 'Administrador') {
           header('Location: ../configs/sair.php');
           die();
       }
   
    # Verificar se NÃO está vazio o parâmetro id
    if(!empty($_GET['id']))
    {
        # Variável id para receber o parâmetro
        $id = $_GET['id'];

        # Se sim, irá puxar os dados do banco de dados

        # Cria uma variável select para puxar do banco de dados as informações só do id informado.
        
        $sqlSelect = "SELECT  * from funcionario AS f 
        INNER JOIN departamento AS d ON f.id_departamento = d.id_departamento
        INNER JOIN endereco AS e ON e.id_endereco = f.id_endereco
        WHERE f.id_funcionario = '$id'";

        # Variável result para armazenar o resultado da query da variável $sqlSelect.
        $result = $conexao->query($sqlSelect);

        # Verificar para ver se existe o registro, se $result for maior que zero.
        if($result->rowCount() > 0)
        {
            # Se existir um resultado a variável $sqlDelete vai armazenar o comando de DELETE no banco de dados
            $sqlDelete1 = "DELETE FROM departamento WHERE id_departamento='$id'";
            $sqlDelete2 = "DELETE FROM endereco WHERE id_endereco='$id'";
            $sqlDelete3 = "DELETE FROM funcionario WHERE id_funcionario='$id'";


            # Executar a query da variável $sqlDelete
            $result = $conexao->query($sqlDelete1);
            $result = $conexao->query($sqlDelete2);
            $result = $conexao->query($sqlDelete3);

        }
            header('Location: lista.php');      
    }