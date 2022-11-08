<?php
    ModelSession::destroiSessao();

    $titulo = 'Royalty - Login';
    include 'App/View/Components/headerExtern.php';
?>  
<div class="container-fluid m-auto text-center">
    <div class="row">
        <main class="form-signin w-100 m-auto">
            <img src="App/View/Images/SystemImages/logobase.png" alt="Logo" title="Logo da Royalty">
            <h1 class="h3 my-4 fw-normal">BEM VINDO</h1>
            <form  method="POST" class="p-4 p-md-5 border rounded-3 bg-light" action="/valida">
                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="nome@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mt-2">
                    <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password" maxlength="50" required>
                    <label for="floatingPassword">Senha</label>
                </div><br>
                <a href="/redefine">Esqueceu a senha?</a>
                <input class="w-100 btn btn-lg btn-primary mt-2" type="submit" value="ENTRAR">
            </form>
        </main>
    </div>
<?php include 'App/View/Components/footer.php'; ?>