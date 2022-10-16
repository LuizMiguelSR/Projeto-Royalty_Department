<?php
    ModelSession::verificaSessao();

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $horaAtual = date("H:i:s");
    $dataDysplay = date('d/m/Y');

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
            <form method="POST" action="/registroPontoValida">
                <div class="row mt-5">
                    <main class="form-add w-100 m-auto">
                        <div class="container1">
                            <div class="clock" id="face"></div>
                        </div>
                    </main>
                </div>
                <div class="row my-5">
                    <div class="col-md-3 mt-4">
                        <button name="hora" type="submit" class="btn btn-primary" value="<?php $horaAtual ?>">REGISTRAR PONTO</button>
                    </div>
                </div>
            </form>
            <div class="row tabela">
                <table class="table-responsive-sm table-bordered border-success">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Entrada</th>
                            <th>Pausa</th>
                            <th>Retorno</th>
                            <th>Saída</th>
                            <th>Horas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $dataDysplay ?></td>
                            <?php foreach((new DAOOperacoes)->select("funcionario_ponto") as $func):
                                if ($_SESSION['id_funcionario'] == $func['id_funcionario'] && $func['diames'] == $data){ ?>
                                    <td><?php echo $func['entrada']; ?></td>
                                    <td><?php echo $func['almoco_sai']; ?></td>
                                    <td><?php echo $func['almoco_che']; ?></td>
                                    <td><?php echo $func['saida']; ?></td>
                                    <td><?php echo $func['horas_trabalhadas']; ?></td>
                            <?php } endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <?php include 'App/View/Components/back.php'; ?>
    </section>
    <?php include 'App/View/Components/footer.php'; ?>
</body>
</html>