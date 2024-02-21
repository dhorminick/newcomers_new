<?php 
    $file_dir = '../';
    include $file_dir.'inc/config.inc.php'; 
    include $file_dir.'inc/db.inc.php';
    require $file_dir.'inc/mail.inc.php'; 
    $message = [];

    $authe = false;
    if (isset($_GET['e']) && isset($_GET['auth'])) {
        $authe = true;
        $e = sanitizePlus($_GET['e']);
        $auth = sanitizePlus($_GET['auth']);

        #select all mails
        $CheckIfUserExist = "SELECT * FROM newcomers_users WHERE md5(crc32(md5(crc32(md5(crc32(md5(email))))))) = '$e' AND token = '$auth' LIMIT 1";
        $UserExist = $con->query($CheckIfUserExist);
        if ($UserExist->num_rows > 0) {
            $auth_error = true;
            $row = $UserExist->fetch_assoc();
            $activated = $row['activated'];
            $email = $row['email'];

            if ($activated == 'true') {
                array_push($message, "Error 402: Account Authentication Complete!!");
            } else {
                $updateUser = "UPDATE newcomers_users SET activated = 'true' WHERE email = '$email' AND activated = 'false' LIMIT 1";
                $userUpdated = $con->query($updateUser);
                if($userUpdated){
                    #done
                    array_push($message, "<i class='fas fa-check'></i> Authentication Completed Successfully!!");

                    #login
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["email"] = $email;
                }else{
                    #error, error updating db 
                    array_push($message, "<i class='fas fa-check'></i> Error 502: Authentication Error!!");
                }
            }
        }else{
            $auth_error = false;
            #error, user doesn't exist
            array_push($message, "Error 402: Authentication Token Doesn't Exist!!");
        }
    }else{
        $authe = false;
    }

    if (isset($_POST['resend-email'])) {
        $e = sanitizePlus($_POST['e']);

        #select all mails
        $CheckIfUserExist = "SELECT * FROM newcomers_users WHERE md5(crc32(md5(crc32(md5(crc32(md5(email))))))) = '$e' LIMIT 1";
        $UserExist = $con->query($CheckIfUserExist);
        if ($UserExist->num_rows > 0) {
            $row = $UserExist->fetch_assoc();
            $activated = $row['activated'];
            $email = $row['email'];
            $otp = $row['otp'];

            if ($activated == 'true') {
                array_push($message, "Error 402: Account Already Authenticated!!");
            } else {
                $subject = 'New Comers Union - Activate Account Email Address (OTP)';
                $recipient = $email;
                $sender = $regMailSender;
                #$mailBody = 'Your One-Time Confirmation Link is:' . $confirmation_link;

                $_sentmail = _reg($sender, $recipient, $subject, $otp);
                if ($_sentmail['sent'] == 'true') {
                    array_push($message, "Authentication Email Resent To '".$email."'!!");
                }else{
                    #error, otp unsuccessful
                    array_push($message, "Error 502: Error Sending OTP!! ".$_sentmail['error']);
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Account <?php echo $site; ?></title>

    <?php include $file_dir.'inc/header.layout.php'; ?>
</head>
<body>
    <header class="header_four">
    <?php include $file_dir.'inc/nav.layout.php'; ?>
    </header>

    <section class="card">
        <div class="card-body flex-center">
            <?php require $file_dir.'inc/alert.inc.php'; ?>
            <?php if ($authe == false){ ?>
            <div class="txt">
                <div class="card-header">
                    <h4>Activate Account</h4>
                </div>
                <p>
                    We work to ensure people’s comfort at their home, and to provide the best and the fastest help at fair prices. We stand for quality, safety and credib company specializing in household maintenance.
                </p>
                <a href="/"><button class="btn btn-md btn-primary btn-icon icon-left"><i class="fas fa-arrow-left"></i> Back To Home</button></a>
            </div>
            <?php }else{ ?>
            <?php if ($auth_error == false){ ?>
            <div class="txt">
                <div class="card-header">
                    <h4>Activate Account</h4>
                </div>
                <p>Authentication Token Error!!</p>
                <a href="/"><button class="btn btn-md btn-primary btn-icon icon-left"><i class="fas fa-arrow-left"></i> Back To Home</button></a>
            </div>
            <?php }else{ ?>
            <div class="txt">
                <div class="card-header">
                    <h4>Authenticate Account</h4>
                </div>
                <p>Account Verified!!</p>
                <a href="/"><button class="btn btn-md btn-primary btn-icon icon-left"><i class="fas fa-check"></i> Sign In</button></a>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </section>
    
    <?php include $file_dir.'inc/footer.layout.php'; ?>
    <?php include $file_dir.'inc/scripts.layout.php'; ?>
</body>
</html>
<style>
    .flex-center{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .flex-center div.txt{
        text-align: center;
        padding: 20px;
        width: 50%;
    }
    .flex-center div.txt .card-header{
        margin-bottom: 20px;
    }
</style>