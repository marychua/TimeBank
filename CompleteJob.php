<?php
if (empty($_SESSION['UID'])) {
    header('location: Login/Login.php');
}
$JID = $_GET['id'];
require 'DB/db.inc.php';
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));

    $JobStatus =  'Verifying';
    $CompleteDate = date("Y:m:d")  ;
    $CompleteTime = date("H:i:s");
    $update_to_job ="UPDATE job SET JobStatus = '$JobStatus', JobCompleteDate='$CompleteDate', JobCompleteTime='$CompleteTime' WHERE JID = '$JID'";
    mysqli_query($db,$update_to_job);
    mysqli_close($db);
    header('Location: JobSearchLogin.php');
