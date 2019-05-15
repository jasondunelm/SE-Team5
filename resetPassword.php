<?php
include('config_wyj.php');
include ('functions_WebFront.php');

	if (isset($_GET['email']) && isset($_GET['token'])) {
        $link = new mysqli($mysql_db_host, $mysql_db_user, $mysql_db_pass, $mysql_db_name);

        $email = $link->real_escape_string($_GET['email']);
        $token = $link->real_escape_string($_GET['token']);

        $sql = $link->query("SELECT id FROM Users WHERE
			userName='$email' AND token='$token' AND token<>'' AND tokenExpire > NOW()
		");

        if ($sql->num_rows > 0) {
            if ($_POST['submit'] == "Update Password") {
                $password = $link->real_escape_string($_POST['newPassword']);
                $cPassword = $link->real_escape_string($_POST['cNewPassword']);

                if (!$_POST['newPassword']) {
                    $error .= "<br />Please enter your password.";
                } else {
                    if (strlen($_POST['newPassword']) < 8) $error .= "<br />Please enter a password at least 8 characters.";
                    if (!preg_match('`[A-Z]`', $_POST['newPassword'])) $error .= "<br />Please include at least one capital letter in your password.";
                }

                if (!$_POST['cNewPassword']) {
                    $error .= "<br />Please enter your password again.";
                } else if ($password != $cPassword) {
                    $error .= "<br />Please check your input of confirmation password.";
                }

                if ($error) {
                    $error = "There were error(s) in your input details:" . $error;
                } else {
                    $newPassword = $password;
                    $newPasswordEncrypted = md5(md5($email).$newPassword);
                    $link->query("UPDATE Users SET token='', password = '$newPasswordEncrypted' 
                      WHERE userName='$email'");
                    $message = "Your new password been updated successfully!<br><a href=login.php>Click Here To Log In</a>";
                }
            }
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Reset Password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 10px;">
	<div class="row justify-content-center">
		<div class="col-md-6 col-md-offset-3" align="center">

			<img src="images/logo.png"><br><br>

			<?php displayError(); ?>

			<form method="post">
				<input class="form-control" name="newPassword" type="password" placeholder="Password..."><br>
				<input class="form-control" name="cNewPassword" type="password" placeholder="Confirm Password..."><br>
				<input class="btn btn-primary" type="submit" name="submit" value="Update Password">
			</form>

		</div>
	</div>
</div>
</body>
</html>
