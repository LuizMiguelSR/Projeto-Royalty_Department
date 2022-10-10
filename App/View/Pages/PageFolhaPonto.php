<?php
    require_once 'App/Model/ModelSession.php';
    ModelSession::verificaSessao();

    $titulo = 'Folha de Ponto de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<main>
    <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
    <div class="row">
        <h1 class="h3 mb-2 fw-normal">CONSULTA A FOLHA DE PONTO</h1>
    </div>
    <div class="row mx-5 mt-5">
        <table class="table table-bordered border-success hole">
            <thead>
                <tr>
                    <th scope="col" class="table-dark">Data</th>
                    <th scope="col" class="table-dark">Entrada</th>
                    <th scope="col" class="table-dark">Intervalo</th>
                    <th scope="col" class="table-dark">Saída</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-dark">22/10/2022</td>
                    <td class="table-dark">08:00</td>
                    <td class="table-dark">01:00</td>
                    <td class="table-dark">17:00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>