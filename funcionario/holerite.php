<?php
    require_once '../configs/connectDb.php';
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
    }

    $dados = $gestor->query("Select * FROM trabalho");
    $funcionarios = $dados->fetchAll(PDO::FETCH_ASSOC);
    $dados2 = $gestor->query("Select * FROM funcionario");
    $funcionarios2 = $dados2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Consulta ao Holerite</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <div class="container-fluid m-auto text-center">
        <header>
            <div class="row">
                <?php
                    include '../components/navbar.php';
                ?>
            </div>
        </header>
        <main>
            <div class="row">
                <div class="person">
                    <div class="container">
                        <div class="container-inner">
                            <img class="circle"/>
                            <img class="img img1" alt="Helerite" src="../img/holerite.svg"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h1 class="h3 mb-2 fw-normal">Bem vindo(a), <?php echo "{$_SESSION['nome']}"; ?>, este é seu holerite do mês</h1>
            </div>
            <div class="row mx-5 mt-5">
                
                <table class="table table-bordered border-success hole">
                    <thead>
                        <tr>
                            <td>INSS a recolher</td>
                            <?php foreach($funcionarios as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_trabalho'] ){
                            ?>
                            <td>R$ <?= number_format($func["inss"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                    </thead>
                </table>
                <span><a href="https://www.in.gov.br/en/web/dou/-/portaria-interministerial-mtp/me-n-12-de-17-de-janeiro-de-2022-375006998" target="_blank">Fonte: Tabela INSS 2022 Oficial</a></span>
            </div>
            <div class="row mx-5 mt-2">
                <table class="table table-bordered border-success hole">
                    <thead>
                        <tr>
                            <td>IRRF a recolher</td>
                            <?php foreach($funcionarios as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_trabalho'] ){
                            ?>
                                    <td>R$ <?= number_format($func["irrf"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                    </thead>
                </table>
                <span><a href="https://www.gov.br/receitafederal/pt-br/assuntos/orientacao-tributaria/tributos/irpf-imposto-de-renda-pessoa-fisica#tabelas-de-incid-ncia-mensal" target="_blank">Fonte: Tabela IRRF 2022 Oficial</a></span>
            </div>
            <div class="row mx-5 mt-2">
                <table class="table table-bordered border-success hole">
                    <thead>
                        <tr>
                            <th scope="col">Sal. Base</th>
                            <th scope="col">Sal. Líquido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach($funcionarios2 as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_funcionario'] ){
                            ?>
                                    <td>R$ <?= number_format($func["salarioBase"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                            <?php foreach($funcionarios as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_trabalho'] ){
                            ?>
                                    <td>R$ <?= number_format($func["salarioLiquido"], 2, ',', '.') ?></td>
                            <?php } endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mt-3">
                <a href="painelFuncionario.php"><img class="mt-3 voltar" src="../img/voltar.png" alt="voltar"></a>
            </div>
            <div class="row">
                <p>VOLTAR</p>
            </div>
        </main>
        <div class="row mt-5">
            <?php
                include '../components/footer.php';
            ?>
        </div>
    </div> 
</body>
</html>