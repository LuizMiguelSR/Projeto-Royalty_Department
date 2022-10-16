<?php
    require_once 'App/Libs/phpMailer/PHPMailer.php';
    require_once 'App/Libs/phpMailer/SMTP.php';
    require_once 'App/Libs/phpMailer/Exception.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);

    try {
        $valida = (new DAOOperacoes)->select("funcionario");
        
        foreach($valida as $val) {
            if($recuperar == $val['email']){
                $nome = $val['nome_funcionario'];
                $id = $val['id_funcionario'];
                $idHash = password_hash($val['id_funcionario'], PASSWORD_DEFAULT);
                (new DAOOperacoes)->updateFuncionario('recuperar', $idHash, $id);
                try {
                    $mail->isSMTP();
                    $mail->Host = $_ENV['smtp']['host'];
                    $mail->SMTPAuth = True;
                    $mail->Username = $_ENV['smtp']['user'];
                    $mail->Password = $_ENV['smtp']['pass'];
                    $mail->Port = $_ENV['smtp']['port'];

                    $mail->setFrom($_ENV['smtp']['user']);
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