<?php
session_start();
require '../DB/db.inc.php';
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));

if(count($_POST)>0) 
    {

    if($_POST["captcha_code"]==$_SESSION["captcha_code"])
        {
        if ($_POST['Password']!== $_POST['passwordConf'])
            {
                $error_message = 'The two passwords do not match';
            }
        else{
                $email = $_POST['Email'];
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                $emailrepeat = "SELECT * FROM user WHERE Email ='$email' LIMIT 1";
                $emailresult = mysqli_query($db, $emailrepeat);
                    if (mysqli_num_rows($emailresult) > 0) 
                    {
                        $error_message = "Email already exists";
                    }
                    else
                    {
                        $username = $_POST['Username'];
                        if(!filter_var($username, FILTER_VALIDATE_EMAIL))
                        {
                            $usernamerepeat = "SELECT * FROM user WHERE Username ='$username' LIMIT 1";
                            $usernameresult = mysqli_query($db, $usernamerepeat);
                            if (mysqli_num_rows($usernameresult) > 0) 
                                {
                                    $error_message = "Username already exists";
                                }
                            else
                            {
                                $UID = date("YmdHis")  ;
                                $STATUS = 'Level 1';
                                $password = md5($_POST['Password']);
                                $token = bin2hex(random_bytes(50));
                                $credit = 0;
                                $OTP = rand(100000,999999);
                                $success_message = "Your message received successfully";
                                mysqli_query($db, "INSERT INTO `user`(`UID`,`Email`, `Username`, `Password`, `Skill`,`AccountStatus`,`Token`,`Credit`,`OTP` ) VALUES ('$UID','" . $_POST['Email']. "', '" . $_POST['Username']. "','" . $_POST['Password']. "','" . $_POST['Skills']. "','$STATUS','$token','$credit','$OTP')");
                                require 'EmailVerification.php';
                                header('Location: ../home.php');
                            }
                        }
                        else
                        $error_message = "Invalid Username";
                    }
                }
                else 
                 $error_message = "Invalid Email";  
                
            }
        }
    else
        {
            $error_message = "Incorrect Captcha Code";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
            <title>Register</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
            <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
            <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
            <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
            <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
            <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
            <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
            <link rel="stylesheet" type="text/css" href="css/util.css">
            <link rel="stylesheet" type="text/css" href="css/LoginCSS.css">
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="post" action="" >
                        <span class="login100-form-title p-b-26">
                        Welcome
                        </span>
                        <span class="login100-form-title p-b-48">
                            <i class="zmdi zmdi-font"></i>
                        </span>
                        <div class="wrap-input100 validate-input" data-validate = "Email">
                                <input class="input100" type="text" name="Email">
                                <span class="focus-input100" data-placeholder="Email"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Username">
                                <input class="input100" type="text" name="Username">
                                <span class="focus-input100" data-placeholder="Username"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password">
                                <span class="btn-show-pass">
                                        <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" name="Password">
                                <span class="focus-input100" data-placeholder="Password"></span>
                        </div>
                         <div class="wrap-input100 validate-input" data-validate="Confirm Password">
                                <span class="btn-show-pass">
                                        <i class="zmdi zmdi-eye"></i>
                                </span>
                                 <input class="input100" type="password" name="passwordConf">
                                <span class="focus-input100" data-placeholder="Confirm Password"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Skills">
                                <input class="input100" type="text" name="Skills">
                                <span class="focus-input100" data-placeholder="Skills"></span>
                        </div>
                        <table>
                            <tr>
                                <div id="error-captcha" class="Captcha-error">
                                    <?php if(isset($error_message)) { echo $error_message; } ?>
                                </div>
                                <br/>
                                <td>Captcha Code: 
                                    <br/>
                                    <img src="Captcha.php"> <input name="captcha_code" type="text" class=" Captcha-input">
                                </td>
                            </tr>
                        </table>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit" name="Register" value="Register">
                                    Register
                                </button>
                            </div>
                        </div> 
                        <div class="text-center p-t-115">
                            <span class="txt1">
				Already have an account?
                            </span>
                            <a class="txt2" href="Login.php">                     
                                <strong>Sign In</strong>
                            </a>
			</div>
                        <?php if(isset($success_message)) { ?>
                            <div class="Captcha-success"><?php echo $success_message; ?></div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <div id="dropDownSelect1"></div>	
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>