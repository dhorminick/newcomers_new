<?php 
    session_start();
    $file_dir = '../';
    require $file_dir.'inc/db.inc.php';
    require $file_dir.'inc/config.inc.php'; 
    require $file_dir.'inc/mail.inc.php'; 

    $signedIn = false;
    if (isset($_SESSION["loggedIn"]) == true || isset($_SESSION["loggedIn"]) === true) {
        $signedIn = true;
    } else {}
    $message = [];

    if (isset($_POST['submit'])) {

        $email = sanitizePlus($_POST["email"]);
        $password = sanitizePlus($_POST["password"]);
        $c_password = sanitizePlus($_POST["password"]);
        $f_name = sanitizePlus($_POST["name"]);
        $datetime = date("Y-m-d H:i:s");

        if (isset($email) && isset($password) && isset($f_name)) {
            # confirm password
            if ($password === $c_password) {
                #select all mails
                $CheckIfUserExist = "SELECT * FROM newcomers_users WHERE email = '$email' LIMIT 1";
                $UserExist = $con->query($CheckIfUserExist);
                if ($UserExist->num_rows > 0) {
                    #error, user already exists
                    array_push($message, "Error 402: Email Already Exists!!");
                }else{
                    #send registration email
                    $otp = secure_random_string(10).'-'.secure_random_string(10).'-'.secure_random_string(10);
                    $confirmation_link = 'https://newcomersunion.com/auth/activate-account?e='.weirdlyEncode($email).'&auth='.$otp;
                    $subject = 'New Comers Union - Activate Account Email Address (OTP)';
                    $recipient = $email;
                    $sender = $regMailSender;
                    $reg_date = date("Y-m-d");
                    #$mailBody = 'Your One-Time Confirmation Link is:' . $confirmation_link;

                    $_sentmail = _reg($sender, $recipient, $subject, $confirmation_link);
                    if ($_sentmail['sent'] == 'true') {
                        #encrypt password
                        $password = weirdlyEncode($password);
                        #add user to db
                        $createNewUser = "INSERT INTO newcomers_users (`email`, `password`, `firstname`, `phone`, `activated`, `otp`, `token`, `reg_date`) VALUES ('$email', '$password', '$f_name', '$phone', 'false', '$confirmation_link', '$otp')";
                        $userCreated = $con->query($createNewUser);
                        if ($userCreated) {
                            #done
                            #redirect to activate-account.php
                            
                        }else{
                           #error, error inserting to db
                           array_push($message, "Error 502: Error!!"); 
                        }
                    }else{
                        #error, otp unsuccessful
                        array_push($message, "Error 502: Error Sending OTP - ".$_sentmail['error']);
                    }
                }
            } else {
                #error, password doesnt matvh
            }     
        } else {
            # error ,missing params
            array_push($message, "Error 402: Missing Registration Parameters!!");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Sign Up <?php echo $site; ?></title>
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
                <div class="heading-bx left">
                    <?php include $file_dir.'inc/alert.inc.php'; ?>
					<h2 style="margin-bottom: 0px !important;">Create Account!!</h2>
                    <p>Please enter your details to create your account:</p>
				</div>	
				<form class="contact-bx" method="post">
					<div class="row placeani">
                        <div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label for="name">Full Name:</label>
									<input name="name" type="text" required="" id="name" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label for="email">Email Address:</label>
									<input name="email" type="email" required="" id='email' class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label for="pass">Password:</label>
                                    <div class="input-group" style="display:flex;flex-direction: row; flex-wrap: nowrap;">
                                        <input type="password" class="form-control" name="password" id="pass" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text fyeviu" style="cursor:pointer;">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
                        <div class="form-group center confirm_auth">
                            <br>
                            <input type="checkbox" id="confirm_auth">
                            By confirming, you agree to our <a href="http://">Candidate Guidelines</a>, <a href="http://">Terms of Use</a> and <a href="http://">Privacy Policy</a>
                        </div>
						<div class="col-lg-12" style="margin-bottom: 10px;">
							<button name="submit" type="submit" disabled id="btn_auth" class="btn button-md" style="width:100%;">Create Account</button>
						</div>
						<div class="col-lg-12 text-center">
                            <h6>or</h6>
							<div class="d-flex">
								<a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
							</div>
						</div>
                        <hr>
                        <div class="col-lg-12 text-center" style="margin-top:20px;">
                            ALready have an account? <a href="sign-in" style="text-decoration: underline;">Sign In</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<?php include $file_dir.'inc/scripts.layout.php'; ?>
</body>

</html>
<style>
    .btn.button-md{
        color: white !important;
    }
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
<script>
    $("#confirm_auth").click(function (e) {
        // alert('test');
        var _value = $(this).prop('checked');
        if (_value == true) {
            $("#btn_auth").prop("disabled", false);
        } else {
            $("#btn_auth").prop("disabled", true);
        }
    });
    $(".fyeviu").on("click", function () {
    var x = document.getElementById("pass");
    if (x.type === "password") {
        $(".fyeviu i").attr("class", "fa fa-eye-slash");
        x.type = "text";
    } else {
        $(".fyeviu i").attr("class", "fa fa-eye");
        x.type = "password";
    }
    });
</script>