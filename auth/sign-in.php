<?php 
    session_start();
    $file_dir = '../';
    include $file_dir.'inc/config.inc.php'; 
    require $file_dir.'inc/db.inc.php'; 
    require $file_dir.'inc/mail.inc.php';

    if (isset($_SESSION["loggedIn"]) == true || isset($_SESSION["loggedIn"]) === true) {
        $signedIn = true;
    } else {}
    $signedIn = false;
    $message = [];
    $auth_e = false;
    
    if (isset($_POST['sign-in'])) {

        $email = sanitizePlus($_POST["email"]);
        $password = sanitizePlus($_POST["password"]);
        $password = weirdlyEncode($password);

        if (isset($email) && isset($password)){
            #select all mails
            $CheckIfUserExist = "SELECT * FROM newcomers_users WHERE email = '$email' AND password = '$password' LIMIT 1";
            $UserExist = $con->query($CheckIfUserExist);
            if ($UserExist->num_rows > 0) {
                $auth_e = true;
                $row = $UserExist->fetch_assoc();
                $activated = $row['activated'];
                $email = $row['email'];

                if ($activated == 'false') {
                    header('Location: ?auth=false&e='.md5($email));
                    exit();
                } else {
                    $auth_error = true;
                    #login if authenticated
                    array_push($message, "<i class='fas fa-check'></i> Sign In Successfully!!");

                    #login
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["email"] = $email;
                }
            }else{
                #error, user don't exist
                array_push($message, "Error 402: Email And Password Combination Doesn't Exist!!");
            }
        }else{
            array_push($message, "Error 402: Missing Login Parameters!!");
        }

    }
?>

<!DOCTYPE html>
<html lang="en">


<head>

	<title>Sign In <?php echo $site; ?></title>
	<?php include $file_dir.'inc/tags.layout.php'; ?>
	<?php include $file_dir.'inc/style.layout.php'; ?>
	<link rel="stylesheet" href="assets/main.css">
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(../assets/images/background/bg2.jpg);">
			<a href="index.html"><img src="../assets/images/logo-white-2.png" alt=""></a>
		</div>
		<div class="account-form-inner">
            <?php if(isset($_GET["auth"]) && isset($_GET["e"]) && isset($_GET["auth"]) == false && isset($_GET["e"]) !== null){ ?>
            <div class="account-container">
				<div class="heading-bx left">
					<h2 style="margin-bottom: 0px !important;">Welcome Back!!</h2>
                    <p>Email Address Not Authenticated Yet!</p>
				</div>	
				<form class="contact-bx" method="post">
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Email Address:</label>
									<input name="email" type="email" required="" readonly value="<?php echo $email; ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12" style="margin-bottom: 10px;">
							<button name="resend-auth" type="submit" class="btn button-md" style="width:100%;">Resend Authentication Email</button>
						</div>
					</div>
				</form>
			</div>
            <?php }else{ ?>
			<div class="account-container">
                <div class="heading-bx left">
                    <?php include $file_dir.'inc/alert.inc.php'; ?>
					<h2 style="margin-bottom: 0px !important;">Welcome Back!!</h2>
                    <p>Please enter your account details:</p>
				</div>	
				<form class="contact-bx" method="post">
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Email Address:</label>
									<input name="email" type="email" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Password:</label>
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
						<div class="col-lg-12">
							<div class="form-group form-forget">
								<div class="custom-control custom-checkbox">
								</div>
								<a href="reset-password" class="ml-auto">Forgot Password?</a>
							</div>
						</div>
						<div class="col-lg-12" style="margin-bottom: 10px;">
							<button name="submit" type="submit" value="Submit" class="btn button-md" style="width:100%;">Login</button>
						</div>
						<div class="col-lg-12 text-center">
                            <h6>or</h6>
							<div class="d-flex">
								<a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
							</div>
						</div>
                        <hr>
                        <div class="col-lg-12 text-center" style="margin-top:20px;">
                            Don't have an account? <a href="sign-up" style="text-decoration: underline;">Sign up</a>
						</div>
					</div>
				</form>
			</div>
            <?php } ?>
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
</style>
<script>
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