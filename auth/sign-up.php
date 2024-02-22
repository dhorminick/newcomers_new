<?php 
    session_start();
    $file_dir = '../';
    require $file_dir.'inc/db.inc.php';
    require $file_dir.'inc/config.inc.php'; 
    require $file_dir.'inc/mail.inc.php'; 

    if (isset($_SESSION["loggedIn"]) == true || isset($_SESSION["loggedIn"]) === true) {
        $signedIn = true;
    } else {}
    $signedIn = false;
    $message = [];

    if (isset($_POST['create-account'])) {

        $email = sanitizePlus($_POST["email"]);
        $password = sanitizePlus($_POST["password"]);
        $c_password = sanitizePlus($_POST["c_password"]);
        $f_name = sanitizePlus($_POST["firstname"]);
        $l_name = sanitizePlus($_POST["lastname"]);
        $datetime = date("Y-m-d H:i:s");

        if (isset($email) && isset($password) && isset($c_password) && isset($f_name) && isset($l_name)) {
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
                        $createNewUser = "INSERT INTO newcomers_users (`email`, `password`, `firstname`, `lastname`, `phone`, `activated`, `otp`, `token`, `reg_date`) VALUES ('$email', '$password', '$f_name', '$f_name', '$phone', 'false', '$confirmation_link', '$otp')";
                        $userCreated = $con->query($createNewUser);
                        if ($userCreated) {
                            #done
                            #redirect to activate-account.php
                            
                        }else{
                           #error, error inserting to db 
                        }
                    }else{
                        #error, otp unsuccessful
                        array_push($message, "Error 502: Error Sending OTP!! ".$_sentmail['error']);
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account <?php echo $site; ?></title>

    <?php include $file_dir.'inc/style.layout.php'; ?>
</head>
 <body id="bg">
  <div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/background/bg2.jpg);">
			<a href="index.html"><img src="assets/images/logo-white-2.png" alt=""></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Sign Up <span>Now</span></h2>
					<p>Login Your Account <a href="login.html">Click here</a></p>
				</div>	
				<form class="contact-bx">
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Name</label>
									<input name="dzName" type="text" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Your Email Address</label>
									<input name="dzName" type="email" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Your Password</label>
									<input name="dzEmail" type="password" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Sign Up</button>
						</div>
						<div class="col-lg-12">
							<h6>Sign Up with Social media</h6>
							<div class="d-flex">
								<a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
								<a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
   
    
    <?php include $file_dir.'inc/auth_footer.layout.php'; ?>
    <?php include $file_dir.'inc/scripts.layout.php'; ?>
</body>
</html>

<style>
    .row_card{
        margin-top: 30px;
    }
    .form-group.center{
        text-align: center;
    }
    .btn:disabled{
        cursor: not-allowed;
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
    $(".fyeviui").on("click", function () {
    var x = document.getElementById("c_pass");
    if (x.type === "password") {
        $(".fyeviui i").attr("class", "fa fa-eye-slash");
        x.type = "text";
    } else {
        $(".fyeviui i").attr("class", "fa fa-eye");
        x.type = "password";
    }
    });
</script>


