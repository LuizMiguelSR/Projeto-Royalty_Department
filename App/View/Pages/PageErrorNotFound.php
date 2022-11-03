<?php
    session_start();
    $titulo = 'Ops Página não encontrada';
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
                <h1 class="h1 my-4 fw-normal">PÁGINA NÃO ENCONTRADA</h1>
                <img class="erroimg" src="App/View/Images/SystemImages/erro404.svg" alt="Erro">
            </main>
        </div>
    <?php 
        include 'App/View/Components/backExtern.php';
        include 'App/View/Components/footer.php'; 
    ?>
    </div>
</body>
</html>