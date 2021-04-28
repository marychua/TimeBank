<?php 
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "timebank.segibic@gmail.com";
$mail->Password = "segi1472580369";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("service-noreply@timebank.segibic.com");
$mail->AddAddress($email);
$mail->Subject = "Come Join Us now";
$mail->WordWrap   = 80;
$content = "Hello,<br/>
<br/>
Your Friend ($username) has invited you to join us. Please click the link below to redirect to our site.<br/>
<br/>
http://localhost:8080/TimeBank/Home.php<br/>
<br/>
If clicking the link doesn't work you can copy the link into your browser window or type it there directly.<br/>
<br/>
Regards,<br/>
<br/>
Your TimeBank Support Team<br/>
-----------------------------<br/>"; 
$mail->MsgHTML($content);
$mail->IsHTML(true);
if(!$mail->Send()) 
echo "Problem sending email.";
else 
echo "email sent.";
?>
