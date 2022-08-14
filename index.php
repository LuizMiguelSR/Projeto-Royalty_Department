<!-- Página inicial do sistema com formulário de login para administradores e funcionários -->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Home</title>
    </head>
    <body>
        <!-- BootStrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- NavBar utilizando o BootStrap -->
        <div class="container">
            <div class="row">
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Página de Login</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="about.php">Sobre</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Título -->
        <div class="container mt-5">
            <div class="row">
                <h3 class="mt-5 text-center">Login de usuário</h3>
            </div>
        </div>
        
        <!-- Formulário de login -->
        <div class="container sm ml-5 mt-2">
            <div class="row">
                <form action="valida.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">Digite um email válido.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input name="senha" type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <input class="btn btn-dark" type="submit" value="Logar">
                </form>
            </div>
        </div>
    </body>
    <footer class="blog-footer">
        <h3>
            <p class="mt-3 text-center">
                <?php
                    // Presença de um array com um for para mostrar a linguagem que foi feito 
                    $fez=["Feito ","em ","PHP"];
                    for($i = 0; $i < 3; $i++){
                        echo $fez[$i];
                    } 
                ?>
            </p>
        </h3>   
    </footer> 
</html>