<?php
require_once "phpmailer/class.phpmailer.php";
// require 'vendor/autoload.php';
require_once "phpmailer/PHPMailerAutoload.php";
$mail = new PHPMailer(true);
// $mail->isSMTP();
// $mail->SMTPDebug = 2;
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = 25;
// $mail->SMTPSecure = 'tls';
// $mail->SMTPAuth = true;
// $mail->Username = 'ammyrock529@gmail.com';
// $mail->Password = 'Ammy7387853214';
// $mail->setFrom('ammyrock529@gmail.com', 'Your Name',0);
// $mail->addReplyTo('ammyrock529@gmail.com', 'Your Name');
// $mail->addAddress('ammyrock529@gmail.com', 'Receiver Name');
// $mail->Subject = 'Testing PHPMailer';
// // $mail->msgHTML(file_get_contents('message.html'), __DIR__);
// $mail->Body = 'This is a plain text message body';
// //$mail->addAttachment('test.txt');
// if (!$mail->send()) {
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'The email message was sent.';
// }

try {
//  $mail->Host       = "mail.gmail.com"; // SMTP server
 $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
 $mail->SMTPAuth   = true;                  // enable SMTP authentication
 $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
 $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
 $mail->Port       = 465;   // set the SMTP port for the GMAIL server
 $mail->SMTPKeepAlive = true;
 $mail->Mailer = "smtp";
 $mail->Username   = "ammyrock529@gmail.com";  // GMAIL username
 $mail->Password   = "Ammy7387853214";            // GMAIL password
 $mail->addAddress('ammyrock529@gmail.com', 'Receiver Name');
 $mail->setFrom('ammyrock529@gmail.com', 'def');
 $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
 $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
 $mail->MsgHTML('teest');
 $mail->Send();
 echo "Message Sent OK</p>\n";
 header("location: ../test.html");
} catch (phpmailerException $e) {
 echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
 echo $e->getMessage(); //Boring error messages from anything else!
}
?>

