<?php
require 'VerifyEmail.php';
require 'Login.php';

            $_SESSION['UID'] = $L_user['UID'];
            $_SESSION['AccountStatus'] = $L_user['AccountStatus'];
            $_SESSION['Username'] = $L_user['Username'];
            $_SESSION['Email'] = $L_user['Email'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
