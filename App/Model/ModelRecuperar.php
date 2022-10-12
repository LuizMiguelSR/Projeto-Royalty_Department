<?php
    require_once 'App/Libs/phpMailer/PHPMailer.php';
    require_once 'App/Libs/phpMailer/SMTP.php';
    require_once 'App/Libs/phpMailer/Exception.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);

    try {
        $valida = (new DAOConnect)->select("funcionario");
        
        foreach($valida as $val) {
            if($recuperar == $val['email']){
                $nome = $val['nome_funcionario'];
                $id = $val['id_funcionario'];
                $idHash = password_hash($val['id_funcionario'], PASSWORD_DEFAULT);
                $valida = (new DAOConnect)->updateFuncionario('recuperar', $idHash, $id);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'mail.digitaltrainer.com.br';
                    $mail->SMTPAuth = True;
                    $mail->Username = 'informeroyal@digitaltrainer.com.br';
                    $mail->Password = 'mo#144mHn{TJ';
                    $mail->Port = 587;

                    $mail->setFrom('informeroyal@digitaltrainer.com.br');
                    $mail->addAddress($recuperar);

                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body = "Oi <strong>$nome</strong>, anote sua chave: $idHash";
                    $mail->AltBody = 'Oi '.$nome.', anote sua chave: '.$idHash;

                    if($mail->send()) {
                        header('Location: /redefineSucesso');
                        die();
                    } else {
                        $erro = "Mensagem não enviada ou email não encontrado";
                        ModelSystemLog::logEmailFail($erro);
                        header('Location: /');
                        die();
                    }
                } catch (Exception $e) {
                    $erro = $mail->ErrorInfo;
                    ModelSystemLog::logEmailFail($erro);
                    header('Location: /errorConnect');
                    die();
                }
            }
        }

    } catch(PDOException $e) {      
        $e->getMessage();
        ModelSystemLog::logServerFail($e);
        header('Location: /errorConnect');
        die();
    }
?>