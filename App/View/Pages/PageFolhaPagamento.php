<?php
    require_once 'App/Model/ModelSession.php';
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $titulo = 'Folha de Pagamento';
    include 'App/View/Components/header.php';
?>
<main>
    <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
    <div class="row">
        <h1 class="h3 mb-2 fw-normal">FOLHA DE PAGAMENTO</h1>
    </div>
    <div class="row mx-5 mt-5">
        <div class="accordion accordion-flush sticky" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Recursos Humanos
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body sticky">
                        <table class="table table-bordered border-success sticky">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Sal. Base</th>
                                    <th scope="col">V.T</th>
                                    <th scope="col">IRRF</th>
                                    <th scope="col">INSS</th>
                                    <th scope="col">Sál. Líquido</th>
                                    <th scope="col">Deletar</th>
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
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Financeiro
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table table-bordered border-success">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Sal. Base</th>
                                    <th scope="col">V.T</th>
                                    <th scope="col">IRRF</th>
                                    <th scope="col">INSS</th>
                                    <th scope="col">Sál. Líquido</th>
                                    <th scope="col">Deletar</th>
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
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Marketing
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table table-bordered border-success">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Sal. Base</th>
                                    <th scope="col">V.T</th>
                                    <th scope="col">IRRF</th>
                                    <th scope="col">INSS</th>
                                    <th scope="col">Sál. Líquido</th>
                                    <th scope="col">Deletar</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>