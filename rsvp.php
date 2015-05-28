<?php 

// $name = $_POST['name'];
// $notGoing = $_POST['attendancechoice2'];
// $message = $_POST['notes'];
// $email = $_POST['email'];


require 'phpLib/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'kiocam246@gmail.com';                 // SMTP username
$mail->Password = '060286374Ley@';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = $_POST['email'];
$mail->FromName = $_POST['name'];
$mail->addAddress('kiocam246@gmail.com', 'jason cameron');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($_POST['email']);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Wedding RSVP';
$mail->Body  = $_POST['attendancechoice'] .'<br>'. $_POST['how-many'] . $_POST['plus1'] . $_POST['family-member']  .'<br>'. $_POST['notes'];
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('Location: /index.php');
}


?>








