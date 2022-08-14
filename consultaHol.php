<?php
    /*
        Página destinada a consulta do holerite de um funcionário, de forma que é feita uma consulta a 
        tabela funcionários no banco de dados 
    */

    if($_SESSION['nome'] != $val["nome"]) {
        include 'sair.php';
    } else {

        // Presença de concatenação de strings
        require_once 'config.php';
        try {
            $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
            $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {    
            echo "Connection failed: " . $e->getMessage();
        }
        
        $dados = $gestor->query("Select * FROM funcionarios");
        $funcionarios = $dados->fetchAll(PDO::FETCH_ASSOC);
        
?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <title>Consulta Holerite</title>
        </head>
        <body>
            <!-- NavBar utilizando o BootStrap -->
            <div class="container">
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">                
                        <a class="navbar-brand" href="#">Consulta Holerite</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link">Usuário: <?php echo "{$_SESSION['nome']}"; ?> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sair.php">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>    
            </div>
            
            <!-- Título -->
            <div class="container mt-5">
                <div class="row">
                    <h3 class="mt-5 text-center">CONSULTA DE HOLERITE</h3>
                </div>
            </div>
            <div class="container">
                <table class="table table-hover table-dark">
                    <!-- 
                        Consulta dos valores no banco de dados. 
                        A seguir temos o uso da estrutura de controle foreach, para percorrer
                        todos os registros e de acordo com a sessão correpondente mostrar,
                        o valor correpondente ao usuário logado.
                    -->
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Sál. Base</th>
                            <th scope="col">V.T</th>
                            <th scope="col">IRRF</th>
                            <th scope="col">INSS</th>
                            <th scope="col">Sál. Líquido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--
                            Presença do foreach e uma estrutura if para filtrar o holerite do funcionário de acordo 
                            com a sessão logada.
                        -->
                        <?php foreach($funcionarios as $func):
                            if ($_SESSION['nome'] == $func['nome'] ){
                            ?>
                                <tr>
                                    <!-- Utilização do number format para formatar números em formato da moeda local -->
                                    <td><?= $func["nome"]?></td>
                                    <td>R$ <?= number_format($func["salBase"], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($func["valeTransp"], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($func["irrf"], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($func["inss"], 2, ',', '.') ?></td>
                                    <td>R$ <?= number_format($func["salLiq"], 2, ',', '.') ?></td>
                                </tr>
                        <?php } endforeach; ?>
                    </tbody>
                </table>
            </div>
        </body>
        <footer class="blog-footer">
            <h3>
                <p class="mt-3 text-center">
                    <?php
                        // Presença de um array com um for para mostrar a linguagem que foi feito 
                        $fez=["Feito ","em ","PHP"];
                        for($i = 0; $i < 3; $i++){
                            echo $fez[$i];
                        } 
                    ?>
                </p>
            </h3>   
        </footer> 
    </html>
<?php } ?>