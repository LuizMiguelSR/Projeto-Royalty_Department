<?php
    ModelSession::destroiSessao();
    
    $titulo = 'Recuperar Senha';
    include 'App/View/Components/headerExtern.php';
?> 
<div class="container-fluid m-auto text-center">
    <div class="row">
        <main class="form-signin w-100 m-auto">
            <img src="App/View/Images/SystemImages/logobase.png" alt="Redefinir Senha">
            <h1 class="h3 mb-3 fw-normal">Recuperação Realizada</h1>
            <h3>Digite abaixo a chave de recuperação e a nova senha</h3>
            <form  method="post" class="p-4 p-md-5 border rounded-3 bg-light" action="/recuperarConfirma">
                <div class="form-floating">
                    <input name="chave" class="form-control" id="floatingInput" placeholder="Sua nova senha">
                    <label for="floatingInput">Chave</label>
                </div>
                <div class="form-floating mt-2">
                    <input name="novaSenha" type="password" class="form-control" id="floatingInput" placeholder="Sua nova senha">
                    <label for="floatingInput">Nova Senha</label>
                </div>
                <input class="w-100 btn btn-lg btn-primary mt-2" type="submit" value="RECUPERAR">
            </form>
        </main>
    </div>
<?php 
    include 'App/View/Components/backExtern.php';
    include 'App/View/Components/footer.php'; 
?>