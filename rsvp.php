<?php

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require_once 'parameters/config.php';

/* REPLACE IN TEMPLATE FOR EMAIL */
$message = file_get_contents('./mail.html');
$message = str_replace('%name%', "ERIC", $message);

//var_dump($config['gmailUser']);
//var_dump($config['gmailPassword']);
//var_dump($config['gmailFrom']);
//die();

/* MAILER CONFIGURATION */
$sendToEmail = "91.eahz@gmail.com";
$sendToName = "Eric";


$subject = "The Wedding";
$gmail_username = $config['gmailUser'];
$gmail_password = $config['gmailPassword'];
$gmail_form = $config['gmailFrom'];

$mail = new PHPMailer;
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($gmail_username, $gmail_form);
$mail->addReplyTo($gmail_username, $gmail_form);
$mail->addAddress($sendToEmail, $sendToName);
$mail->Subject = $subject;
//body
$mail->msgHTML($message);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

if (!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
}
//$name = $_POST['name'];
//$attendancechoice = $_POST['attendancechoice'];
//$formcontent="From: $name \n Response: I $attendancechoice";
//$recipient = "91.eahz@gmail.com";
//$subject = "Wedding RSVP Form";
//$mailheader = "From: $name \r\n";
//mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
//echo "Thank You!";
?>








