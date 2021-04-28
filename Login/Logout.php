<?php
require 'VerifyEmail.php';
session_destroy();
unset($_SESSION['UID']);
unset($_SESSION['AccountStatus']);
unset($_SESSION['Username']);
unset($_SESSION['Email']);
unset($_SESSION['Verified']);
header("location: ../Home.php");
?>

