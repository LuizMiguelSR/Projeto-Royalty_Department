<?php
    require_once '../src/PHPMailer.php';
    require_once '../src/SMTP.php';
    require_once '../src/Exception.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);
    $recuperar = $_POST["recuperar"];
    require_once 'connectDb.php';
    try {
        $gestor = new PDO("mysql:host=".MYSQL_HOST.";"."dbname=".MYSQL_DATABASE.";charset=utf8",MYSQL_USER,MYSQL_PASS);
        $gestor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $dado = $gestor->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($valida as $val) {
            if($recuperar == $val['email']){
                $nome = $val['funcionarioNome'];
                $id = $val['id_funcionario'];
                $idHash = password_hash($val['id_funcionario'], PASSWORD_DEFAULT);
                $gestor->exec("UPDATE funcionario SET recuperar = '$idHash' WHERE funcionario.id_funcionario = $id");
                try {
                    $mail->isSMTP();
                    $mail->Host = 'XXXx';
                    $mail->SMTPAuth = True;
                    $mail->Username = 'XXXX';
                    $mail->Password = 'XXXXX';
                    $mail->Port = 587;

                    $mail->setFrom('XXXXX');
                    $mail->addAddress($recuperar);

                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body = "Oi <strong>$nome</strong>, anote sua chave: $idHash";
                    $mail->AltBody = 'Oi '.$nome.', anote sua chave: '.$idHash;

                    if($mail->send()) {
                        header('Location: ../redefineSucesso.php');
                    } else {
                        header('Location: recuperarErro.php');
                    }
                } catch (Exception $e) {
                    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
                }
            }
        }

    } catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
        header('Location: sair.php');
        die();
    }
?>