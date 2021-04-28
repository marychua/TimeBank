<?php
if (empty($_SESSION['UID'])) {
    header('location: Login/Login.php');
}session_start();
$JID = $_GET['id'];
$Credit = $_GET['c'];
require 'DB/db.inc.php';
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));
    $TID = date("YmdHis")  ;
    $JobStatus =  'Completed';
    $CompleteDate = date("Y:m:d")  ;
    $CompleteTime = date("H:i:s");
     $UID1=$_SESSION['UID'];
    $queryselect1="SELECT * FROM `user` WHERE UID = '$UID1'";
    $resultlist1 = mysqli_query($db, $queryselect1);
    $row1 = mysqli_fetch_array($resultlist1);
    $balance1 = $row1['Credit'];
    $balance1 = $balance1-$Credit;
    
    $queryselect2="SELECT * FROM job INNER JOIN jobaccept on jobaccept.JAID = job.JAID INNER JOIN user on jobaccept.UID = user.UID WHERE JID = '$JID'";
    $resultlist2 = mysqli_query($db, $queryselect2);
    $row2 = mysqli_fetch_array($resultlist2);
    $UID2 = $row2['UID'];
    $balance2 = $row2['Credit']+$Credit;
    $balance2 = $balance2+$Credit;
    
    $add_to_jobaccept = "INSERT INTO `transaction`(`TID`, `TransactionDate`, `TranscationTime`, `Credit`) VALUES ('$TID','$CompleteDate','$CompleteTime','$Credit')";
    mysqli_query($db,$add_to_jobaccept);
    
    $update_to_job ="UPDATE job SET JobStatus = '$JobStatus', JobCompleteDate='$CompleteDate', JobCompleteTime='$CompleteTime',TID='$TID' WHERE JID = '$JID'";
    mysqli_query($db,$update_to_job);
    
    $updateuser1 ="UPDATE user SET Credit = '$balance1' WHERE UID = '$UID1'";
    mysqli_query($db,$updateuser1);
            
    $updateuser2 ="UPDATE user SET Credit = '$balance2' WHERE UID = '$UID2'";
    mysqli_query($db,$updateuser2);        
    mysqli_close($db);
    header('Location: JobPosting.php');