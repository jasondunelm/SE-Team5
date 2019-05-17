<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$msg = "";
$email=$_SESSION['userName'];
require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

$facilityID = $_POST['facility'];
$sql = "SELECT facilityName FROM facility WHERE ID= $facilityID";

$req = $bdd->prepare($sql);
$req->execute();

$facility = $req->fetch();
$facilityName = $facility["facilityName"];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dus.team5';
    $mail->Password = 'Dunelm12#$'; 
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('teamdurham.sports@dur.ac.uk', 'Sport Team');
    $mail->addAddress($email);   // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Confirmation';
    $mail->Body    = "<h3>You have booked in Durham system.<br> You should attend on ".$_POST["startDate"]." at $facilityName and pay in advance.<br>The booking cost ".$_POST["totalmoney"]." pounds.</h3>";
    if($mail->send())
        $msg =  "You have been registered! Please verify your email!";
    else
        $msg =  "Error!Please try again!";
} catch (Exception $e) {
    $msg =  'Message could not be sent.';
    $msg =  'Mailer Error: ' . $mail->ErrorInfo;
}


$_POST["msg"]=$msg;
?>
