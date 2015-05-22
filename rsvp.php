<?php $name = $_POST['name'];
$attendancechoice = $_POST['attendancechoice'];
$formcontent="From: $name \n Response: I $attendancechoice";
$recipient = "91.eahz@gmail.com";
$subject = "Wedding RSVP Form";
$mailheader = "From: $name \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>








