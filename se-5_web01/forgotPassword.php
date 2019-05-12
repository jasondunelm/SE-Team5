<?php
include("functions_WebFront.php");

use PHPMailer\PHPMailer\PHPMailer;
// Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

if (isset($_POST['email'])) {
    $conn = new mysqli("127.0.0.1", "root", "password", "se_team5");

    $email = $conn->real_escape_string($_POST['email']);

    $sql = $conn->query("SELECT id FROM Users WHERE userName='$email'");
    if ($sql->num_rows > 0) {

        $token = generateNewString();

        $conn->query("UPDATE Users SET token='$token', 
                      tokenExpire=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
                      WHERE userName='$email'
            ");

        include_once "PHPMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php";

        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'dus.team5';                     // SMTP username
        $mail->Password   = 'Dunelm12#$';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('teamdurham.sports@dur.ac.uk');
        $mail->addAddress($email);
        $mail->Subject = "Reset Password";
        $mail->isHTML(true);
        $mail->Body = "
	            Hi,<br><br>
	            
	            In order to reset your password, please click on the link below:<br>
	            <a href='
	            http://localhost:63342/SE-Team5/resetPassword.php?email=$email&token=$token
	            '>http://localhost:63342/SE-Team5/resetPassword.php?email=$email&token=$token</a><br><br>
	            
	            Best regards,<br>
	            DUS Admin Team
	        ";

        if ($mail->send())
            exit(json_encode(array("status" => 1, "msg" => 'Please Check Your Email Inbox!')));
        else
            exit(json_encode(array("status" => 0, "msg" => 'Something Wrong Just Happened! Please try again!')));
    } else
        exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Inputs!')));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">
            <img src="images/logo.png"><br><br>
            <input class="form-control" id="email" placeholder="Your Email Address"><br>
            <input type="button" class="btn btn-primary" value="Reset Password">
            <br><br>
            <p id="response"></p>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
    var email = $("#email");

    $(document).ready(function () {
        $('.btn-primary').on('click', function () {
            if (email.val() != "") {
                email.css('border', '1px solid green');

                $.ajax({
                    url: 'forgotPassword.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        email: email.val()
                    }, success: function (response) {
                        if (!response.success)
                            $("#response").html(response.msg).css('color', "red");
                        else
                            $("#response").html(response.msg).css('color', "green");
                    }
                });
            } else
                email.css('border', '1px solid red');
        });
    });
</script>
</body>
</html>
