<?php 
session_start();
if (empty($_SESSION['UID'])) {
    header('location: Login/Login.php');
}
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
  <link rel="shortcut icon" href="assets2/images/timebank-white-120x114.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>JobSearchLogin</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/datatables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets2/socicon/css/styles.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="preload" as="style" href="assets2/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-rHffwozBM9" once="menu" id="menu1-21">

    

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

<section class="section-table cid-rIu85kBWzM" id="table1-23">
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
  
  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
          Available Job</h2>
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
                <th class="head-item mbr-fonts-style display-7">Job Title</th>
                <th class="head-item mbr-fonts-style display-7">Job Skill</th>
                <th class="head-item mbr-fonts-style display-7">Description</th>                
                <th class="head-item mbr-fonts-style display-7">DATE</th>
                <th class="head-item mbr-fonts-style display-7">Time</th>
                <th class="head-item mbr-fonts-style display-7">Location</th>
                <th class="head-item mbr-fonts-style display-7">Credit Hour</th>
                 <?php 
                    if (isset($_SESSION['AccountStatus'])):
                        if ($_SESSION['AccountStatus']=='Level 2'): ?>
                <th class="head-item mbr-fonts-style display-7">Action</th>
                        <?php endif;?>
                    <?php endif;?>
                
              </tr>
            </thead>
            <tbody>
<?php   
    $queryselect='SELECT * FROM `jobpost` INNER JOIN job on jobpost.JPID = job.JPID WHERE jobpost.UID != "'.$_SESSION['UID'].'" AND job.JobStatus = "open"';
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
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobDate']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobTime']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobLocation']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobDuration']?></td>
                 <?php 
                    if (isset($_SESSION['AccountStatus'])):
                        if ($_SESSION['AccountStatus']=='Level 2'): ?>
                    <td class="body-item mbr-fonts-style display-7"><?php echo "<a href='AcceptJob.php?id=".$row['JID']."'><button class='mbr-text mbr-fonts-style m-0 b-descr display-7 align-right, btn btn-sm btn-primary display-7'>Accept</button></a>"?></td>
                        <?php endif;?>
                    <?php endif;?>                
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
<section class="section-table cid-rIu85kBWzM" id="table1-23">
  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
          Accepted Job</h2>
      <h3 class="mbr-section-subtitle mbr-fonts-style align-center pb-5 mbr-light display-5">Jobs That you have accepted</h3>
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
                <th class="head-item mbr-fonts-style display-7">Job Title</th>
                <th class="head-item mbr-fonts-style display-7">Job Skill</th>      
                <th class="head-item mbr-fonts-style display-7">DATE</th>
                <th class="head-item mbr-fonts-style display-7">Time</th>
                <th class="head-item mbr-fonts-style display-7">Credit Hour</th>
                <th class="head-item mbr-fonts-style display-7">Job Status</th>
                <th class="head-item mbr-fonts-style display-7">Action</th>
              </tr>
            </thead>
            <tbody>
<?php   

    $queryselect='SELECT * FROM `jobpost` INNER JOIN job on jobpost.JPID = job.JPID INNER JOIN jobaccept on jobaccept.JAID = job.JAID WHERE jobaccept.UID = "'.$_SESSION['UID'].'" AND (job.JobStatus = "Accepted" or job.JobStatus = "Verifying" or job.JobStatus = "Completed")' ;
if($resultlist = mysqli_query($db, $queryselect))
        {
        if(mysqli_num_rows($resultlist) > 0)
            {
            while($row = mysqli_fetch_array($resultlist))
                { ?>                
              <tr> 
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobName']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobType']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobDate']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobTime']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobDuration']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobStatus']?></td>                
                
                                        <?php 
                                        if (isset($_SESSION['AccountStatus'])):
                                        {
                                            if ($row['JobStatus']=='Accepted'):
                                            {?>
                                              <td class="body-item mbr-fonts-style display-7"><?php echo "<a href='CompleteJob.php?id=".$row['JID']."'><button class='mbr-text mbr-fonts-style m-0 b-descr display-7, btn btn-sm btn-primary display-7'>Complete</button></a>"?></td>                              
                                            <?php
                                            }
                                            elseif($row['JobStatus']=='Verifying'):
                                            {?>
                                                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobStatus']?></td>                                                                
                                            <?php
                                            }
                                            else:
                                            {
                                                ?>
                                                <td ></td>                                                                
                                            <?php
                                            
                                            }                                              
                                            endif;
                                        }
                                        endif;?>                     
                   
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

<section class="step2 cid-rIu85SsWKN" id="step2-24">

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

<section once="footers" class="cid-rHfhD2tVnm" id="footer7-22">

    

    

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
  <script src="assets2/tether/tether.min.js"></script>
  <script src="assets2/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets2/datatables/jquery.data-tables.min.js"></script>
  <script src="assets2/datatables/data-tables.bootstrap4.min.js"></script>
  <script src="assets2/dropdown/js/nav-dropdown.js"></script>
  <script src="assets2/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets2/theme/js/script.js"></script>
  
  
</body>
</html>