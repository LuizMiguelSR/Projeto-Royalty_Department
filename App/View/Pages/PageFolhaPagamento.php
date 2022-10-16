<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();
    $titulo = 'Folha de Pagamento';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded">
            <div class="row">
                <h1 class="h3 my-5 fw-normal">FOLHA DE PAGAMENTO</h1>
            </div>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pedro Bial</td>
                            <td>R$ 5.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div><br>  
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pedro Bial</td>
                            <td>R$ 5.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div><br>  
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Sal. Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pedro Bial</td>
                            <td>R$ 5.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div><br>  
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th>FGTS</th>
                            <th>INSS</th>
                            <th>Sist. S</th>
                            <th>RAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pedro Bial</td>
                            <td>R$ 5.000,00</td>
                            <td>R$ 5.000,00</td>
                            <td>R$ 5.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div><br>  
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th>Total da Folha de pagamento</th>
                        </tr>
                        <tr>
                            <td>R$ 5.000,00</td>
                        </tr>
                </table>
            </div>
        </main>
        <?php include 'App/View/Components/back.php'; ?>
    </section>
    <?php include 'App/View/Components/footer.php'; ?>
</body>
</html>