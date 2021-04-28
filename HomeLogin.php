<?php 
session_start();
if (empty($_SESSION['UID'])) {
    header('location: Login/Login.php');
}
require 'DB/db.inc.php';

$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));
        if(count($_POST)>0) 
        {
            $email = $_POST['email'];
            $username = $_SESSION['Username'];
            require 'EmailVerification.php';
            header('Location: homelogin.php');
        }
?>
<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.11.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets2/images/timebank-white-120x114.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>Home</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/socicon/css/styles.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="preload" as="style" href="assets2/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>

  <section class="menu cid-rHffwozBM9" once="menu" id="menu1-0">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#top">
                         <img src="assets2/images/timebank-white-120x114.png" alt="Mobirise" title="" style="height: 4.5rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="HomeLogin.php">
                        TIME BANK</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-success display-7" href="HomeLogin.php#header16-2">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home</a></li>
                <li class="nav-item"><a class="nav-link link text-success display-7" href="JobSearchLogin.php" aria-expanded="false"><span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>Job Search</a></li><li class="nav-item"><a class="nav-link link text-success display-7" href="JobPosting.php" aria-expanded="false"><span class="mbrib-briefcase mbr-iconfont mbr-iconfont-btn"></span>Your Job</a></li><li class="nav-item"><a class="nav-link link text-success display-7" href="ContactUsLogin.php" aria-expanded="false"><span class="mbri-pin mbr-iconfont mbr-iconfont-btn"></span>
                        
                        Contact Us</a></li><li class="nav-item dropdown"><a class="nav-link link dropdown-toggle text-success display-7" href="page1.html" aria-expanded="false" data-toggle="dropdown-submenu"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        
                        My Profile</a><div class="dropdown-menu"><a class="text-success dropdown-item display-7" href="UpdateProfile.php#header16-c" aria-expanded="false">Update</a><a class="text-success dropdown-item display-7" href="Account.php#header16-11" aria-expanded="false">Bank Account</a><a class="text-success dropdown-item display-7" href="Report.php#header16-q" aria-expanded="false">Report</a></div></li><li class="nav-item"><a class="nav-link link text-success display-7" href="https://mobirise.com">
                        </a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="Login/Logout.php">LOGOUT</a></div>
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobirise.info/w">free html5 templates</a></section><section class="header1 cid-rHfhFZDi4O" id="header16-2">
    <?php
    if (isset($_SESSION['UID'])) 
        {
            echo 'Welcome,'; echo $_SESSION['Username'];
        }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 home-wrapper">
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert <?php echo $_SESSION['type'] ?>">
                        <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            unset($_SESSION['type']);
                        ?>
                    </div>
                <?php endif;?>
                <?php 
                    if (isset($_SESSION['AccountStatus'])):
                        if ($_SESSION['AccountStatus']=='Level 1'): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                You need to verify your email address!
                                Sign into your email account and click
                                on the verification link we just emailed you
                                at
                                <strong>
                                <?php echo $_SESSION['Email']; ?></strong>
                            </div>
                        <?php endif;?>
                    <?php endif;?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10 align-center">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    HOME</h1>   
            </div>
        </div>
    </div>

</section>

<section class="services5 cid-rHfq9nNVr3" id="services5-8">
    <div class="container">
        <div class="row">
            <!--Titles-->
            <div class="title pb-5 col-12">
                <h2 class="align-left mbr-fonts-style m-0 display-2">UPDATES</h2>
            </div>
<?php   
    $queryselect='SELECT * FROM `jobpost` ' ;
if($resultlist = mysqli_query($db, $queryselect))
        {
        if(mysqli_num_rows($resultlist) > 0)
            {
            while($row = mysqli_fetch_array($resultlist))
                { ?>            
            <div class="card px-3 col-12">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="top-line pb-3">
                            <h4 class="card-title mbr-fonts-style display-5"><?php echo $row['JobName']?></h4>
                            <p class="mbr-text cost mbr-fonts-style m-0 display-5"><?php echo $row['JobDate']?></p>
                        </div>
                        <div class="bottom-line">
                            <p class="mbr-text mbr-fonts-style m-0 b-descr display-7"><?php echo "Location: " .$row['JobLocation'] ?></p>
                            <p class="mbr-text mbr-fonts-style m-0 b-descr display-7"><?php echo $row['JobDescription']?></p>
                        </div>
                    </div>
                </div>
            </div>
           <?php }
            }
        }?>
        </div>
    </div>
</section>

<section class="mbr-section form3 cid-rHfm2raSxA" id="form3-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="align-center pb-2 mbr-fonts-style display-2">
                    INVITE</h2>
                <h3 class="mbr-section-subtitle align-center pb-5 mbr-light mbr-fonts-style display-5">Invite a friend to join Timebank. Enter their email address here.</h3>
            </div>
        </div>

        <div class="row py-2 justify-content-center">
            <div class="col-12 col-lg-6  col-md-8 " data-form-type="formoid">
                <!---Formbuilder Form--->
                <form action="" method="POST" class="mbr-form form-with-styler" data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true" value="oY38P3zvQeVnAIB1XOTxzl9wekV36qeWuAzXoIY1utwBtrTr3NLM9T0xroWl+qgsbsVB+3XYtI7+n8piWGTGlACmJuS+tFxsYQN6nzqGUOFTdKGG72cIpbc0QBdD454v">
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="form-group col" data-for="email">
                            <input type="email" name="email" placeholder="Email" data-form-field="Email" required="required" class="form-control display-7" id="email-form3-6">
                        </div>
                        <div class="col-auto input-group-btn"><button type="submit" class="btn btn-primary display-4">SEND</button></div>
                    </div>
                </form><!---Formbuilder Form--->
            </div>
        </div>
    </div>
</section>

<section once="footers" class="cid-rHfhD2tVnm" id="footer7-1">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    
                    
                    
                    
                    
                <li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">About us</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Services</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Get In Touch</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Careers</a>
                    </li><li class="foot-menu-item mbr-fonts-style display-7">
                        <a class="text-white mbr-bold" href="#" target="_blank">Work</a>
                    </li></ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                    
                    
                    
                    
                    
                    
                <div class="soc-item">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/c/mobirise" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://instagram.com/mobirise" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.behance.net/Mobirise" target="_blank">
                            <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2019 Time Bank SEGi BIC - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>


  <script src="assets2/web/assets/jquery/jquery.min.js"></script>
  <script src="assets2/popper/popper.min.js"></script>
  <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets2/smoothscroll/smooth-scroll.js"></script>
  <script src="assets2/dropdown/js/nav-dropdown.js"></script>
  <script src="assets2/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets2/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets2/tether/tether.min.js"></script>
  <script src="assets2/theme/js/script.js"></script>
  <script src="assets2/formoid/formoid.min.js"></script>
  
  
</body>
</html>