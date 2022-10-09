<?php
    require_once '../libs/phpMailer/PHPMailer.php';
    require_once '../libs/phpMailer/SMTP.php';
    require_once '../libs/phpMailer/Exception.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer(true);
    $recuperar = $_POST["recuperar"];

    try {
        require_once 'connectDb.php';

        $dado = $conexao->query("Select * FROM funcionario");
        $valida = $dado->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($valida as $val) {
            if($recuperar == $val['email']){
                $nome = $val['nome_funcionario'];
                $id = $val['id_funcionario'];
                $idHash = password_hash($val['id_funcionario'], PASSWORD_DEFAULT);
                $conexao->exec("UPDATE funcionario SET recuperar = '$idHash' WHERE funcionario.id_funcionario = $id");
                try {
                    $mail->isSMTP();
                    $mail->Host = 'mail.digitaltrainer.com.br';
                    $mail->SMTPAuth = True;
                    $mail->Username = 'naoresponda@digitaltrainer.com.br';
                    $mail->Password = 'CpibwrP=NfM2';
                    $mail->Port = 587;

                    $mail->setFrom('naoresponda@digitaltrainer.com.br');
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
        $e->getMessage();
        include_once '../classes/logSystem.php';
        header('Location: ../errorConnect.php');
        die();
    }
?>