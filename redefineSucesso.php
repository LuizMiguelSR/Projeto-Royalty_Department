<?php
    session_start();
    session_destroy();
    $_SESSION = array();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Recuperar Senha</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
    <div class="container-fluid m-auto text-center">
        <div class="row">
            <main class="form-signin w-100 m-auto">
                <img src="img/redefine.svg" alt="Redefinir Senha">
                <h1 class="h3 mb-3 fw-normal">Recuperação Realizada</h1>
                <h3>Digite abaixo a chave de recuperação e a nova senha</h3>
                <form  method="post" class="p-4 p-md-5 border rounded-3 bg-light" action="configs/recuperarConfirma.php">
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
        <div class="row mt-3">
            <?php
                include 'components/footer.php';
            ?>
        </div>
    </div>
</body>
</html>