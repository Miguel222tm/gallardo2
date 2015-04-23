<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer();  
 
$mail->IsSMTP();  // telling the class to use SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "avisos.itesm@gmail.com"; // SMTP username
$mail->Password = "sistema2015"; // SMTP password 
$mail->FromName = 'MEP - Avisos'; 
$mail->From     = "avisos.itesm@gmail.com";  //sender
$mail->AddAddress("miguel.trevinom@gmail.com");  //receiver
 
$mail->Subject  = "First PHPMailer Message";
$mail->Body     = "Hi! xd";
$mail->WordWrap = 50;  
 
if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent.';
}
?>