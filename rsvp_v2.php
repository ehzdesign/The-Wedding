<?php

  function has_header_injection($str){
    return preg_match("/[\r\n]/", $str);
  }


if (isset ($_POST['rsvp__form__submit'])){

  $name               = $_POST['name'];
  $attendancechoice   = $_POST['attendancechoice'];
  $howmany            = $_POST['how-many'];
  $plus1              = $_POST['plus1'];
  $family             = $_POST['family-member'];
  $notes              = $_POST['notes'];
  $email              = trim($_POST['email']);

  //Check to see if $name $guests or $email have header injections
  if(has_header_injection($name) || has_header_injection($plus1) || has_header_injection($email) || has_header_injection($family)){
    die(); //If true kill the script
  }

  // if(!$name || !$attendancechoice || !$howmany || !$guests || !$notes || !$email){
  //     echo '<h4>All Fields Required</h4><a href="index.html">Go Back To Page</a>';
  //     exit;
  // }

  //Add the recipient email to a variable
  $to = "91.eahz@gmail.com";


  //Subject
  $subject = "$name sent you a message from wedding RSVP";

  //Construct the message
  $message  = "Name: $name\r\n";
  $message .= "Attendance Choice: $attendancechoice\r\n";
  $message .= "Guest Choice: $howmany\r\n";
  $message .= "Plus 1: $plus1\r\n";
  $message .= "Family Members: $family\r\n";
  $message .= "Email: $email\r\n";
  $message .= "Message/Notes:\r\n$notes";


  $message = wordwrap($message, 90);

  //Set mail headers into variable
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "From: $name <$email>\r\n";
  $headers .= "X-Priority: 1\r\n";
  $headers .= "X-MSMail-Priority: High\r\n\r\n";

  //Send Mail
  mail( $to, $subject, $message, $headers );

  echo('message sent! <a href="index.html">Go Back To Page</a>');
  


}

?>