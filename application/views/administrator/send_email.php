<?php
// include phpmailer file
require_once "PHPMailer-master/class.phpmailer.php";
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
// for gmail
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
// for hotmail
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.live.com';
// use 25 or 587
$mail->Port = 587;
$mail->Username = 'ammyrock529@gmail.com';
// must be in single quotes
$mail->Password = 'Ammy7387853214';
$mail->SetFrom('ammyrock529@gmail.com', 'Your Name'); 
?>