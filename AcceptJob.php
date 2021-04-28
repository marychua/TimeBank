<?php include 'Login/VerifyEmail.php';
if (empty($_SESSION['UID'])) {
    header('location: Login/Login.php');
}
$JID = $_GET['id'];
require 'DB/db.inc.php';
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));


    $JAID = date("YmdHis")  ;
    $JobStatus =  'Accepted';
    $AcceptDate = date("Y:m:d")  ;
    $AcceptTime = date("H:i:s");
    $UID = $_SESSION['UID'];
    $add_to_jobaccept = "INSERT INTO `jobaccept`(`JAID`, `AcceptDate`, `AcceptTime`, `UID`) VALUES ('JAID$JAID','$AcceptDate','$AcceptTime','$UID')";
    mysqli_query($db,$add_to_jobaccept);
    $update_to_job ="UPDATE job SET JobStatus = '$JobStatus', JAID='JAID$JAID' WHERE JID = '$JID'";
    mysqli_query($db,$update_to_job);
//    require 'Jobpostingmail.php';
     header('Location: JobSearchLogin.php');

?>