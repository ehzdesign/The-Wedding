<?php 
$name = $_POST['name'];
$attendancechoice = $_POST['attendancechoice'];
$howmany = $_POST['how-many'];
$plus1 = $_POST['plus1'];
$guests = $_POST['guests'];
$notes = $_POST['notes'];
$email = $_POST['email'];

$formcontent="From: $name \n Response: I $attendancechoice \n Guest Choice: $howmany \n Guest Name(s):$guests";
$recipient = "91.eahz@gmail.com";
$subject = "Wedding RSVP Form";
$mailheader = "From: $name <$email>\r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";


?>








