<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $titulo = 'Informações Gerais';
    include 'App/View/Components/header.php';
?>
<body>
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
    <main>
        <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
        <div class="row">
            <h1 class="h3 mb-2 fw-normal">Informações Gerais</h1>
        </div>
        <div class="row tabela">
            <table class="table-responsive-sm table-bordered border-success border-success">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sal. Base</th>
                        <th>V.T</th>
                        <th>IRRF</th>
                        <th>INSS</th>
                        <th>Sál. Líquido</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pedro Bial</td>
                        <td>R$ 5.000,00</td>
                        <td>R$ 220,00</td>
                        <td>R$ 246,05</td>
                        <td>R$ 700,00</td>
                        <td>R$ 3.833,95</td>
                        <td>
                            <form action="" method="">
                                <input type="hidden" name="deletar" value="">
                                <input class="btn btn-light" type="submit" value="Deletar">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table-responsive-sm table-bordered border-success">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Sal. Base</th>
                        <th>V.T</th>
                        <th>IRRF</th>
                        <th>INSS</th>
                        <th>Sál. Líquido</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pedro Bial</td>
                        <td>R$ 5.000,00</td>
                        <td>R$ 220,00</td>
                        <td>R$ 246,05</td>
                        <td>R$ 700,00</td>
                        <td>R$ 3.833,95</td>
                        <td>
                            <form action="" method="">
                                <input type="hidden" name="deletar" value="">
                                <input class="btn btn-light" type="submit" value="Deletar">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h1 class="h3 mb-2 fw-normal">CONSULTA HORAS EXTRAS</h1>
            <table class="table-responsive-sm table-bordered border-successy">
                <thead>
                    <tr>
                        <th colspan="2">Mensal</th>
                        <th colspan="2">Acumulado</th>
                        <th colspan="2">Valor Mensal</th>
                        <th colspan="2">Valor Acumulado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">40</td>
                        <td colspan="2">40</td>
                        <td colspan="2">40</td>
                        <td colspan="2">40</td>
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