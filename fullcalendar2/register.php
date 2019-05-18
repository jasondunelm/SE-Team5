<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = "";
require '../PHPMailer/vendor/autoload.php';

$facilityID = $_POST['facility'];
$sql = "SELECT facilityName FROM facility WHERE ID= $facilityID";

$req = $bdd->prepare($sql);
$req->execute();

$facility = $req->fetch();
$facilityName = $facility["facilityName"];

$userID=$_POST['user'];
$sql = "SELECT `Username` FROM users WHERE ID= '$userID'";

$req = $bdd->prepare($sql);
$req->execute();
$emails = $req->fetch();
$email = $emails["Username"];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dus.team5';
    $mail->Password = 'Dunelm12#$'; 
    $mail->SMTPSecure = 'tls'; 
    $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
    // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('teamdurham.sports@dur.ac.uk', 'Sport Team');
    $mail->addAddress($email);   // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Confirmation';
    $bodytext= "<h3>You have booked sucessfully in DUS booking system.<br> You should attend on ".$_POST["startDate"];
    if($facilityID!="4"){
        $bodytext.=" at ".$_POST["startTime"];
    }
    $bodytext.= " at $facilityName and pay on site.<br>The booking cost ".$_POST["totalmoney"]." pounds.</h3>";
    $mail->Body    = $bodytext;
    if($mail->send())
        $msg =  "You have booked successfully! Please verify your email!";
    else
        $msg =  "Error!Please try again!";
} catch (Exception $e) {
    $msg =  'Message could not be sent.';
    $msg =  'Mailer Error: ' . $mail->ErrorInfo;
}


$_POST["msg"]=$msg;
?>

