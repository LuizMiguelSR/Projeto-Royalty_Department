<!-- Página destinada a informações sobre os autores -->
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Sobre</title>
</head>
<body>

	<!-- NavBar utilizando o BootStrap -->
    <div class="conteiner">
        <div class="row">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Sobre</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
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
            <h3 class="mt-5 text-center">Projeto realizado por:</h3>
        </div>
    </div>

    <!-- Imagem Autores -->
    <div class="conteiner">
        <div class="row">
            <div class="col text-center">
                <img class="rounded-circle border border-2 w-25 p-3" src="./luiz.jpg" alt="Luiz Miguel Photo">
            </div>
            <div class="col text-center">
                <img class="rounded-circle border border-2 w-25 p-3" src="./joao.jpg" alt="João Vitor Photo">
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h4>Luiz Miguel Santos Rodrigues</h4>
            </div>
            <div class="col text-center">
                <h4>João Vitor Lourenço</h4>
            </div>
        </div>
    </div>

    <!-- Voltar -->
    <div class="conteirner">
        <div class="row">
            <p class="mt-3 text-center"><a href="index.php">VOLTAR</a></p>
        </div>
    </div>
</body>
<footer class="blog-footer">
    <h3>
        <p class="mt-3 text-center">
            <?php 
                $fez=["Feito ","em ","PHP"];
                for($i = 0; $i < 3; $i++){
                    echo $fez[$i];
                } 
            ?>
        </p>
    </h3>   
</footer>   
</html>