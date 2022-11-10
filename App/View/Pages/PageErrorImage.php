<?php
    ModelSession::verificaSessao();
    ModelSession::verificaRole();

    $voltar = '/gerenciar_funcionarios';
    $titulo = 'Ops Imagem Inválida';
    include 'App/View/Components/headerExtern.php';
?>
    <style>
        img {
            vertical-align: middle;
            height: 21em;
        }
    </style>
    <div class="container-fluid m-auto text-center">
        <div class="row">
            <main class="form-signin w-100 m-auto">
                <h1 class="h1 my-4 fw-normal">IMAGEM INVÁLIDA</h1>
                <h1 class="h3 my-4 fw-normal">SELECIONE UMA IMAGEM COM ATÉ 5mb E EXTENSÕES JPG OU PNG</h1>
                <img class="erroimg" src="App/View/Images/SystemImages/imageNotFound.svg" alt="Erro imagem não encontrada" title="Erro de imagem não encontrada">
            </main>
        </div>
    <?php 
        include 'App/View/Components/backPainel.php';
        include 'App/View/Components/footer.php'; 
    ?>
    </div>
</body>
</html>