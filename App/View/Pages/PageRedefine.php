<?php
    require_once 'App/Model/ModelSession.php';
    session_start();
    
    $titulo = 'Recuperar Senha';
    include 'App/View/Components/headerExtern.php';
?> 
<div class="container-fluid m-auto text-center">
    <div class="row">
        <main class="form-signin w-100 m-auto">
            <img src="App/View/Images/SystemImages/logobase.png" alt="Logo da Royalty" title="Logo da Royalty">
            <h1 class="h3 my-4 fw-normal">Recuperação de Senha</h1>
            <form  method="post" class="p-4 p-md-5 border rounded-3 bg-light" action="/recuperar">
                <div class="form-floating">
                    <input name="recuperar" type="email" class="form-control" id="floatingInput" value="<?php 
                        if(empty($_SESSION['email'])){
                            echo 'email@email.com';
                        }else{
                            echo $_SESSION['email'];
                        }; 
                    ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="50" required>
                    <label for="floatingInput">Email</label>
                </div>
                <input class="w-100 btn btn-lg btn-primary mt-2" type="submit" value="RECUPERAR">
            </form>
        </main>
    </div>
<?php 
    include 'App/View/Components/backExtern.php';
    include 'App/View/Components/footer.php'; 
?>