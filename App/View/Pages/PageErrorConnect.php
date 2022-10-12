<?php
    session_start();
    
    $titulo = 'Ops!!!';
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
            <h1 class="h1 my-4 fw-normal">CONEXÃO NÃO ESTABELECIDA</h1>
            <img class="erroimg" src="App/View/Images/SystemImages/erro503.svg" alt="Erro">
        </main>
    </div>
<?php 
    include 'App/View/Components/backExtern.php';
    include 'App/View/Components/footer.php'; 
?>