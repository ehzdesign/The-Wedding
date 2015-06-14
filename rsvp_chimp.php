<?php
// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(-1);
/* @var $c Mailchimp_Campaigns */
/* @var $l Mailchimp_Lists */
/* @var $t Mailchimp_Templates */
/* @var $mc Mailchimp */

require_once 'vendor/mailchimp/mailchimp/src/Mailchimp.php';
$name= "";
$attendancechoice= "";
$whosattending= "";
$notes= "";
$email= "";


if( isset($_POST['name']) )
{
  $name = $_POST['name'];
}
if( isset($_POST['attendancechoice']) )
{
  $attendancechoice = $_POST['attendancechoice'];
}
if( isset($_POST['how-many']) )
{
  $whosattending = $_POST['how-many'];
}
if( isset($_POST['notes']) )
{
  $notes = $_POST['notes'];
}
if( isset($_POST['email']) )
{
  $email = $_POST['email'];
}

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

$message = file_get_contents('./mail.html');
$message = str_replace('%name%', $name, $message);
$message = str_replace('%attendancechoice%', $attendancechoice, $message);
$message = str_replace('%how-many%', $whosattending, $message);
$message = str_replace('%guestname%', $plus1, $message);
$message = str_replace('%notes%', $notes, $message);
$message = str_replace('%email%', $email, $message);





/* --- CHIMP CONFIG --------------------------------------------------------- */

$mc = new Mailchimp("5da02815b6068e788eddb64c34166506-us11");
$c = $mc->campaigns;


$type = "regular";

$createCampainArray = array(
   'list_id' => '9daa47dc5a',
    'subject'=> 'The Wedding',
    'from_email' => '91.eahz@gmail.com',
    'from_name' => 'Lisa and Chris Wedding',
    'to_name' => 'My BROTHER',
    'inline_css' => true,
    
    
);
$content = array(
    'html' => $message,
);

$r = $c->create($type, $createCampainArray, $content);

var_dump($r['id']);   
$r2 = $c->send($r['id']);

var_dump($r2); 
