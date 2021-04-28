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
        $JPID = date("YmdHis")  ;
        $JID = date("YmdHis")  ;
        $JobStatus =  'Open';
        $JobOpenDate = date("Y:m:d")  ;
        $JobTitle =  $_POST['JobTitle'];
        $JobType =  $_POST['JobType'];
        $JobDescription =  $_POST['JobDescriptionText'];
        $JobDate =  $_POST['PostDate'];
        $JobTime =  $_POST['PostTime'];
        $JobDuration =  $_POST['JobDuration'];
        $JobLocation=  $_POST['Location'];
        $UID = $_SESSION['UID'];
        $add_to_jobpost = "INSERT INTO `jobpost`(`JPID`, `JobName`, `JobDescription`, `JobDate`, `JobTime`, `UID`, `JobDuration`, `JobType`,`Joblocation`) VALUES ('JPID$JPID','$JobTitle','$JobDescription','$JobDate','$JobTime','$UID','$JobDuration','$JobType','$JobLocation')";
        mysqli_query($db,$add_to_jobpost);
        $add_to_job ="INSERT INTO `job`(`JID`, `JobStatus`, `JobOpenDate`, `JPID`) VALUES ('JID$JID','$JobStatus','$JobOpenDate','JPID$JPID')";
        mysqli_query($db,$add_to_job);
//        if(isset ($_FILES['files']))
//        {
            require 'JobImage.php';
//        }


    //    require 'Jobpostingmail.php';
    }
else 
    echo 'error posting'; 
?>
<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.11.4, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets2/images/timebank-white-120x114.png" type="image/x-icon">
  <meta name="description" content="Website Maker Description">
  
  <title>Advertisements</title>
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets2/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets2/datatables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets2/tether/tether.min.css">
  <link rel="stylesheet" href="assets2/socicon/css/styles.css">
  <link rel="stylesheet" href="assets2/dropdown/css/style.css">
  <link rel="stylesheet" href="assets2/theme/css/style.css">
  <link rel="preload" as="style" href="assets2/mobirise/css/mbr-additional.css">
  <link rel="stylesheet" href="assets2/mobirise/css/mbr-additional.css" type="text/css">
  
</head>
<body>
  <section class="menu cid-rHffwozBM9" once="menu" id="menu1-d">

    

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
                        
                        Contact Us</a></li><li class="nav-item dropdown open"><a class="nav-link link dropdown-toggle text-success display-7" href="page1.html" aria-expanded="true" data-toggle="dropdown-submenu"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        
                        My Profile</a><div class="dropdown-menu"><a class="text-success dropdown-item display-7" href="UpdateProfile.php#header16-c" aria-expanded="false">Update</a><a class="text-success dropdown-item display-7" href="Account.php#header16-11" aria-expanded="false">Bank Account</a><a class="text-success dropdown-item display-7" href="Report.php#header16-q" aria-expanded="false">Report</a></div></li><li class="nav-item"><a class="nav-link link text-success display-7" href="https://mobirise.com">
                        </a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="Login/Logout.php">LOGOUT</a></div>
        </div>
    </nav>
</section>

<section class="header1 cid-rHfrVVQIzA" id="header16-g">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 home-wrapper">
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
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">MY ADVERTISMENTS</h1>
                
                
                
            </div>
        </div>
    </div>

</section>

<section class="services5 cid-rHft9xvA0t" id="services5-i">
    <!---->
    
    <!---->
    <!--Overlay-->
    
    <!--Container-->
    <div class="container">
        <div class="row">
            <!--Titles-->
            <div class="title pb-5 col-12">
                <h2 class="align-left mbr-fonts-style m-0 display-2">LATEST</h2>
                
            </div>
            <!--Card-1-->
<?php   
    $queryselect='SELECT * FROM `jobpost` INNER JOIN job on jobpost.JPID = job.JPID WHERE jobpost.UID = "'.$_SESSION['UID'].'" AND (job.JobStatus = "open" or job.JobStatus = "Verifying" or job.JobStatus = "Accepted")' ;
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
                                    <h4 class="card-title mbr-fonts-style display-5">
                                         <?php echo $row['JobName']?></h4>
                                    <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                        <?php echo $row['JobOpenDate']?></p>
                                </div>
                                <div class="bottom-line">
                                    <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                        <?php echo $row['JobDuration']. " Credit Hour"?>
                                    </p>
                                    <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                        <?php echo "Date: " .$row['JobDate']." Time: ".$row['JobTime'] ?>
                                    </p>                            
                                    <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                        <?php echo "Status: " .$row['JobStatus'] ?>
                                    </p>
                                    <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                        <?php echo "Skill Needed: " .$row['JobType']?>
                                    </p>
                                    <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                        Description:
                                    </p>
                                    <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                        <?php echo $row['JobDescription']?>
                                    </p>      
                                        <?php 
                                        if (isset($_SESSION['AccountStatus'])):
                                        {
                                            if ($row['JobStatus']=='Open'):
                                            {
                                                echo "<a href='delete.php?id=".$row['JPID']."'><button class='mbr-text mbr-fonts-style m-0 b-descr display-7 align-right, btn btn-sm btn-primary display-7'> Delete</button></a>";                               
                                            }
                                            elseif($row['JobStatus']=='Verifying'):
                                            {
                                                echo "<a href='VerifyJob.php?id=".$row['JID']."&c=".$row['JobDuration']."'><button class='mbr-text mbr-fonts-style m-0 b-descr display-7 align-right, btn btn-sm btn-primary display-7'> Verify</button></a>";                                                                  
                                            }
                                            else:
                                            endif;
                                        }
                                        endif;?> 
                                </div>
                            </div>
                        </div>
                    </div>
          <?php 
                }
            mysqli_free_result($resultlist);
        }
        else
            {
                echo "No records were found.";
            }
        } ?>
        </div>
    </div>         
</section>

<section class="mbr-section form1 cid-rHfs6W77xr" id="form1-h">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    NEW ADVERTISEMENT</h2>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                <!---Formbuilder Form--->
                <form action="" method="POST" enctype="multipart/form-data" class="mbr-form form-with-styler">
                    <div class="row">
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                                       <div class="dragArea row">
                        <div class="col-md-4  form-group" data-for="name">
                            <label for="JobTitle-form1-h" class="form-control-label mbr-fonts-style display-7">Job Title</label>
                            <input type="text" name="JobTitle" data-placeholder="JobTitle" data-form-field="JobTitle" required="required" class="form-control display-7" id="JobTitle-form1-h" >
                        </div>
                        <div class="col-md-4  form-group" data-for="JobType">
                            <label for="JobType-form1-h" class="form-control-label mbr-fonts-style display-7">Job Skill Required</label>
                            <input type="text" name="JobType" data-placeholder="JobType" data-form-field="JobType" required="required" class="form-control display-7" id="JobType-form1-h">
                        </div>
                        <div data-for="JobDuration" class="col-md-4  form-group">
                            <label for="JobDuration-form1-h" class="form-control-label mbr-fonts-style display-7">Duration(Hour)</label>
                            <input type="number" name="JobDuration" data-placeholder="JobDuration" data-form-field="JobDuration" required="required" class="form-control display-7" id="JobDuration-form1-h">
                        </div>
                        <div data-for="PostDate" class="col-md-4  form-group">
                            <label for="PostDate-form1-h" class="form-control-label mbr-fonts-style display-7">Date(DD/MM/YYYY)</label>
                            <input type="date" name="PostDate" data-placeholder="PostDate" data-form-field="PostDate" required="required" class="form-control display-7"id="PostDate-form1-h">
                        </div>
                        <div data-for="PostTime" class="col-md-4  form-group">
                            <label for="PostTime-form1-h" class="form-control-label mbr-fonts-style display-7">Time(HH:MM:AM/PM)</label>
                            <input type="time"  name="PostTime" data-placeholder="PostTime" data-form-field="PostTime" required="required" class="form-control display-7" id="PostTime-form1-h">
                        </div>
                        <div data-for="Location" class="col-md-4  form-group">
                            <label for="Location-form1-h" class="form-control-label mbr-fonts-style display-7">Location</label>
                            <input type="text"  name="Location" data-placeholder="Location" data-form-field="Location" required="required" class="form-control display-7" id="PostTime-form1-h">
                        </div>
                        <div data-for="JobDescription" class="col-md-12 form-group">
                            <label for="JobDescription-form1-h" class="form-control-label mbr-fonts-style display-7">Job Description</label>
                            <textarea  name="JobDescriptionText" class="form-control display-7"></textarea>
                        </div>
                        <div data-for="Image" class="col-md-12 form-group">
                            <label for="Image-form1-h" class="form-control-label mbr-fonts-style display-7">Select Image Files to Upload:</label>
                                <input class="btn btn-lg btn-block" type="file" name="files[]" multiple >
                                
                        </div>
                    <?php 
                    if (isset($_SESSION['AccountStatus'])):
                        if ($_SESSION['AccountStatus']=='Level 2'): 
                            if ($_SESSION['Credit']>0):?>
                        <div class="col-md-12 input-group-btn align-center">
                            <button type="submit" class="btn btn-primary btn-form display-4">POST</button>
                        </div>
                            <?php else: ?>
                                <div class="col-md-12 align-center">
                                     <p class="mbr-text py-5 mbr-fonts-style display-7"> insufficient Credit</p>
                                </div>                             
                           <?php  endif;?>
                        <?php endif;?>
                    <?php endif;?>

                    </div>
                </form><!---Formbuilder Form--->
            </div>
        </div>
    </div>
</section>
<section class="section-table cid-rIu85kBWzM" id="table1-23">
  <div class="container container-table">
      <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
          Completed Advertisement</h2>
      <h3 class="mbr-section-subtitle mbr-fonts-style align-center pb-5 mbr-light display-5">Jobs you posted that had Completed</h3>
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
              </tr>
            </thead>
            <tbody>
<?php   
    $completeselect='SELECT * FROM jobpost INNER JOIN job on jobpost.JPID = job.JPID WHERE UID = "'.$_SESSION['UID'].'" AND job.JobStatus = "Completed"' ;
if($resultlist2 = mysqli_query($db, $completeselect))
        {
        if(mysqli_num_rows($resultlist2) > 0)
            {
            while($row = mysqli_fetch_array($resultlist2))
                { ?>                
              <tr> 
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobName']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobType']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobDate']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobTime']?></td>
                <td class="body-item mbr-fonts-style display-7"><?php echo $row['JobDuration']?></td>
             </tr>   
          <?php 
                }
            mysqli_free_result($resultlist2);
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
<!--<section class="services5 cid-rHfxvXNc9P" id="services5-n">
    
    
    
    Overlay
    
    Container
    <div class="container">
        <div class="row">
            Titles
            <div class="title pb-5 col-12">
                <h2 class="align-left mbr-fonts-style m-0 display-2">FEEDBACKS</h2>
                
            </div>
            Card-1
            <div class="card px-3 col-12">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="top-line pb-3">
                            <h4 class="card-title mbr-fonts-style display-5">
                                Feedback 1</h4>
                            <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                8 Nov 2019</p>
                        </div>
                        <div class="bottom-line">
                            <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, odit?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            Card-2
            <div class="card px-3 col-12">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="top-line pb-3">
                            <h4 class="card-title mbr-fonts-style display-5">
                                Feedback 2
                            </h4>
                            <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                8 Nov 2019
                            </p>
                        </div>
                        <div class="bottom-line">
                            <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, odit?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            Card-3
            <div class="card px-3 col-12">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="top-line pb-3">
                            <h4 class="card-title mbr-fonts-style display-5">
                                Feedback 3
                            </h4>
                            <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                8 Nov 2019
                            </p>
                        </div>
                        <div class="bottom-line">
                            <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, odit?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            Card-4
            <div class="card px-3 col-12">
                <div class="card-wrapper media-container-row media-container-row">
                    <div class="card-box">
                        <div class="top-line pb-3">
                            <h4 class="card-title mbr-fonts-style display-5">
                                Feedback 4
                            </h4>
                            <p class="mbr-text cost mbr-fonts-style m-0 display-5">8 Nov 2019</p>
                        </div>
                        <div class="bottom-line">
                            <p class="mbr-text mbr-fonts-style m-0 b-descr display-7">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, odit?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            Card-5
            
            Card-6
            
            Card-7
            
            Card-8
            
            Card-9
            
            Card-10
            
            Card-11
            
            Card-12
            
        </div>
    </div>
</section>-->

<!--<section class="tabs2 cid-rHfvrUdi13" id="tabs2-m">

    

    
    <div class="container">
        <h2 class="mbr-section-title align-center pb-5 mbr-fonts-style display-2">REFERENCES</h2>
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link mbr-fonts-style show active display-7" role="tab" data-toggle="tab" href="#tabs2-m_tab0" aria-selected="true">
                            Received References
                        </a></li>
                    <li class="nav-item"><a class="nav-link mbr-fonts-style show active display-7" role="tab" data-toggle="tab" href="#tabs2-m_tab1" aria-selected="true">
                            Given References</a></li>
                    
                    
                    
                    
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane in active" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">&nbsp; Very Good - 0 
<br>Good - 0 
<br>Neutral - 0 
<br>Bad - 0 
<br>Very Bad - 0</p>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">&nbsp; Very Good - 0 
<br>Good - 0 
<br>Neutral - 0 
<br>Bad - 0 
<br>Very Bad - 0</p>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Mobirise offers many site blocks in several themes, and though these blocks are pre-made, they are flexible. You can combine blocks in different ways on your pages.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Mobirise gives you the freedom to develop as many websites as you like given the fact that it is a desktop app.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab5" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Publish your website to a local drive, FTP or host on Amazon S3, Google Cloud, Github Pages. Don't be a hostage to just one platform or service provider.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab6" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Just drop the blocks into the page, edit content inline and publish - no technical skills required.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->

<section once="footers" class="cid-rHfhD2tVnm" id="footer7-e">

    

    

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
  <script src="assets2/mbr-tabs/mbr-tabs.js"></script>
  <script src="assets2/dropdown/js/nav-dropdown.js"></script>
  <script src="assets2/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets2/theme/js/script.js"></script>
  <script src="assets2/datatables/jquery.data-tables.min.js"></script>
  <script src="assets2/datatables/data-tables.bootstrap4.min.js"></script>

</body>
</html>