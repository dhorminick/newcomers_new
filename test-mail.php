<?php
    // include 'inc/mail.inc.php';
    // $sender = 'info@newcomersunion.com';
    // $recipient = 'etiketochukwu@gmail.com';
    // $body = 'test mail';
    // $subject = 'test subject';
    // $test = _sendmail($sender, $recipient, $body, $subject);
    // var_dump($test);
    $t = 2;
    switch ($t) {
        case 1:
        ?>
        test 1
        <?php
            # code...
            break;
        
        case 2:
        ?>
        test 2
        <?php
            # code...
            break;
    
        default:
        ?> test default 
        <?php
            # code...
            break;
    }
    <?php switch ($_activated['report']) { case 'activated': ?>
                            Account Already Activated<br />
                            <?php break; case 'mail_sent': ?>
                            Authentication Email Resent To <?php echo $email; ?>
                            <?php break; case 'mail_error': ?>
                            <?php break; default: ?>
                            <?php break; } ?>
?>