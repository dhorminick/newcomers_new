<?php 
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
    
    if (isset($_POST['create-account'])) {

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
                    $auth_error = false;
                    #array_push($message, "Error 402: Account Authentication Complete!!");
                } else {
                    $auth_error = true;
                    #login if authenticated
                    array_push($message, "<i class='fas fa-check'></i> Authentication Completed Successfully!!");

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account <?php echo $site; ?></title>

    <?php include $file_dir.'inc/header.layout.php'; ?>
</head>
<body>
    <header class="header_four">
    <?php include $file_dir.'inc/nav.layout.php'; ?>
    </header>

    <section class="card">
        <div class="row card-body">
            <div class="col-12 col-lg-4"></div>
            <?php if ($auth_e == false){ ?>
            <div class="col-12 col-lg-8">
                <?php require $file_dir.'inc/alert.inc.php'; ?>
                <div class="card-header">
                    <h4>Login</h4>
                    <p>Welcome back! please Enter your details:</p>
                </div>
                <form method="post">
                <div class="form-group row_card">
                    <label for="mail">Email Address:</label>
                    <input type="mail" name="email" id="mail" class="form-control" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <a href="#" class="fgpw">Forgot Password</a>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="..." name="password" id="pass" required>
                        <div class="input-group-append">
                            <div class="input-group-text fyeviu" style="cursor:pointer;">
                                <i class="fa fa-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group center conf_btn">
                    <button type="submit" name="create-account" class="btn btn-lg btn-primary btn-icon icon-left">Login</button>
                </div>
                </form>
                <div class="form-group center">
                    Don't have an account? <a href="sign-in.php">Sign up</a>
                </div>
            </div>
            <?php }else{ ?>
            <?php if ($auth_error == false){ ?>
            <div class="col-12 col-lg-8 flex-center">
            <?php require $file_dir.'inc/alert.inc.php'; ?>
            <div class="txt">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <p>Account Authentication Error!!</p>
                <form method="post" action="activate-account">
                    <input type="hidden" name="e" value="<?php weirdlyEncode($email); ?>" required>
                    <button class="btn btn-md btn-primary btn-icon icon-left" name="resend-email"><i class="fas fa-check"></i> Resend Email Token</button>
                </form>
            </div>
            </div>
            <?php }else{ ?>
            <div class="col-12 col-lg-8 flex-center">
            <?php require $file_dir.'inc/alert.inc.php'; ?>
            <div class="txt">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <p>Login Successful!!</p>
                <a href="/"><button class="btn btn-md btn-primary btn-icon icon-left"><i class="fas fa-arrow-left"></i> Home</button></a>
            </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </section>
    
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
    .form-group.center.conf_btn{
        margin-top: 20px;
    }
    .card-header{
        text-align: center;
    }

    .form-group input{
        padding: 20px;
    }

    .fgpw{
        float: right;
    }
    .flex-center{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .flex-center div.txt{
        text-align: center;
        padding: 20px;
        width: 80%;
    }
    .flex-center div.txt .card-header{
        margin-bottom: 20px;
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