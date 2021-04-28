<?php
session_start();

require_once '../DB/db.inc.php';
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));
if(count($_POST)>0) 

    {
    if($_POST["captcha_code"]==$_SESSION["captcha_code"])
        {
            $query='SELECT * FROM User WHERE Username="'.$_POST['Username'].'" AND Password="'.md5($_POST['Password']).'"';
            $result = mysqli_query($db, $query);

            $L_user = mysqli_fetch_assoc($result);
            $L_Username=$L_user['Username'];
            $L_Password=$L_user['Password'];
            $AccountStatus=$L_user['AccountStatus'];
            $Token=$L_user['Token'];
        if($L_Username==$_POST['Username'])
            {
                if($L_Password==md5($_POST['Password']))
                {
                    if($AccountStatus=="Level 2")
                    { 
                        setcookie("Username", $_POST['Username'], time() + (86400 * 30), "/");
                        setcookie("Password", $_POST['Password'], time() + (86400 * 30), "/");
                        $success_message = "You've Logged in Successfully";
                        $_SESSION['UID'] = $L_user['UID'];
                        $_SESSION['AccountStatus'] = $L_user['AccountStatus'];
                        $_SESSION['Username'] = $L_user['Username'];
                        $_SESSION['Email'] = $L_user['Email'];
                        $_SESSION['Credit'] = $L_user['Credit'];
                        $_SESSION['message'] = 'You are logged in!';
                        $_SESSION['type'] = 'alert-success';
                        header('Location: ../HomeLogin.php');
                    }
                    else 
                    {
                        header('Location: VerifyEmail.php?token='.$Token.'');
                    }
                        
                }
                else
                    {
                        $error_message = "Wrong Username or Password";
                    }
            }
        else 
            {
                $error_message = "Wrong Username or Password";
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
	<title>Login</title>
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
        <link rel="stylesheet" href="cookies/css/style.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form"method="post" action="" >
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>
                                        <?php if(!isset($_COOKIE["Username"])) 
                                        {?>
                                            <div class="wrap-input100 validate-input" data-validate = "Username">
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
                                        <?php
                                        } 
                                        else 
                                        {
                                        ?>
     					<div class="wrap-input100 validate-input" data-validate = "Username">
						<input class="input100" type="text" name="Username" value="<?php echo $_COOKIE["Username"]?>">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="Password" value="<?php echo $_COOKIE["Password"]?>">
						<span class="focus-input100" data-placeholder="Password" ></span>
					</div>
                                        <?php
                                        }
                                        ?>

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
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
                        <?php if(isset($success_message)) { ?>
                            <div class="Captcha-success">
                        <?php echo $success_message; ?></div>
                        <?php } ?>
					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="Register.php">                     
                                                    <strong>Sign Up</strong>
						</a>
					</div>
				</form>
			</div>
 
		</div>
	</div>
	    <div id="cookieConsent">
        <div id="closeCookieConsent">x</div>
        This Website is using cookies.<a href="#" target="_blank">More info</a>. <a class="cookieConsentOK">Continue</a>
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
          <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

          <script type="text/javascript">
  $(document).ready(function()
  {
      $('.menu-toggle').click(function()
      {
        $('.menu-toggle').toggleClass('active')
        $('nav').toggleClass('active')
      })
  })
  $(document).ready(function()
  {   
    setTimeout(function () 
    {
        $("#cookieConsent").fadeIn(200)
    }, 4000)
    $("#closeCookieConsent, .cookieConsentOK").click(function() 
    {
        $("#cookieConsent").fadeOut(200)
    })
    })
  </script>

</body>
</html>