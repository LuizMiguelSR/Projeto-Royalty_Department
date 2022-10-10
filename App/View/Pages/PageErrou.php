<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App/View/Styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Royalty - Login</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
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
                    <a href="redefine.php">Esqueceu a senha?</a>
                    <div class="alert alert-danger align-items-center my-3" role="alert">
                        <div>
                            ⚠ Login ou senha incorretos.
                        </div>
                    </div>
                    <input class="w-100 btn btn-lg btn-primary" type="submit" value="ENTRAR">
                </form>
            </main>
        </div>
        <div class="row mt-3">
            <?php include 'App/View/Components/footer.php'; ?>
        </div>
    </div>
</body>
</html>