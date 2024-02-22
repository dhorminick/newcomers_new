<?php 
    $file_dir = '../';
    include $file_dir.'inc/config.inc.php'; 
    include $file_dir.'inc/db.inc.php';
    require $file_dir.'inc/mail.inc.php'; 
    $message = [];

    $signedIn = false;
    if (isset($_SESSION["loggedIn"]) == true || isset($_SESSION["loggedIn"]) === true) {
        $signedIn = true;
    } else {}

    $resend_email = false;
    
    if(isset($_GET['token']) && isset($_GET['e']) && $_GET['token'] !== '' && $_GET['e'] !== '' && $_GET['token'] !== null && $_GET['e'] !== null) {
        $authe = true;
        $e = sanitizePlus($_GET['e']);
        $auth = sanitizePlus($_GET['auth']);

        #select all mails
        $CheckIfUserExist = "SELECT * FROM newcomers_users WHERE md5(crc32(md5(crc32(md5(crc32(md5(email))))))) = '$e' AND token = '$auth' LIMIT 1";
        $UserExist = $con->query($CheckIfUserExist);
        if ($UserExist->num_rows > 0) {
            $userExists = true;
            $row = $UserExist->fetch_assoc();
            $activated = $row['activated'];
            $email = $row['email'];

            if ($activated == 'true') {
                $userAuthenticated = true;
            } else {
                $userAuthenticated = false;
                $updateUser = "UPDATE newcomers_users SET activated = 'true' WHERE email = '$email' AND activated = 'false' LIMIT 1";
                $userUpdated = $con->query($updateUser);
                if($userUpdated){
                    #done
                    #login
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["email"] = $email;
                }else{
                    #error, error updating db 
                    array_push($message, "<i class='fas fa-check'></i> Error 502: Authentication Error!!");
                }
            }
        }else{
            $userExists = true;
            #error, user doesn't exist
            array_push($message, "Error 402: Authentication Token Doesn't Exist!!");
        }
    }else{
        $authe = false;
    }

    if (isset($_POST['resend-email'])) {
        $resend_email = true;
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
                $_activated = array(
                    'message' => 'Account Already Authenticated!!',
                    'button' => 'login',
                    'report' => 'activated'
                );
                // $activated_message = 'Account Already Authenticated!!';
                // array_push($message, "Error 402: Account Already Authenticated!!");
            } else {
                $subject = 'New Comers Union - Activate Account Email Address (OTP)';
                $recipient = $email;
                $sender = $regMailSender;
                #$mailBody = 'Your One-Time Confirmation Link is:' . $confirmation_link;

                $_sentmail = _reg($sender, $recipient, $subject, $otp);
                if ($_sentmail['sent'] == 'true') {
                    $_activated = array(
                        'message' => "Authentication Email Resent To '".$email."'!!",
                        'button' => 'none',
                        'report' => 'mail_sent'
                    );
                    // array_push($message, "Authentication Email Resent To '".$email."'!!");
                }else{
                    #error, otp unsuccessful
                    $_activated = array(
                        'message' => "Error Sending OTP, ".$_sentmail['error'],
                        'button' => 'resend',
                        'report' => 'mail_error',
                        'email' => weirdlyEncode($email)
                    );
                    // array_push($message, "Error 502: Error Sending OTP!! ".$_sentmail['error']);
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Authenticate Account <?php echo $site; ?></title>
	<?php include $file_dir.'inc/tags.layout.php'; ?>
	<?php include $file_dir.'inc/style.layout.php'; ?>
	<link rel="stylesheet" href="../assets/main.css">
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(../assets/images/background/bg2.jpg);">
			<a href="index.html"><img src="../assets/images/logo-white-2.png" alt=""></a>
		</div>
		<div class="account-form-inner">
            <div class="account-container">
                <?php if($resend_email == true){ #resend otp?>
                    <div class="heading-bx left">
                        <?php include $file_dir.'inc/alert.inc.php'; ?>
                        <h2 style="margin-bottom: 0px !important;">Recend Email Authentication</h2>
                        <p>Sign in to your mail account to activate your account:</p>
                    </div>	
                    <div class="contact-bx">
                        <div class="row placeani">
                            <div class="col-12" style="text-align: center;">
                                <div><?php echo $_activated['message']; ?></div>
                            </div>

                            <?php switch ($_activated['button']) { case 'login': ?>
                            <div class="col-12" style="text-align: center;margin-top:30px;">
                                <div class="form-group">
                                    <a href="sign-in" class="btn btn-primary btn-md btn-icon icon-left" style="color:white;"><i class="fa fa-arrow-left"></i> Sign In</a>
                                </div>
                            </div>
                            <?php break; case 'none': ?>
                            <?php break; case 'resend': ?>
                            <div class="col-12" style="text-align: center;margin-top:30px;">
                                <div class="form-group">
                                    <form method="post">
                                        <input type="hidden" name="e" value="<?php echo $_activated['email']; ?>">
                                        <button class="btn btn-primary btn-md btn-icon icon-left" name="resend-email" style="color:white;"><i class="fa fa-check"></i> Resend Email</button>
                                    </form>
                                </div>
                            </div>
                            <?php break; default: ?>
                            <?php break; } ?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="heading-bx left">
                        <?php include $file_dir.'inc/alert.inc.php'; ?>
                        <h2 style="margin-bottom: 0px !important;">Authenticate Account!!</h2>
                        <p>Sign in to your mail account to activate your account:</p>
                    </div>	
                    <?php if($signedIn == true){ #user signed in?>
                        <div class="contact-bx">
                            <div class="row placeani">
                                <div class="col-12" style="text-align: center;">
                                    <h4>Authentication Error!! </h4>
                                    User already signed in<br />
                                    Redirecting to home page in <span class="count">6</span> seconds
                                </div>
                                <div class="col-12" style="text-align: center;margin-top:30px;">
                                    <div class="form-group">
                                        <a href="/" class="btn btn-primary btn-md btn-icon icon-left" style="color:white;"><i class="fa fa-arrow-left"></i> Back Home</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <?php if($authe == true){ ?>
                            <?php if($userExists == true){ ?>
                                <?php if($userAuthenticated == true){ ?>
                                    <div class="contact-bx">
                                        <div class="row placeani">
                                            <div class="col-12" style="text-align: center;">
                                                <h4>Authentication Completed!! </h4>
                                                Account Already Activated<br />
                                                Redirecting to home page in <span class="count">6</span> seconds
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="contact-bx">
                                        <div class="row placeani">
                                            <div class="col-12" style="text-align: center;">
                                                <h4>Authentication Completed!! </h4>
                                                Account Activated Successfully<br />
                                                Redirecting to home page in <span class="count">6</span> seconds
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php }else{ ?>
                                <div class="contact-bx">
                                    <div class="row placeani">
                                        <div class="col-12" style="text-align: center;">
                                            <h4>Authentication Error</h4>
                                            Authentication Parameters Does Not Exist!!
                                        </div>
                                        <div class="col-12" style="text-align: center;margin-top:30px;">
                                            <div class="form-group">
                                                <a href="sign-in" class="btn btn-primary btn-md btn-icon icon-left" style="color:white;"><i class="fa fa-arrow-left"></i> Back To Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php }else{ ?>
                            <div class="contact-bx">
                                <div class="row placeani">
                                    <div class="col-12" style="text-align: center;">
                                        Click on the confirmation email sent to your newcomers registered mail account to authenticate your account.
                                    </div>
                                    <div class="col-12" style="text-align: center;margin-top:30px;">
                                        <div class="form-group">
                                            <a href="sign-in" class="btn btn-primary btn-md btn-icon icon-left" style="color:white;"><i class="fa fa-arrow-left"></i> Back To Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<?php include $file_dir.'inc/scripts.layout.php'; ?>
</body>

</html>
<style>
    .form-group.center{
        text-align: center;
    }
    .btn:disabled{
        cursor: not-allowed;
    }
    form.contact-bx input.form-control:-internal-autofill-selected {
        background-color: transparent !important;
    }
    .form-group.center.confirm_auth a{
        margin-bottom: 2px;
        border-bottom: 1px solid var(--primary);
    }
    
</style>