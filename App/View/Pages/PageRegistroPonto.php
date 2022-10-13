<?php
    ModelSession::verificaSessao();

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $dataDisplay = date('d/m/Y');
    $horaAtual = date("H:i:s");

    $titulo = 'Registro de Ponto de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<script>
    function showtime(){ 
        setTimeout("showtime();",1000);
        
        callerdate.setTime(callerdate.getTime()+1000);
        var hh = String(callerdate.getHours());
        var mm = String(callerdate.getMinutes());
        var ss = String(callerdate.getSeconds());

        document.getElementById("face").innerHTML =
        ((hh < 10) ? " " : "") + hh +
        ((mm < 10) ? ":0" : ":") + mm +
        ((ss < 10) ? ":0" : ":") + ss;
    }
    callerdate=new Date(<?php echo date("Y,m,d,H,i,s");?>);
</script>
<main>
    <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
    <div class="row">
        <h1 class="h3 mb-2 fw-normal">REGISTRE SUA ENTRADA</h1>
    </div>
    <form method="POST" action="/registroPontoValida">
        <div class="row mt-2">
            <main class="form-add w-100 m-auto">
                <div class="container1">
                    <div class="clock" id="face"></div>
                </div>
            </main>
        </div>
        <div class="row">
            <div class="col-md-2 mt-4">
                <button name="hora" type="submit" class="btn btn-primary" value="<?php echo $horaAtual ?>">REGISTRAR PONTO</button>
            </div>
        </div>
    </form>
    <div class="row mx-5 mt-5">
        <table class="table table-bordered border-success hole">
            <thead>
                <tr>
                    <th scope="col" class="table-dark">Data</th>
                    <th scope="col" class="table-dark">Entrada</th>
                    <th scope="col" class="table-dark">Intervalo Ida</th>
                    <th scope="col" class="table-dark">Intervalo Volta</th>
                    <th scope="col" class="table-dark">Saída</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table-dark"><?php echo $dataDisplay ?></td>
                    <?php foreach((new DAOOperacoes)->select("funcionario_ponto") as $func):
                        if ($_SESSION['id_funcionario'] == $func['id_funcionario'] && $func['diames'] == $data){ ?>
                            <td class="table-dark"><?php echo $func['entrada']; ?></td>
                        <td class="table-dark"><?php echo $func['almoco_sai']; ?></td>
                        <td class="table-dark"><?php echo $func['almoco_che']; ?></td>
                        <td class="table-dark"><?php echo $func['saida']; ?></td>
                    <?php } endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
    <?php include 'App/View/Components/back.php'; ?>
</main>
<?php include 'App/View/Components/footer.php'; ?>