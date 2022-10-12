<?php
    session_start();

    $titulo = 'Royalty - Login';
    include 'App/View/Components/headerExtern.php';
?>
<div class="container-fluid m-auto text-center">
    <div class="row">
        <main class="form-signin w-100 m-auto">
            <img src="App/View/Images/SystemImages/logobase.png" alt="Logo">
            <h1 class="h3 my-4 fw-normal">BEM VINDO</h1>
            <form  method="post" class="p-4 p-md-5 border rounded-3 bg-light" action="/valida">
                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mt-2">
                    <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                </div><br>
                <a href="/redefine">Esqueceu a senha?</a>
                <div class="alert alert-danger align-items-center my-3" role="alert">
                    <div>
                        ⚠ Login ou senha incorretos.
                    </div>
                </div>
                <input class="w-100 btn btn-lg btn-primary" type="submit" value="ENTRAR">
            </form>
        </main>
    </div>
<?php include 'App/View/Components/footer.php'; ?>