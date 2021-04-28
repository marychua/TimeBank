<?php
$PID = $_GET['id'];
require 'DB/db.inc.php';
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));

// sql to delete a record
$sql1 = "DELETE FROM job WHERE JPID = '$PID'"; 
$sql2 = "DELETE FROM jobpost WHERE JPID = '$PID'"; 

if (mysqli_query($db, $sql1)) 
    {
    if (mysqli_query($db, $sql2)) 
        {
            mysqli_close($db);
            header('Location: JobPosting.php');
            exit;
        }
    else 
        {
            echo "Error deleting record";
        }
    } 
else 
    {
        echo "Error deleting record";
    }
?>
