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
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.mailtrap.io';
                    $mail->SMTPAuth = True;
                    $mail->Username = '7f6c7c93fad706';
                    $mail->Password = 'b1e22bfc23f7e1';
                    $mail->Port = 2525;

                    $mail->setFrom('6624cf1abc-4de2a2@inbox.mailtrap.io');
                    $mail->addAddress($recuperar);

                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperar de Senha';
                    $mail->Body = "Oi <strong>$nome</strong>, anote sua chave: $idHash";
                    $mail->AltBody = 'Oi Bobo, anote sua chave';

                    if($mail->send()) {
                        header('Location: ../redefineSucesso.php');
                        die();
                    } else {
                        header('Location: recuperarErro.php');
                        die();
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