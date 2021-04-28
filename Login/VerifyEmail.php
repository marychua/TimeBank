<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'TimeBank');
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM User WHERE Token='$token' AND AccountStatus='Level 1' LIMIT 1 ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {    
        if(count($_POST)>0) 
        {
            $user = mysqli_fetch_assoc($result);
            if($_POST['OTP']==$user['OTP'])
            {
                $query = "UPDATE User SET AccountStatus='Level 2',Credit=100 WHERE token='$token'";
                if (mysqli_query($conn, $query)) 
                {
                    $_SESSION['UID'] = $user['UID'];
                    $_SESSION['AccountStatus'] = 'Level 2';
                    $_SESSION['Username'] = $user['Username'];
                    $_SESSION['Credit'] = $user['Credit'];
                    $_SESSION['Email'] = $user['Email'];
                    $_SESSION['Verified'] = true;
                    $_SESSION['message'] = "Your email address has been verified successfully";
                    $_SESSION['type'] = 'alert-success';
                    header('location: ../Home.php');
                exit(0);
                }
            }
            else 
            {
                $error_message = "Wrong code";
            }          
        }  
    } 
    else 
    {
       $error_message = "User not found!";
    }
}
else 
{
   $error_message = "User not found!";
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
                        Please key in your verification code
                        </span>                   
                        <div class="wrap-input100 validate-input" data-validate="Please key in verification code">
                                <span class="btn-show-pass">
                                        <i class="zmdi zmdi-eye"></i>
                                </span>
                                <input class="input100" type="password" name="OTP">
                                <span class="focus-input100" data-placeholder="Verification Code"></span>
                        </div>
                                <div id="error-captcha" class="Captcha-error">
                                    <?php if(isset($error_message)) { echo $error_message; } ?>
                                </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit" name="Register" value="Register">
                                    Verify
                                </button>
                            </div>
                        </div>  
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

