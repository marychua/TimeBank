<?php 
require 'DB/db.inc.php';
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.11.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/timebank-white-120x114.png" type="image/x-icon">
  <meta name="description" content="Web Page Builder Description">
  
  <title>Job Search</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-rHfnNAUYnF" once="menu" id="menu1-36">

    

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
                         <img src="assets/images/timebank-white-120x114.png" alt="Mobirise" title="" style="height: 4.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="Home.php#slider1-8">
                        TIME BANK</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-success display-7" href="Home.php#slider1-8">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home</a></li><li class="nav-item">
                    <a class="nav-link link text-success display-7" href="Home.php#features11-1g"><span class="mbri-users mbr-iconfont mbr-iconfont-btn"></span>
                        
                        About Us&nbsp;</a>
                </li><li class="nav-item"><a class="nav-link link text-success display-7" href="Home.php#features18-t"><span class="mbri-briefcase mbr-iconfont mbr-iconfont-btn"></span>Our Services
                    </a></li>
                <li class="nav-item"><a class="nav-link link text-success display-7" href="JobSearch.php#header16-2j" aria-expanded="true"><span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>Search</a></li><li class="nav-item"><a class="nav-link link text-success display-7" href="ContactUs.php" aria-expanded="false"><span class="mbri-pin mbr-iconfont mbr-iconfont-btn"></span>
                        
                        Contact Us</a></li><li class="nav-item"><a class="nav-link link text-success display-7" href="https://mobirise.com">
                        </a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-success display-7" href="Login/Register.php">REGISTER</a> <a class="btn btn-sm btn-primary display-7" href="Login/Login.php">LOGIN</a></div>
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobirise.info/c">free web builder</a></section><section class="header1 cid-rHf5lJJfkF" id="header16-2j">

    

    

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10 align-center">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">Find a Volunteer</h1>
                
                
                
            </div>
        </div>
    </div>

</section>

<section class="section-table cid-rIttsJgTm9" id="table1-3b">

  
  
  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
          Active Job</h2>
      <h3 class="mbr-section-subtitle mbr-fonts-style align-center pb-5 mbr-light display-5">If you’re looking for a volunteering opportunity, search Do-it's national volunteering database below.</h3>
      <div class="table-wrapper">
        <div class="container">
          <div class="row search">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="dataTables_filter">
                  <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                  <input class="form-control input-sm" disabled="">
                </div>
            </div>
          </div>
        </div>

        <div class="container scroll">
          <table class="table isSearch" cellspacing="0">
            <thead>
              <tr class="table-heads "> 
              <th class="head-item mbr-fonts-style display-7">Job Name</th>
              <th class="head-item mbr-fonts-style display-7">Job Skill</th>
              <th class="head-item mbr-fonts-style display-7">Job Description</th>
              </tr>
            </thead>
            <tbody>
<?php   
    $queryselect='SELECT * FROM `jobpost` INNER JOIN job on jobpost.JPID = job.JPID WHERE job.JobStatus = "open"' ;
if($resultlist = mysqli_query($db, $queryselect))
        {
        if(mysqli_num_rows($resultlist) > 0)
            {
            while($row = mysqli_fetch_array($resultlist))
                { ?>                
              <tr> 
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobName']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobType']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobDescription']?></td>             
              </tr>   
          <?php 
                }
            mysqli_free_result($resultlist);
            }
        else
            {
                echo "No records were found.";
            }
        } ?>                            
            </tbody>
          </table>
        </div>
        <div class="container table-info-container">
          <div class="row info">
            <div class="col-md-6">
              <div class="dataTables_info mbr-fonts-style display-7">
                <span class="infoBefore">Showing</span>
                <span class="inactive infoRows"></span>
                <span class="infoAfter">entries</span>
                <span class="infoFilteredBefore">(filtered from</span>
                <span class="inactive infoRows"></span>
                <span class="infoFilteredAfter"> total entries)</span>
              </div>
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="step2 cid-rHeURMWzyR" id="step2-25">

    

    
    
    <div class="container">
        <h2 class="mbr-section-title pb-3 mbr-fonts-style align-center display-2">HOW TO GET STARTED?</h2>
        
        <div class="step-container row justify-content-center">
            <div class="card col-12 col-md-4 separline">
                <div class="step-element">
                    <div class="step-wrapper pb-3">
                        <h3 class="step d-flex align-items-center justify-content-center m-auto">
                            1
                        </h3>
                    </div>          
                    <div class="step-text-content align-center">
                        <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">REGISTER</h4>
                        <p class="mbr-step-text mbr-fonts-style display-7">&nbsp; Sign up for an account to request and search for a job.&nbsp;</p><p></p><p></p>
                    </div>
                </div>
            </div>

            <div class="card col-12 separline col-md-4">
                <div class="step-element">
                    <div class="step-wrapper pb-3">
                        <h3 class="step d-flex align-items-center justify-content-center m-auto">
                            2
                        </h3>
                    </div>          
                    <div class="step-text-content align-center">
                        <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">SEARCH</h4>
                        <p class="mbr-step-text mbr-fonts-style display-7">
                            Search by skills, user profiles,&nbsp;advertisments to find what you are looking.</p>
                    </div>
                </div>
            </div>

            <div class="card col-md-4 col-12 separline last-child">
                <div class="step-element">
                    <div class="step-wrapper pb-3">
                        <h3 class="step d-flex align-items-center justify-content-center m-auto">
                            3
                        </h3>
                    </div>          
                    <div class="step-text-content align-center">
                        <h4 class="mbr-step-title pb-3 mbr-fonts-style display-5">CONTRIBUTE</h4>
                        <p class="mbr-step-text mbr-fonts-style display-7">You can either do work or do job requests if you are a member.</p>
                    </div>
                </div>
            </div>

            
            
            
            
            
            
            
            
            
            
            
        </div>
    </div>
</section>

<section once="footers" class="cid-rHeUGdzX7a" id="footer7-22">

    

    

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
                        <a href="https://twitter.com" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://instagram.com" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://plus.google.com" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-googleplus socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.behance.net" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-behance socicon"></span>
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


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/datatables/jquery.data-tables.min.js"></script>
  <script src="assets/datatables/data-tables.bootstrap4.min.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>