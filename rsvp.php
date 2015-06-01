<?php



require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require_once 'parameters/config.php';

$name = $_POST['name'];
$attendancechoice = $_POST['attendancechoice'];
$whosattending = $_POST['how-many'];
$notes = $_POST['notes'];
$email = $_POST['email'];

$plus1 = 'n/a';

switch($whosattending){
  case 'plus 1': 
    $plus1 = $_POST['plus-1'];
    break;
  case 'plus family':
    $plusArray = $_POST['family-member'];
    $plus1 = '<ul>';
    foreach($plusArray as $familyMemberName){
      $plus1.= '<li>'.$familyMemberName.'</li>';
    }
    $plus1.='</ul>';
  break;
}


/* REPLACE IN TEMPLATE FOR EMAIL */
$message = file_get_contents('./mail.html');
$message = str_replace('%name%', $name, $message);
$message = str_replace('%attendancechoice%', $attendancechoice, $message);
$message = str_replace('%how-many%', $whosattending, $message);
$message = str_replace('%guestname%', $plus1, $message);
$message = str_replace('%notes%', $notes, $message);
$message = str_replace('%email%', $email, $message);
// var_dump($_POST);
// var_dump($config['gmailPassword']);
// var_dump($config['gmailFrom']);
// die();

/* MAILER CONFIGURATION */
$sendToEmail = "91.eahz@gmail.com"; //put chris email here
$sendToName = "1827 Photo + Design";



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
$mail->Username = "ingramcaribbeansummit2015@verlas.com.ve";
$mail->Password = "ingram123";
$mail->setFrom("ingramcaribbeansummit2015@verlas.com.ve", $gmail_form);
$mail->addAddress($sendToEmail, $sendToName);
$mail->Subject = $subject;
//body
$mail->msgHTML($message);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
var_dump($mail);
var_dump($gmail_username);
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








