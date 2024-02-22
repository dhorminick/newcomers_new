<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';


    function _sendmail($sender, $recipient, $body, $subject){
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'mail.newcomersunion.com';
        $mail->Username = 'info@newcomersunion.com';
        $mail->Password = 'UkO.?OZ;q!DV';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom($sender, "New Comers Union");
        $mail->addAddress($recipient, "New Comers Union");
        $mail->Priority = 1;
        $mail->AddCustomHeader("X-MSMail-Priority: High");

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        if ($mail->send()) {
            $return = array(
            'sent' => 'true',
            'error' => 'none'
            );
        }else{
            $return = array(
            'sent' => 'false',
            'error' => $mail->ErrorInfo,
            );
        }

        return $return;
    }

    function _reg($sender, $recipient, $subject, $otp){
        $body = 'u';
        $sent = _sendmail($sender, $recipient, $body, $subject);
        if ($sent['error'] == 'SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting') {
            $sent['error'] = 'Connection Error!!';
        } else {}
        
        return $sent;
    }

    function _sendmassmail($sender, $recipient, $body, $subject){
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'mail.newcomersunion.com';
        $mail->Username = 'info@newcomersunion.com';
        $mail->Password = 'UkO.?OZ;q!DV';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Priority = 1;
        $mail->AddCustomHeader("X-MSMail-Priority: High");

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->setFrom($sender, "New Comers Union");

        if (is_array($recipient) == 1) {
            $count = count($recipient);
            for ($i=0; $i < $count; $i++) { 
                $mail->addAddress($recipient[$i], "New Comers Union");
                $mail->send();
            }

            $return = 'sent';
        } else {
            #not an array
            $return = 'Recipient List Should Be AN Array!!';
        }

        return $return;
    }

    function _sendcontactmail($name, $sender, $recipient, $subject, $body){
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'mail.newcomersunion.com';
        $mail->Username = 'info@newcomersunion.com';
        $mail->Password = 'UkO.?OZ;q!DV';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Priority = 1;
        $mail->AddCustomHeader("X-MSMail-Priority: High");

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->setFrom($sender, ucwords($name));

        $mail->addAddress($recipient, "New Comers Union");
        if ($mail->send()) {
           $return = 'Mail Delivered Successfully, Our Admins Would Get Back To YOu As Soon As Possible!';
        } else {
            $return = 'Error Delivering Mail!!';
        }

        return $return;
    }
?>