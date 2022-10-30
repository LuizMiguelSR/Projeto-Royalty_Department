<?php
    ModelSession::verificaSessao();

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $dataDysplay = date('d/m/Y');
    $horaAtual = date("H:i:s");

    $titulo = 'Registro de Ponto de '.$_SESSION['nome'];
    include 'App/View/Components/header.php';
?>
<body onLoad="showtime()">
    <?php include 'App/View/Components/navbar.php'; ?>
    <section>
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
            callerdate=new Date(<?php date("Y,m,d,H,i,s");?>);
        </script>
        <main>
            <img src="App/View/Images/SystemImages/logobase.png" class="rounded"><br><br>
            <div class="row my-3">
                <h1 class="h3 mb-2 fw-normal">REGISTRE SUA ENTRADA</h1>
            </div>
            <form method="POST" action="/registro_ponto_model">
                <div class="row mt-5">
                    <main class="form-add w-100 m-auto">
                        <div class="container1">
                            <div class="clock" id="face"></div>
                        </div>
                    </main>
                </div>
                <div class="row my-5">
                    <div class="col-md-3 mt-4">
                        <button name="hora" type="submit" class="btn btn-primary" value="<?php echo $horaAtual ?>">REGISTRAR PONTO</button>
                    </div>
                </div>
            </form>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Data</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Entrada</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Pausa</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Retorno</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Saída</th>
                            <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Horas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <?php foreach((new DAOOperacoes)->select("funcionario_ponto") as $func):
                                if ($_SESSION['id_usuario'] == $func['id_funcionario'] && $func['diames'] == $data){ ?>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo date('d/m/Y', strtotime($func['diames']))?></td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['entrada']; ?></td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['almoco_sai']; ?></td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['almoco_che']; ?></td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['saida']; ?></td>
                                    <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $func['horas_trabalhadas']; ?></td>
                            <?php } endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php include 'App/View/Components/back.php'; ?>
            <?php include 'App/View/Components/footer.php'; ?>
        </main>
    </section>
</body>
</html>