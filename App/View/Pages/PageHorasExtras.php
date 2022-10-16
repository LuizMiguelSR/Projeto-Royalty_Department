<?php
    ModelSession::verificaSessao();
    date_default_timezone_set('America/Sao_Paulo'); 
    $dataAtual = date("Y-m-d");
    $titulo = 'Horas Extras de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <div class="row my-5">
                <h1 class="h3 mb-2 fw-normal">CONSULTA HORAS EXTRAS</h1>
            </div>
            <div class="row tabela">
                <br>
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th>Mensal</th>
                            <th>Acumulado</th>
                            <th>Valor Mensal</th>
                            <th>Valor Acumulado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>40</td>
                            <td>40</td>
                            <td>40</td>
                            <td>40</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <?php include 'App/View/Components/back.php'; ?>
    </section>
    <?php include 'App/View/Components/footer.php'; ?>
</body>
</html>